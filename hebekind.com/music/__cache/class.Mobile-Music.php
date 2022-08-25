<?php



/*



Kontackt License Agreement (DMCA License)



Copyright (c) 2015, Alex Dobrovolscki (dobriisasa@gmail.com)

All rights reserved.



* Redistributions of source code is strictly forbidden.



* By using Kontackt you may have your own purchase copy, if you are not own a license, you can buy one from https://codecanyon.net/user/dobrovolscki/portfolio.



THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND

ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED

WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE

DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR

ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES

(INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;

LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON

ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT

(INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS

SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.



*/



 

require_once('_core.php');

require_once('en.php');

class MOBILE_MUSIC extends _MUSIC_MODULE{



public $userid;

public $rtime;

public $musheader;

public $musfooter;

public $cmd;

public $theme_dir;

public $lang;

public $view_as_json;

public $s3;

public $storage;

public $tracks_storage_path;

public $covers_storage_path;

// constructor

public function __construct(){

 global $site_lang;

parent::__construct();





define('FILES__ROOT__',getcwd());

define('__MOB_FILE_COVER_DIR', '/music/mp3_covers/');



$this->valid_formats    = array("audio/mpeg","mp3"); // validate file format

$this->max_file_size    = 1024 * 100000; // 100 mb, the max mp3 file size for upload is 100mb

$this->files_dir = "/mp3Files/"; // folder for upload mp3 files

$this->output_dir = FILES__ROOT__ . '/music/' . $this->files_dir;

$this->defaultCover = "/template/original/css/images/gs_album_stub.png"; // default cover, if google return an empty result for cover

$this->collection_img = "/modules/music/css/images/playlist.png";



$this->theme_dir = FILES__ROOT__.'/music/mobile/layout/';

$this->view_as_json = isset($_GET['view_as']) || isset($_POST['view_as']) ? true : false;



$this->userid = isset($this->USER['id']) ? (int) $this->test_input($this->USER['id']) : 0;

$this->rtime = time();

$this->musheader = $this->theme_dir.'/mus-header.html';

$this->musfooter = $this->theme_dir.'/mus-footer.html';

$this->cmd = isset($_GET['cmd']) ? $this->test_input($_GET['cmd']) : '';

$this->template->assign(['this' => $this, '_SERVER' => $_SERVER, 'is_json' => $this->view_as_json]);





// get language

foreach($site_lang as $key => $value){

	$this->lang[$key] = $value;

}



$this->action = (isset($_POST['action']) ? $this->test_input($_POST['action']) : '');

$this->trackid = (isset($_POST['track']) ? $this->test_input($_POST['track']) : 0);



// $a & $b & $c are converted with iconv, from UTF-8 to CP1251

$this->b = (isset($_POST['b']) ? $this->test_input($_POST['b']) : '');

$this->c = (isset($_POST['c']) ? $this->test_input($_POST['c']) : '');

$this->d = (isset($_POST['d']) ? $this->test_input($_POST['d']) : '');

}

// escape strings

private function esc($x)

{

    return $this->db->real_escape_string($x);

}

public function test_input($data) {



   $data = trim($data);

   $data = stripslashes($data);

   $data = htmlspecialchars($data);

   

 

   

   return $this->esc($data);

}

public function searchForVideo($artist,$song){

	

	$artist = $this->esc($artist);

	$song = $this->esc($song);

	$song_pl_artist = $this->esc($artist.' '.$song);

	

	// search video in videos table

	$q = $this->__om_query("select * from ".tbl_videos." where `title` LIKE N'%{$artist}%' COLLATE utf8_bin

	|| `title` LIKE N'%{$song}%' COLLATE utf8_bin || `title` LIKE N'%{$song_pl_artist}%' COLLATE utf8_bin limit 1");

	$result = array();



	if( carray($q) && count($q) ) {

		

		

		foreach($q as $r):

		

		$result[] =  array(

		"title" => $r['title'],

		"id" => $r['id'],

		"video_community" => '',

		"filename" => $r['extension'] == 'NULL' ? $r['filename'] : __VD_DIR.$r['userid'].'/'.$r['filename'].'.'.$r['extension']

		);

		

		endforeach;

		

		

	} else {

		

		// search video in communities

		$q = $this->__om_query("select * from ".tbl_communities_pics." where 

		(`vd_name` LIKE N'%{$artist}%' COLLATE utf8_bin 

		|| 

		`vd_name` LIKE N'%{$song}%' COLLATE utf8_bin 

		|| 

		`vd_name` LIKE N'%{$song_pl_artist}%' COLLATE utf8_bin 

		

		) and file='video' limit 1");

		

		if( carray($q) && count($q) ) {



		foreach($q as $r):

		

		$result[] = array(

		"title" => $r['vd_name'],

		"id" => $r['id'],

		"video_community" => $r['group_id'],

		"filename" => !empty($r['vd_external']) ? $r['filename'] : __COMMUNITIES_VIDEOS_DIR.$r['group_id'].'/'.$r['filename'].'.'.$r['type']

		);

		

		endforeach;

		

		}

		

	}

	return count($result) ? $result : false;

}

private function es_rus($str){



$x_a = mb_convert_encoding($str, 'iso-8859-1', 'utf-8');



if($this->isRussian($this->ch($str)) <= 3)

return $this->rplchr($this->ch($this->rpl($str)));

else

return $this->rplchr($this->rpl($x_a));



}

public function createCollection(){

	

	$coll_name = isset($_POST['st_layer_col_name']) ? $this->test_input($_POST['st_layer_col_name']) : '';

	$user_id = $this->USER['id'];

 

	$json = array("a" => "error","id" => 0);

	$now = time();

	if( empty($coll_name) || !$coll_name || ctype_space($coll_name) ){

		

		 

		$json = array("a" => "empty","id" => 0);

		

	} else if ($coll_name != '') {

		

		$add_playlist = $this->__om_query_insert("insert into ".tbl_playlists." SET `name`='{$coll_name}', `added` = '{$now}', `owner`='{$user_id}'");

		

		if($add_playlist) {

			

			$json = array("a" => "done","id" => $add_playlist);

			

		}

		

	}

	

	echo json_encode($json);

	

}



// replace russian chars with latin

public function rplchr($string)

{ 



    $replace = array(

        '0' => '',

        '1' => '',

        '2' => '',

        '3' => '',

        '4' => '',

        '5' => '',

        '6' => '',

        '7' => '',

        '8' => '',

        '9' => '',

        'Track' => '',

        'track' => '',

        'UNKNOWN' => '',

        'unknown' => '',

        '&lt;' => '',

        '&gt;' => '',

        '&#039;' => '',

        '&amp;' => '',

        '&quot;' => '',

        'A' => 'A',

        'A' => 'A',

        'A' => 'A',

        'A' => 'A',

        'A' => 'Ae',

        '&Auml;' => 'A',

        'A' => 'A',

        'A' => 'A',

        'A' => 'A',

        'A' => 'A',

        'Ae' => 'Ae',

        'C' => 'C',

        'C' => 'C',

        'C' => 'C',

        'C' => 'C',

        'C' => 'C',

        'D' => 'D',

        'D' => 'D',

        'D' => 'D',

        'E' => 'E',

        'E' => 'E',

        'E' => 'E',

        'E' => 'E',

        'E' => 'E',

        'E' => 'E',

        'E' => 'E',

        'E' => 'E',

        'E' => 'E',

        'G' => 'G',

        'G' => 'G',

        'G' => 'G',

        'G' => 'G',

        'H' => 'H',

        'H' => 'H',

        'I' => 'I',

        'I' => 'I',

        'I' => 'I',

        'I' => 'I',

        'I' => 'I',

        'I' => 'I',

        'I' => 'I',

        'I' => 'I',

        'I' => 'I',

        'IJ' => 'IJ',

        'J' => 'J',

        'K' => 'K',

        'L' => 'L',

        'L' => 'L',

        'L' => 'L',

        'L' => 'L',

        'K' => 'K',

        'N' => 'N',

        'N' => 'N',

        'N' => 'N',

        'N' => 'N',

        'N' => 'N',

        'O' => 'O',

        'O' => 'O',

        'O' => 'O',

        'O' => 'O',

        'O' => 'Oe',

        '&Ouml;' => 'Oe',

        'O' => 'O',

        'O' => 'O',

        'O' => 'O',

        'O' => 'O',

        'OE' => 'OE',

        'R' => 'R',

        'R' => 'R',

        'R' => 'R',

        'S' => 'S',

        'S' => 'S',

        'S' => 'S',

        'S' => 'S',

        'S' => 'S',

        'T' => 'T',

        'T' => 'T',

        'T' => 'T',

        'T' => 'T',

        'U' => 'U',

        'U' => 'U',

        'U' => 'U',

        'U' => 'Ue',

        'U' => 'U',

        '&Uuml;' => 'Ue',

        'U' => 'U',

        'U' => 'U',

        'U' => 'U',

        'U' => 'U',

        'U' => 'U',

        'W' => 'W',

        'Y' => 'Y',

        'Y' => 'Y',

        'Y' => 'Y',

        'Z' => 'Z',

        'Z' => 'Z',

        'Z' => 'Z',

        'T' => 'T',

        'a' => 'a',

        'a' => 'a',

        'a' => 'a',

        'a' => 'a',

        'a' => 'ae',

        '&auml;' => 'ae',

        'a' => 'a',

        'a' => 'a',

        'a' => 'a',

        'a' => 'a',

        'ae' => 'ae',

        'c' => 'c',

        'c' => 'c',

        'c' => 'c',

        'c' => 'c',

        'c' => 'c',

        'd' => 'd',

        'd' => 'd',

        'd' => 'd',

        'e' => 'e',

        'e' => 'e',

        'e' => 'e',

        'e' => 'e',

        'e' => 'e',

        'e' => 'e',

        'e' => 'e',

        'e' => 'e',

        'e' => 'e',

        'f' => 'f',

        'g' => 'g',

        'g' => 'g',

        'g' => 'g',

        'g' => 'g',

        'h' => 'h',

        'h' => 'h',

        'i' => 'i',

        'i' => 'i',

        'i' => 'i',

        'i' => 'i',

        'i' => 'i',

        'i' => 'i',

        'i' => 'i',

        'i' => 'i',

        'i' => 'i',

        'ij' => 'ij',

        'j' => 'j',

        'k' => 'k',

        'k' => 'k',

        'l' => 'l',

        'l' => 'l',

        'l' => 'l',

        'l' => 'l',

        'l' => 'l',

        'n' => 'n',

        'n' => 'n',

        'n' => 'n',

        'n' => 'n',

        'n' => 'n',

        'n' => 'n',

        'o' => 'o',

        'o' => 'o',

        'o' => 'o',

        'o' => 'o',

        'o' => 'oe',

        '&ouml;' => 'oe',

        'o' => 'o',

        'o' => 'o',

        'o' => 'o',

        'o' => 'o',

        'oe' => 'oe',

        'r' => 'r',

        'r' => 'r',

        'r' => 'r',

        's' => 's',

        'u' => 'u',

        'u' => 'u',

        'u' => 'u',

        'u' => 'ue',

        'u' => 'u',

        '&uuml;' => 'ue',

        'u' => 'u',

        'u' => 'u',

        'u' => 'u',

        'u' => 'u',

        'u' => 'u',

        'w' => 'w',

        'y' => 'y',

        'y' => 'y',

        'y' => 'y',

        'z' => 'z',

        'z' => 'z',

        'z' => 'z',

        't' => 't',

        'ss' => 'ss',

        'ss' => 'ss',

        'ый' => 'iy',

        'А' => 'A',

        'Б' => 'B',

        'В' => 'V',

        'Г' => 'G',

        'Д' => 'D',

        'Е' => 'E',

        'Ё' => 'YO',

        'Ж' => 'ZH',

        'З' => 'Z',

        'И' => 'I',

        'Й' => 'Y',

        'К' => 'K',

        'Л' => 'L',

        'М' => 'M',

        'Н' => 'N',

        'О' => 'O',

        'П' => 'P',

        'Р' => 'R',

        'С' => 'S',

        'Т' => 'T',

        'У' => 'U',

        'Ф' => 'F',

        'Х' => 'H',

        'Ц' => 'C',

        'Ч' => 'CH',

        'Ш' => 'SH',

        'Щ' => 'SCH',

        'Ъ' => '',

        'Ы' => 'Y',

        'Ь' => '',

        'Э' => 'E',

        'Ю' => 'YU',

        'Я' => 'YA',

        'а' => 'a',

        'б' => 'b',

        'в' => 'v',

        'г' => 'g',

        'д' => 'd',

        'е' => 'e',

        'ё' => 'yo',

        'ж' => 'zh',

        'з' => 'z',

        'и' => 'i',

        'й' => 'y',

        'к' => 'k',

        'л' => 'l',

        'м' => 'm',

        'н' => 'n',

        'о' => 'o',

        'п' => 'p',

        'р' => 'r',

        'с' => 's',

        'т' => 't',

        'у' => 'u',

        'ф' => 'f',

        'х' => 'h',

        'ц' => 'c',

        'ч' => 'ch',

        'ш' => 'sh',

        'щ' => 'sch',

        'ъ' => '',

        'ы' => 'y',

        'ь' => '',

        'э' => 'e',

        'ю' => 'yu',

        'я' => 'ya'

    );

    

    

    $r = str_replace(array_keys($replace), $replace, $string);



    if (!strlen($r))

        return 'unknown';



    return $r;

}

// detect if string contain russian chars

public function isRussian($text) {

   $text = preg_match_all('/&#10[78]\d/', mb_encode_numericentity($text, array(0x0, 0x2FFFF, 0, 0xFFFF), 'UTF-8'), $m);

   return count($m[0]);

}



public function clean_string($string) {

   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

}



// replace accented letters [v1.5]

public function l_mb_string($string,$url = 0){



    if (!preg_match('/[\x80-\xff]/', $string))

        return $string;



    $chars = array(

    // Decompositions for Latin-1 Supplement

    chr(195).chr(128) => 'A', chr(195).chr(129) => 'A',

    chr(195).chr(130) => 'A', chr(195).chr(131) => 'A',

    chr(195).chr(132) => 'A', chr(195).chr(133) => 'A',

    chr(195).chr(135) => 'C', chr(195).chr(136) => 'E',

    chr(195).chr(137) => 'E', chr(195).chr(138) => 'E',

    chr(195).chr(139) => 'E', chr(195).chr(140) => 'I',

    chr(195).chr(141) => 'I', chr(195).chr(142) => 'I',

    chr(195).chr(143) => 'I', chr(195).chr(145) => 'N',

    chr(195).chr(146) => 'O', chr(195).chr(147) => 'O',

    chr(195).chr(148) => 'O', chr(195).chr(149) => 'O',

    chr(195).chr(150) => 'O', chr(195).chr(153) => 'U',

    chr(195).chr(154) => 'U', chr(195).chr(155) => 'U',

    chr(195).chr(156) => 'U', chr(195).chr(157) => 'Y',

    chr(195).chr(159) => 's', chr(195).chr(160) => 'a',

    chr(195).chr(161) => 'a', chr(195).chr(162) => 'a',

    chr(195).chr(163) => 'a', chr(195).chr(164) => 'a',

    chr(195).chr(165) => 'a', chr(195).chr(167) => 'c',

    chr(195).chr(168) => 'e', chr(195).chr(169) => 'e',

    chr(195).chr(170) => 'e', chr(195).chr(171) => 'e',

    chr(195).chr(172) => 'i', chr(195).chr(173) => 'i',

    chr(195).chr(174) => 'i', chr(195).chr(175) => 'i',

    chr(195).chr(177) => 'n', chr(195).chr(178) => 'o',

    chr(195).chr(179) => 'o', chr(195).chr(180) => 'o',

    chr(195).chr(181) => 'o', chr(195).chr(182) => 'o',

    chr(195).chr(182) => 'o', chr(195).chr(185) => 'u',

    chr(195).chr(186) => 'u', chr(195).chr(187) => 'u',

    chr(195).chr(188) => 'u', chr(195).chr(189) => 'y',

    chr(195).chr(191) => 'y',

    // Decompositions for Latin Extended-A

    chr(196).chr(128) => 'A', chr(196).chr(129) => 'a',

    chr(196).chr(130) => 'A', chr(196).chr(131) => 'a',

    chr(196).chr(132) => 'A', chr(196).chr(133) => 'a',

    chr(196).chr(134) => 'C', chr(196).chr(135) => 'c',

    chr(196).chr(136) => 'C', chr(196).chr(137) => 'c',

    chr(196).chr(138) => 'C', chr(196).chr(139) => 'c',

    chr(196).chr(140) => 'C', chr(196).chr(141) => 'c',

    chr(196).chr(142) => 'D', chr(196).chr(143) => 'd',

    chr(196).chr(144) => 'D', chr(196).chr(145) => 'd',

    chr(196).chr(146) => 'E', chr(196).chr(147) => 'e',

    chr(196).chr(148) => 'E', chr(196).chr(149) => 'e',

    chr(196).chr(150) => 'E', chr(196).chr(151) => 'e',

    chr(196).chr(152) => 'E', chr(196).chr(153) => 'e',

    chr(196).chr(154) => 'E', chr(196).chr(155) => 'e',

    chr(196).chr(156) => 'G', chr(196).chr(157) => 'g',

    chr(196).chr(158) => 'G', chr(196).chr(159) => 'g',

    chr(196).chr(160) => 'G', chr(196).chr(161) => 'g',

    chr(196).chr(162) => 'G', chr(196).chr(163) => 'g',

    chr(196).chr(164) => 'H', chr(196).chr(165) => 'h',

    chr(196).chr(166) => 'H', chr(196).chr(167) => 'h',

    chr(196).chr(168) => 'I', chr(196).chr(169) => 'i',

    chr(196).chr(170) => 'I', chr(196).chr(171) => 'i',

    chr(196).chr(172) => 'I', chr(196).chr(173) => 'i',

    chr(196).chr(174) => 'I', chr(196).chr(175) => 'i',

    chr(196).chr(176) => 'I', chr(196).chr(177) => 'i',

    chr(196).chr(178) => 'IJ',chr(196).chr(179) => 'ij',

    chr(196).chr(180) => 'J', chr(196).chr(181) => 'j',

    chr(196).chr(182) => 'K', chr(196).chr(183) => 'k',

    chr(196).chr(184) => 'k', chr(196).chr(185) => 'L',

    chr(196).chr(186) => 'l', chr(196).chr(187) => 'L',

    chr(196).chr(188) => 'l', chr(196).chr(189) => 'L',

    chr(196).chr(190) => 'l', chr(196).chr(191) => 'L',

    chr(197).chr(128) => 'l', chr(197).chr(129) => 'L',

    chr(197).chr(130) => 'l', chr(197).chr(131) => 'N',

    chr(197).chr(132) => 'n', chr(197).chr(133) => 'N',

    chr(197).chr(134) => 'n', chr(197).chr(135) => 'N',

    chr(197).chr(136) => 'n', chr(197).chr(137) => 'N',

    chr(197).chr(138) => 'n', chr(197).chr(139) => 'N',

    chr(197).chr(140) => 'O', chr(197).chr(141) => 'o',

    chr(197).chr(142) => 'O', chr(197).chr(143) => 'o',

    chr(197).chr(144) => 'O', chr(197).chr(145) => 'o',

    chr(197).chr(146) => 'OE',chr(197).chr(147) => 'oe',

    chr(197).chr(148) => 'R',chr(197).chr(149) => 'r',

    chr(197).chr(150) => 'R',chr(197).chr(151) => 'r',

    chr(197).chr(152) => 'R',chr(197).chr(153) => 'r',

    chr(197).chr(154) => 'S',chr(197).chr(155) => 's',

    chr(197).chr(156) => 'S',chr(197).chr(157) => 's',

    chr(197).chr(158) => 'S',chr(197).chr(159) => 's',

    chr(197).chr(160) => 'S', chr(197).chr(161) => 's',

    chr(197).chr(162) => 'T', chr(197).chr(163) => 't',

    chr(197).chr(164) => 'T', chr(197).chr(165) => 't',

    chr(197).chr(166) => 'T', chr(197).chr(167) => 't',

    chr(197).chr(168) => 'U', chr(197).chr(169) => 'u',

    chr(197).chr(170) => 'U', chr(197).chr(171) => 'u',

    chr(197).chr(172) => 'U', chr(197).chr(173) => 'u',

    chr(197).chr(174) => 'U', chr(197).chr(175) => 'u',

    chr(197).chr(176) => 'U', chr(197).chr(177) => 'u',

    chr(197).chr(178) => 'U', chr(197).chr(179) => 'u',

    chr(197).chr(180) => 'W', chr(197).chr(181) => 'w',

    chr(197).chr(182) => 'Y', chr(197).chr(183) => 'y',

    chr(197).chr(184) => 'Y', chr(197).chr(185) => 'Z',

    chr(197).chr(186) => 'z', chr(197).chr(187) => 'Z',

    chr(197).chr(188) => 'z', chr(197).chr(189) => 'Z',

    chr(197).chr(190) => 'z', chr(197).chr(191) => 's'

    );



    $string = strtr($url ? urldecode($string) : $string, $chars);



    return $string;

}



// multi-bytes strings

private function ch($x)

{



$original_x = $this->l_mb_string($x);



$x_a = mb_convert_encoding($x, 'iso-8859-1', 'utf-8');



$x   = $x_a ? $x_a : $x;



$x   = mb_convert_encoding($x, 'UTF-8', 'CP1251');



if($this->isRussian($x) <= 3)

$x = htmlentities($original_x, ENT_QUOTES, "UTF-8");





    if (!strlen($x))

        return 'unknown';

    else

        return $x;

  

}



// generate a keyword for search cover in google

private function rpl($artist, $p = 1)

{

    

    

    $pls = '+';

    

    if ($p == 0)

        $pls = '';

    

    $artist1  = str_replace('.', $pls, $artist);

    $artist2  = str_replace(' ', $pls, $artist1);

    $artist3  = str_replace('&', $pls, $artist2);

    $artist4  = str_replace('()',$pls, $artist3);

    $artist5  = str_replace('(', $pls, $artist4);

    $artist6  = str_replace(')', $pls, $artist5);

    $artist7  = str_replace('*', $pls, $artist6);

    $artist8  = str_replace('$', $pls, $artist7);

    $artist9  = str_replace('#', $pls, $artist8);

    $artist10 = str_replace('!', $pls, $artist9);

    $artist11 = str_replace('@', $pls, $artist10);

    $artist12 = str_replace('^', $pls, $artist11);

    $artist13 = str_replace('~', $pls, $artist12);

    $artist14 = str_replace('=', $pls, $artist13);

    $artist15 = str_replace('-', $pls, $artist14);

    $artist16 = str_replace('_', $pls, $artist15);

    $artist19 = str_replace('|', $pls, $artist16);

    $artist20 = str_replace('<', $pls, $artist19);

    $artist21 = str_replace('>', $pls, $artist20);

    $artist22 = str_replace(':', $pls, $artist21);

    $artist23 = str_replace(';', $pls, $artist22);

    

    return $artist23;

    

}

// create music page (my tracks)

public function create(){



$this->template->assign(['this' => $this, 'cmd' => $this->cmd, '_musheader' => $this->musheader, '_musfooter' => $this->musfooter]);

$content = $this->template->fetch($this->theme_dir."/my-tracks.html");



echo $this->getPage($content);

}





// popular page

public function popularColTracks(){



$this->template->assign(['this' => $this, 'cmd' => $this->cmd, '_musheader' => $this->musheader, '_musfooter' => $this->musfooter]);

$content = $this->template->fetch($this->theme_dir."/popular.html");



echo $this->getPage($content);

}



// collection details

public function collectionDetails(){

	

$coll_id = isset($_GET['id']) ? (int) $this->test_input($_GET['id']) : '';

	

$sql = "SELECT  * from ".tbl_playlists." where `id`='{$coll_id}' limit 1";	

$query = $this->__om_query($sql);	

$this->template->assign(['this' => $this, 'collection_id' => $coll_id, 'query' => $query, 'cmd' => $this->cmd, '_musheader' => $this->musheader, '_musfooter' => $this->musfooter]);

$content = $this->template->fetch($this->theme_dir."/collection-details.html");



echo $this->getPage($content);	

	

}

// get tracks from collection

public function collectionTracks($collection_id) {

	

	$query = $this->__om_query("

                         SELECT t.id as tid, t.artist as artist, t.album as album, t.time as time, t.title as title, t.cover as cover, t.path as path, t.storage as storage from ".tbl_songs." t, ".tbl_playlist_pos." p where t.id = p.trackid and p.playlistid='{$collection_id}'

						 group by t.id ORDER BY p.position ASC, p.id DESC

						 ");

						 

						 return $query;

	

	

}



// get user's tracks

public function myTracks(){

	

    // sql query

    $sql = "SELECT m1.*,m2.position,m2.added FROM ".tbl_songs." m1 

             INNER JOIN (

            SELECT musid,position,id,added

            FROM ".tbl_music."

            where owner='{$this->userid}'

            ) m2 ON m1.id = m2.musid ORDER BY m2.position ASC,m2.added DESC limit 60";



    $query = $this->__om_query($sql);

	return $query;

}



// count user collections

public function myCollectionsCount(){

	

	$c = $this->db->query("select COUNT(*) from ".tbl_playlists." where `owner`='{$this->userid}'");

	$c = $c->fetch_row();

	return $c[0];

	

}



// popular collections

public function popularCollections(){

	

// get the first 12 popular playlists

$sql = "

     select p.*, COUNT(pp.trackid) as pl_c from ".tbl_playlists." p 

     inner join ".tbl_playlist_pos." pp on pp.playlistid = p.id 

     where p.playcount !='-0' and p.favorite_cover != '' and p.favorite_cover IS NOT NULL

     group by p.id having COUNT(pp.trackid) >= '5'

     ORDER BY p.playcount,p.added desc LIMIT 12

     ";

	 

	return $this->__om_query($sql);

	

}



// popular tracks

public function popularTracks(){

	

$sql = "

        select distinct m.*, m.added as dtb from ".tbl_songs." m 

        where m.artist!='Unknown Artist' and m.title!='unknown'

        order by m.year * 1 desc,rand() LIMIT 40";

	return $this->__om_query($sql);

}



// get user's collections

public function myCollections(){

	



$query = $this->__om_query("SELECT distinct p.*,COUNT(pp.trackid) as s_count

                 FROM ".tbl_playlists." p

                 left join ".tbl_playlist_pos." pp on pp.playlistid = p.id OR pp.playlistid = p.originalpid 

                 WHERE  p.owner = '{$this->userid}'

                  group by p.id ORDER BY p.id DESC");



	return $query;

}

public function search_for_covers($key,$limit = 3,$urlencode = true){

	$opts = array(

  'http'=>array(

    'method'=>"GET",

    'header'=>"X-Mashape-Key: ".$this->settings['X-Mashape-Key']               

  )

);



$context = stream_context_create($opts);

$key = $urlencode ? urlencode($key) : $key;

// Open the file using the HTTP headers set above

$res = file_get_contents(sprintf($this->settings['RAPIDAPI_IMAGES'],$key,3), false, $context);



return json_decode($res, true);

	

}

// upload files

public function UploadTracks(){



//define variables

$count   = 0;

$searchG = "bad";

$singer  = $this->singer; // from settings

$this->vimeo   = new phpVimeo($this->VIMEO_APP_ID, $this->VIMEO_APP_SECRET);

$artist  = $song = $album = $year = $comment = $genre = $recCover = $srchim = $message = $b0 = $db_video = $ex_v = $id_video = $cover_file = "";

$dir_cov = str_replace('..','',__FILE_COVER_DIR);

$aws = $this->storage['s3'];

$storage = NULL;



// upload

if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {

    

    // Loop $_FILES to execute all files

    foreach ($_FILES['files']['name'] as $f => $name) {

        if ($_FILES['files']['error'][$f] == 4) {

            continue; // Skip file if any error found

        }

        if ($_FILES['files']['error'][$f] == 0) {

            if ($_FILES['files']['size'][$f] > $this->max_file_size) {

                $message[] = "$name is too large!.";

                continue; // Skip large files

            } elseif (!in_array(pathinfo(strtolower($name), PATHINFO_EXTENSION), $this->valid_formats)) {

                $message[] = "$name is not a valid format, only " . $this->valid_formats[1];

                continue; // Skip invalid file formats

                

            } else {

                

                $temp    = explode('.', $_FILES['files']['name'][$f]);

                $newName = mt_rand().mt_rand().mt_rand(). '.' . end($temp);



				$s3_uploaded = 1;



                // No error found! Move uploaded files 

                if (move_uploaded_file($_FILES["files"]["tmp_name"][$f], $this->output_dir . $newName)) {

					

					if($aws){

						$storage = 's3';

						if(!$this->uploadToStorage($this->output_dir . $newName, $this->output_dir . $newName, $newName))

							$s3_uploaded = false;

						

					} 

					

					if($s3_uploaded){

					

                    $count++; // Number of successfully uploaded files

                    

                    /* analyze the file and get details of it */

                    

                    $name_m   = $_FILES["files"]["name"][$f];

                    $name_n   = explode(".", $name_m);

                    $filename = $newName;

                    $nameb    = explode(".", $filename);

                    

                    // build getId3

                    $getID3 = new getID3;

                    $getID3->encoding = 'UTF-8';  

					

					$pathtos3 = $this->tracks_storage_path.$this->files_dir;

					$covers_pathtos3 = $this->covers_storage_path;

					$aws_path = $this->storage['s3_https'].$this->storage['s3_bucket_name'].'.s3.amazonaws.com/'.$pathtos3.$filename;

                    $uploadedFile = $this->output_dir . $filename;

                    $ThisFileInfo = $getID3->analyze($uploadedFile);

                    

		    // check if file contain tags and bitrate not less 128kbs

		    if(isset($ThisFileInfo['error'][0]) || (!$ThisFileInfo['audio']['bitrate'] || $ThisFileInfo['audio']['bitrate'] < 128000)){

		    @unlink($uploadedFile);

		    die('Sorry, the file ['.$name.'] should meet the following technical requirements: bit rate not less than

			 128kbps, sampling frequency not less than 44,1 kHz.');

		    }

                    

                    if (isset($ThisFileInfo['tags'][0]['id3v1']['title'][0])) {

                        $song = $this->ch($this->esc($ThisFileInfo['tags'][0]['id3v1']['title'][0]));

                    } else if (isset($ThisFileInfo['tags']['id3v2']['title'][0])) {

                        $song = $this->ch($this->esc($ThisFileInfo['tags']['id3v2']['title'][0]));

                    } else {

                        $song = "unknown";

                    }

                    

                    if (isset($ThisFileInfo['tags']['id3v2']['artist'][0])) {

                        $artist = $this->ch($this->esc($ThisFileInfo['tags']['id3v2']['artist'][0]));

			$artist_ch = $ThisFileInfo['tags']['id3v2']['artist'][0];

                    } else if (isset($ThisFileInfo['tags']['id3v1']['artist'][0])) {

                        $artist = $this->ch($this->esc($ThisFileInfo['tags']['id3v1']['artist'][0]));

			$artist_ch = $ThisFileInfo['tags']['id3v1']['artist'][0];

                    } else {

                        $artist = "Unknown Artist";

			$artist_ch = $artist;

                    }

                    

                    if (isset($ThisFileInfo['tags']['id3v2']['album'][0])) {

                        $album = $this->ch($this->esc($ThisFileInfo['tags']['id3v2']['album'][0]));

                    } else if (isset($ThisFileInfo['tags']['id3v1']['album'][0])) {

                        $album = $this->ch($this->esc($ThisFileInfo['tags']['id3v1']['album'][0]));

                    } else {

                        $album = "unknown album";

                    }

                    

                    if (isset($ThisFileInfo['tags']['id3v1']['year'][0])) {

                        $year = $this->esc($ThisFileInfo['tags']['id3v1']['year'][0]);

                    } else if (isset($ThisFileInfo['tags']['id3v2']['year'][0])) {

                        $year = $this->esc($ThisFileInfo['tags']['id3v2']['year'][0]);

                    } else {

                        $year = "unknown";

                    }

                    

                    

                    if (isset($ThisFileInfo['tags']['id3v2']['comment'][0])) {

                        $comment = $this->ch($this->esc($ThisFileInfo['tags']['id3v2']['comment'][0]));

                    } else if (isset($ThisFileInfo['tags']['id3v1']['comment'][0])) {

                        $comment = $this->ch($this->esc($ThisFileInfo['tags']['id3v1']['comment'][0]));

                    } else {

                        $comment = $artist;

                    }

                    

                    if (isset($ThisFileInfo['tags']['id3v2']['genre'][0])) {

                        $genre = $this->esc($ThisFileInfo['tags']['id3v2']['genre'][0]);

                    } else if (isset($ThisFileInfo['tags']['id3v1']['genre'][0])) {

                        $genre = $this->esc($ThisFileInfo['tags']['id3v1']['genre'][0]);

                    } else {

                        $genre = "unknown";

                    }

                    

                    if (isset($ThisFileInfo['id3v2']['COMM'][0]['languagename'])) {

                        $language = $this->esc($ThisFileInfo['id3v2']['COMM'][0]['languagename']);

                    } else {

                        $language = "unknown";

                    }

                    

                    if (isset($ThisFileInfo['playtime_string']))

                        $duration = $this->esc($ThisFileInfo['playtime_string']);

                    else

                        $duration = "unknown";

                    

// create cover from file [implemented in v1.5]

if(!file_exists(FILES__ROOT__.__MOB_FILE_COVER_DIR.$this->rplchr($this->clean_string($artist)).'___'.$this->rplchr($this->clean_string($album)).'.png')){

if (isset($getID3->info['id3v2']['APIC'][0]['data'])) { 

   $cover_file = $getID3->info['id3v2']['APIC'][0]['data']; 

} elseif (isset($getID3->info['id3v2']['PIC'][0]['data'])) { 

   $cover_file = $getID3->info['id3v2']['PIC'][0]['data']; 

} else { 

   $cover_file = ''; 

} 

if (isset($getID3->info['id3v2']['APIC'][0]['image_mime'])) { 

   $mimetype = $getID3->info['id3v2']['APIC'][0]['image_mime']; 

} else { 

   $mimetype = 'image/jpeg';

} 



if (!empty($cover_file)) {





// Send file 

header("Content-Type: " . $mimetype); 



if (isset($getID3->info['id3v2']['APIC'][0]['image_bytes'])) { 

    header("Content-Length: " . $getID3->info['id3v2']['APIC'][0]['image_bytes']); 

} 

$cover_fullname = $this->rplchr($this->clean_string($artist)).'___'.$this->rplchr($this->clean_string($album)).'.png';

$cover_full_path = FILES__ROOT__.__MOB_FILE_COVER_DIR.$cover_fullname;

if(file_put_contents($cover_full_path, $cover_file)){

$recCover = '/music/'.$dir_cov.$cover_fullname;



	if($aws){

		

		if($this->s3->putObjectFile($cover_full_path, $this->storage['s3_bucket_name'], $covers_pathtos3.'/'.$cover_fullname, S3::ACL_PUBLIC_READ))

						$recCover = $this->storage['s3_https'].$this->storage['s3_bucket_name'].'.s3.amazonaws.com/'.$this->covers_storage_path.'/'.$cover_fullname;

		



		// delete cover from local storage

		@unlink($cover_full_path);

			

	}





}else

$recCover = $this->defaultCover;



} else {





                    // receive name of the cover and send in google

                    if ($artist !== $name_n[0] && $artist !== 'Unknown Artist') {

                        $searchG      = "ok";

                        $cover_search = $this->es_rus($artist_ch);///$this->rplchr($this->rpl($artist));

                    } else if ($song != "unknown") {

                        $searchG      = "bad";

                        $cover_search = $this->rplchr($this->rpl($song));

                    } else if ($album != "unknown") {

                        $searchG      = "bad";

                        $cover_search = $this->rplchr($this->rpl($album));

                    } else {

                        $searchG = "bad";

                        $b0      = $this->rplchr($this->rpl($artist));

                        if (!empty($b0)) {

                            $searchG      = "bad";

                            $cover_search = $this->rplchr($this->rpl($artist));

                        }

                        

                    }

                                      

                    

                    // get cover from rapidapi

                    if ($searchG === 'bad') {

                       

                        

                        $recCover = $this->defaultCover;

                    }

                    

} // else [ if file has no cover ]



}else // else [ if for current uploading song exist already cover ]

$recCover = '/music/'.$dir_cov.$this->rplchr($this->clean_string($artist)).'___'.$this->rplchr($this->clean_string($album)).'.png';



                    // get video from vimeo

                    $v_art  = preg_replace("/\([^)]+\)/", "", $artist);

                    $v_song = preg_replace("/\([^)]+\)/", "", $song); 

                  /*  if ($v_art !== 'Unknown Artist' && $v_song !== 'unknown')

                        $video = $this->vimeo_get_video($this->rplchr($v_art) . ' ' . $this->rplchr($v_song));

                    else

                        $video = '0';*/

                    $video = '0';

                    if ($video !== '0' && array_key_exists('0', $video) && $video['0']->embed_privacy == 'anywhere') {

                        $video       = $video['0'];

                        $id_video    = $video->id;

                        $title_video = $video->title;

                    } else if ($video !== '0' && array_key_exists('1', $video) && $video['1']->embed_privacy == 'anywhere') {

                        $video       = $video['1'];

                        $title_video = $video->title;

                        $id_video    = $video->id;

                    } else if ($video !== '0' && array_key_exists('2', $video) && $video['2']->embed_privacy == 'anywhere') {

                        $video       = $video['2'];

                        $id_video    = $video->id;

                        $title_video = $video->title;

                    }

                    

                    if ($id_video && $title_video)

                        $db_video = strstr(strtolower($title_video), strtolower(trim($v_song, " "))) ? $id_video : '0';

                    

                    $path     = $newName;

                    $time     = $this->esc($duration);

                    $cover    = $this->esc($recCover);

                    $title    = $song;

                    $added    = time();

                    $uploader = $this->esc($this->USER['id']);

                    $method   = $_POST['uploadin'];

		    $pl_covr  = isset($_POST['pl_cover']) ? $_POST['pl_cover'] : '';

		    $artist   = $artist !== 'Unknown Artist' ? $artist : $name;

		    $artist_x   = str_replace('+', '&', $artist);

		    $song     = str_replace('+', '&', $song);

		    $album    = str_replace('+', '&', $album);

		    $artist   = str_replace('&amp;', '&', $artist_x);



		    // Escape artist, album ,song

         	$artist   = $this->test_input($artist);

		    $song     = $this->test_input($song);

		    $album    = $this->test_input($album);





                    //insert into db                   

                    $insert     = $this->__om_query_insert("insert into ".nobil_om_songs." set 

                          				   `storage`='{$storage}',`artist`='{$artist}',`title`='{$song}',`time`='{$time}',`genre`='{$genre}',`album`='{$album}',`cover`='{$cover}',`video`='{$db_video}',`language`='{$language}',`year`='{$year}',`comment`='{$comment}',`added`='{$added}',`uploader`='{$uploader}',`path`='{$path}'");

                    $insertedId = $insert; // new inserted id

                    

                    if ($method === 'mymusic'){

                        $insertIntoMyMusic = $this->__om_query_insert("insert into ".nobil_om_my_music." SET `musid`='$insertedId',`uploader`='$uploader',`added`='$added',`owner`='" . $this->USER['id']."'");

						//$this->toFeed($insertedId);

                  }  else {



                        $insertIntoPlaylist_a = $this->__om_query_insert("insert into ".nobil_om_playlist_pos." SET `trackid`='$insertedId',`playlistid`='$method'");

                        $insertIntoPlaylist = $this->__om_query_update("update ".nobil_om_playlists." SET `updates`='yes' where `originalpid`='$method'");

			//$this->toFeed($insertedId,$method);

			// set to playlist cover if it haven't

			if(($pl_covr == $this->collection_img || $pl_covr == $this->defaultCover || !$pl_covr) && $cover)

			$this->__om_query_update("update ".nobil_om_playlists." SET `favorite_cover`='$cover' where id=".$method);



                    }

					

					if($storage)

						@unlink($uploadedFile);

					

                    if (!$insertedId) {

                        @unlink($uploadedFile);

                        $message[] = "Error! [ Connect to database ], the file have been deleted, please try again.";

                    }

                    

                    

                }

			}

            }

        }

    }

}



if ($message) {

    

    foreach ($message as $msg)

        echo $msg;

    

} else

    echo 'OK';





}

public function addCollection(){

	

	

	

	$this->template->assign(["this" => $this,'cmd' => $this->cmd, '_musheader' => $this->musheader, '_musfooter' => $this->musfooter]);

	 

	$content = $this->template->fetch($this->theme_dir."/add-collection.html");



	echo $this->getPage($content);	

	

}

public function MyPlayists(){

	

	

	$this->template->assign(["this" => $this,'cmd' => $this->cmd, '_musheader' => $this->musheader, '_musfooter' => $this->musfooter]);

	 

	$content = $this->template->fetch($this->theme_dir."/my-playists.html");



	echo $this->getPage($content);	

	

}

public function getPage($content,$page = false){





if($this->view_as_json)

return json_encode(array("page" => $page ? $page : '', "content" => $content));

else 

return $content;



}



// delete song [ for playlists and my music ]

public function deleteSong(){



	$m_id = isset($this->USER['id']) ? (int) $this->USER['id'] : 0;

    $m_d_sql = "delete from ".tbl_music." where `musid`='{$this->trackid}' AND `owner`='{$m_id}'";

    $p_d_sql = "delete from ".tbl_playlist_pos." where `trackid`='{$this->trackid}' AND `playlistid`='{$this->b}'";

     

	// update to feed

	//$this->__om_query_update("update ".tbl_feed." set `itemid`=TRIM(BOTH ',' FROM REPLACE(REPLACE(itemid, '{$this->trackid}', ''), ',,', ','))

					//		where `byuser`='{$m_id}' && `categ`='music' && FIND_IN_SET('{$this->trackid}',itemid)");

	// delete from feed where itemid is NULL					

	//$this->__om_query_delete("delete from ".tbl_feed." where `byuser`='{$m_id}' and `categ`='music' and `itemid`=''");

	

    $s_q_l = ($this->d === 'm' ? $m_d_sql : $p_d_sql);

    

	$delete = $this->__om_query_delete($s_q_l);

    if($delete)

    echo 1;

    else echo 0;



}

// add tracks to my music collection

public function addTrack(){



    $now = time();

    if ($this->b === 'm') {

        $select         = $this->__om_query("select id,uploader from ".tbl_songs." where id='$this->trackid'");

        foreach($select as $result) $select = $result;

        $mymus          = count($this->__om_query("select id from ".tbl_music." where musid='$this->trackid' and owner = '" . $this->USER['id']."'"));

        $my_songs_count = count($this->__om_query("select id from ".tbl_music." where owner = '" . $this->USER['id']."'"));

        $uploader       = ($select['uploader'] ? $select['uploader'] : '0');

        $added          = time();

        $musid          = $select['id'];

        if ($mymus >= 1) {

            $this->__om_query_update("update ".tbl_music." set `added`='{$now}',`position`='0' where `musid`='{$musid}' and `owner`='" . $this->USER['id']."'");

            echo $my_songs_count;

            exit();

        } //die('Sorry, but the track already exist into your music'); 

        else if (!$select['id'])

            die('Sorry, but the track has not found, please try again');

        $addMusic = $this->__om_query_insert("insert into ".tbl_music." SET `musid`='{$musid}',`uploader`='{$uploader}',`added`='{$added}',`owner`='" . $this->USER['id']."'");

	

	// insert into news feed 

	//$this->m_toFeed($musid);



        echo $my_songs_count + 1;

        die();

        

    } else if ($this->b === 'p') {

        

        $sql   = "select m.id,COUNT(pp.trackid) from ".tbl_songs." m left join ".tbl_playlist_pos." pp ON pp.playlistid = '{$this->c}' and pp.trackid = '{$this->trackid}' where m.id = '{$this->trackid}' ";

        $ssl   = $this->__om_query($sql);

        foreach($ssl as $p_s)

        $p_s = $p_s;

        $mymus = $p_s['COUNT(pp.trackid)'];

        $musid = $p_s['id'];

        if ($mymus >= 1)

            echo '1'; //die('Sorry, but the track already exist into your music'); 

        else if (!$p_s['id'])

            die('Sorry, but the track has not found, please try again');

        $addMusic = $this->__om_query("insert into ".tbl_playlist_pos." SET `trackid`='{$this->trackid}',`playlistid`='{$this->c}'");



	// insert into news feed 

	//$this->m_toFeed($this->trackid,$this->c);



        echo '1';

        

    }



}





function deleteCollection(){

	

	$p_id = isset($_POST['id']) ? (int) $_POST['id'] : 0;

	

	if($this->__om_query_update("update ".tbl_playlists." set `owner`='0' where `id`='{$p_id}'"))

		echo 1;

	else 

		echo 0;

	

}

// insert track in news feed

public function m_toFeed($tid,$parent_id = 0){

$now = time();

$i = $this->USER['id'];

$minus_12_hours = strtotime("-12 hours");



$check = $this->db->query("select `itemid`,`id` from ".tbl_feed." where `byuser`='{$i}' and `categ`='music' and `parent_id` = '{$parent_id}' order by added desc limit 1");

$check_r = $check->fetch_array(MYSQLI_ASSOC);



if(!$check_r['id']){

$check = $this->db->query("select `itemid`,`id` from ".tbl_feed." where `byuser`='{$i}' and `categ`='music' and `parent_id` = '{$parent_id}' and `added` >= '{$minus_12_hours}' order by added desc limit 1");

$check_r = $check->fetch_array(MYSQLI_ASSOC);

}



if(!$check_r['id']){

// insert into news feed 

$toFeed = $this->__om_query_insert("insert into ".tbl_feed." set `byuser`='{$i}',`itemid`='{$tid}',`added`='{$now}', `categ`='music', `parent_id` = '{$parent_id}'");

}

 else {

	

if(! strpos($check_r['itemid'], $tid) ){



// update

$tid = $tid.','.$check_r['itemid'];

$feed_id = $check_r['id'];

$toFeed = $this->__om_query_update("update ".tbl_feed." set `itemid`='{$tid}',`added`='{$now}' where `id` = '{$feed_id}'");

}





}





}

// add foreign collections to my collections archive

public function addForeignCollection(){



    if ($this->c) {

        $now   = time();

        $name  = $this->test_input(urldecode($_POST['n']));

        $plco  = $this->test_input($_POST['m']);

        $orig  = '-' . $this->test_input($_POST['l']);

        $cover = $this->test_input(urldecode($_POST['i']));

        $songs = isset($_POST['song']) ? $_POST['song'] : false;

        



        

        $insert_into_playlist = $this->__om_query_insert("insert into ".tbl_playlists." set 

                                `added`='{$now}',

                                `owner`='" . $this->USER['id'] . "',

                                `name`='{$name}',

                                `playcount`='-0',

                                `originalpid`='{$orig}',

                                `favorite_cover`='{$cover}'") or die('0');

        

        $om_tb_playlists_id = $insert_into_playlist;

        if ($om_tb_playlists_id) {

            

            // after collection is successfully addded, insert songs in it

            if($songs) {

				foreach ($songs as $id)

                $insert_songs = $this->__om_query_insert("insert into ".tbl_playlist_pos." set `trackid`='{$id}', `playlistid`='{$om_tb_playlists_id}'");

			}

            echo $om_tb_playlists_id;

            die;

        } else

            die('0');

    }

    

    $sql_select_collection_data = $this->__om_query("select * from ".tbl_playlists." where id='" . $this->b . "'");

  

    foreach($sql_select_collection_data as $result)

    $sql_select_collection_data = $result;    



    if ($sql_select_collection_data) {

        $insert_into_playlist = $this->__om_query_insert("insert into ".tbl_playlists." set 

                                `added`='" . $sql_select_collection_data['added'] . "',

                                `owner`='" . $this->USER['id'] . "',

                                `name`='" . $sql_select_collection_data['name'] . "',

                                `playcount`='" . $sql_select_collection_data['playcount'] . "',

                                `originalpid`='" . $sql_select_collection_data['id']."',

				`favorite_cover`='" . $sql_select_collection_data['favorite_cover']."'

				");



        if ($insert_into_playlist)

            echo '1';

        

    } else

        echo '0';



}

 

public function userTracks(){

 $user_id  = isset($_GET['uid']) ? $this->test_input($_GET['uid']) : 0;

 

 $pl_query = $s_query = array();

 

 if($user_id){

 $userdetails = $this->getUserDetails($user_id);

// query for user's playlists

$pl_query = $this->__om_query(" SELECT distinct p.*,COUNT(pp.trackid) as s_count

                 FROM ".tbl_playlists." p

                 left join ".tbl_playlist_pos." pp on pp.playlistid = p.id OR pp.playlistid = p.originalpid 

                 WHERE  p.owner = '{$user_id}'

                  group by p.id HAVING(s_count) > 0 ORDER BY p.id DESC");

 



// query for user's songs

$s_query = $this->__om_query("select mm.owner,mm.musid,m.* from ".tbl_music." mm, ".tbl_songs." m WHERE m.id=mm.musid and mm.owner = '{$user_id}' group by m.id order by m.id desc limit 90");



 }

	$this->template->assign(["this" => $this, "playlists" => $pl_query, "tracks" => $s_query, "uname" => $userdetails['name'], "uid" => $user_id, '_musheader' => $this->musheader, '_musfooter' => $this->musfooter ]);

	 

	$content = $this->template->fetch($this->theme_dir."/user-tracks.html");



	echo $this->getPage($content);

	

}



public function searchTracks() {

	

	

	$key = isset($_GET['key']) ? $this->test_input($_GET['key']) : ( isset($_POST['key']) ? $this->test_input($_POST['key']) : '' );

	$in = isset($_GET['in']) ? $this->test_input($_GET['in']) : ( isset($_POST['in']) ? $this->test_input($_POST['in']) : '' );

    @list($key_one, $key_two) = @explode(' ', $key);

    $key_one = isset($key_one) ? $key_one : $key;

    $key_two = isset($key_two) ? $key_two : $key;

	

	

	

	if($in == 'playlists')

    $query = $this->__om_query("select name,id,favorite_cover from ".tbl_playlists." 

            where name like N'%$key%' 

            or name like N'%$key_one%' 

            or name like N'%$key_two%' 

             group by id order by name desc limit 99");	

	else

    $query = $this->__om_query("select id,artist,title,album,time,cover,path,video,language,storage from ".tbl_songs."

            where artist like N'%$key%' or title like N'%$key%' 

            or artist like N'%$key_one%' or title like N'%$key_one%' 

            or artist like N'%$key_two%' or title like N'%$key_two%' 

             group by id order by title desc limit 99");

  

 









	$count_tracks = $this->__om_query("select SQL_CALC_FOUND_ROWS id from ".tbl_songs."

            where artist like N'%$key%' or title like N'%$key%' 

            or artist like N'%$key_one%' or title like N'%$key_one%' 

            or artist like N'%$key_two%' or title like N'%$key_two%' 

             group by id order by title desc limit 1");

	$count_tracks = $this->db->query("select FOUND_ROWS() as c");

	$count_tracks = $count_tracks->fetch_array(MYSQLI_ASSOC);

	$count_tracks = $count_tracks['c'];



		

	$count_playlists = $this->__om_query("select SQL_CALC_FOUND_ROWS id from ".tbl_playlists." 

			where name like N'%$key%' 

            or name like N'%$key_one%' 

            or name like N'%$key_two%' 

             group by id order by name desc limit 1");

	$count_playlists = $this->db->query("select FOUND_ROWS() as c");

	$count_playlists = $count_playlists->fetch_array(MYSQLI_ASSOC);

	$count_playlists = $count_playlists['c'];



	$playlists_search = '/mmusic/search/playlists/'.$key.'/tk/'.time();

	$tracks_search = '/mmusic/search/'.$key.'/tk/'.time();

	

	

	



	$this->template->assign(["this" => $this,  "playlists_search" => $playlists_search,  "tracks_search" => $tracks_search,  'cmd' => $this->cmd, "in" => $in, "count_playlists" => $count_playlists, "k" => $key, "query" => $query, '_musheader' => $this->musheader, '_musfooter' => $this->musfooter,"count_tracks"=>$count_tracks]);

	 

	$content = $this->template->fetch($this->theme_dir."/search-result.html");



	echo $this->getPage($content);





}

public function UserAddedTracks(){



$id = isset($_GET['tid']) ? $_GET['tid'] : '';

$uid = isset($_GET['uid']) ? $this->test_input($_GET['uid']) : '';

 

$nArr = $selected_tracks = array();





if(!$id || !$uid) die;

else {

 $userdetails = $this->getUserDetails($uid);

$id = explode(",",$id);

$count = sizeof($id);





for($x=0;$x<$count;$x++){

$track = $id[$x];



if(!in_array($track,$selected_tracks)){



$selected_tracks[] = $track;

$s_query = $this->db->query("select * from ".tbl_songs." where id='{$track}' limit 1");

$a = $s_query->fetch_array(MYSQLI_ASSOC);

$nArr[] = array('id' => $a['id'],

	        'artist' => $a['artist'],

		'title' => $a['title'],

		'album' => $a['album'],

		'cover' => $a['cover'],

		'path' => $a['path'],

		'time' => $a['time'],

		'video' => $a['video'],

		'language' => $a['language'],
		'storage' => $a['storage']

						);

}

		

}

}



	$this->template->assign(["this" => $this, "tracks" => $nArr, "count" =>$count, "uname" => $userdetails['name'], "uid" => $uid, '_musheader' => $this->musheader, '_musfooter' => $this->musfooter ]);

	 

	$content = $this->template->fetch($this->theme_dir."/user-added-tracks.html");



	echo $this->getPage($content);

 



}





} // end class