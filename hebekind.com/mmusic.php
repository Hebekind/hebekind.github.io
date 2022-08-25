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

						        

require_once('assets/init.php');
// engine file
require_once('music/__cache/class.Mobile-Music.php');

try {
	// build engine
	$mmusic = new MOBILE_MUSIC;
	
	$created = false;

	$cmd = isset($_GET['cmd']) ? $mmusic->test_input($_GET['cmd']) : ( isset($_POST['cmd']) ? $mmusic->test_input($_POST['cmd']) : '' );
	
	$view_as_json = isset($_GET['view_as']) ? $_GET['view_as'] : ( isset($_POST['view_as']) ?$_POST['view_as'] : '');
	

	if ($_SERVER['REQUEST_METHOD'] != "POST" && $cmd != 'mytracks' && !$view_as_json) {
		
		?><script>window.location='/mmusic/mytracks';</script><?php
	}
	
	switch($cmd){

	case 'popular':
	$mmusic->popularColTracks();
	break;
	
	case 'collectiondetails':
	$mmusic->collectionDetails();
	break;
	
	case 'myplaylists':
	$mmusic->MyPlayists();
	break;
	
	case 'add-collection':
	$mmusic->addCollection();
	break;
	
	case 'createCollection':
	 
	$mmusic->createCollection();
	break;
	case 'add-foreign-collection':
	$mmusic->addForeignCollection();
	break;
	
	case 'delete-collection':
	$mmusic->deleteCollection();
	break;
	
	case 'search-tracks':
	$mmusic->searchTracks();
	break;
	
	case 'upload':
	$mmusic->Upload();
	break;
	
	case 'deletesong':
	$mmusic->deleteSong();
	break;
	
	case 'addsong':
	$mmusic->addTrack();
	break;
	case 'user-tracks':
	$mmusic->userTracks();
	break;
	
	case 'addedFeed':
	$mmusic->UserAddedTracks();
	break;
	
	case 'upload-tracks':
	$mmusic->UploadTracks();
	break;
	
	case 'mytracks':
	default:
	error_reporting(0);
	// create page
 
	if ($_SERVER['REQUEST_METHOD'] != "POST" && !$view_as_json) {
    ob_start();
    $mmusic->create();
    $page_content = ob_get_contents();
    ob_end_clean();
	$wo['description'] = $wo['config']['siteDesc'];
	$wo['keywords']    = $wo['config']['siteKeywords'];
	$wo['page']        = 'Music';

	$wo['title']       = 'Music';

	$wo['content']     = $page_content;
 
	echo Wo_Loadpage('container');
	} else {
		$mmusic->create();
	}
	break;
	}
	



 

} catch (Exception $e) {
	print $e->getMessage();
}
