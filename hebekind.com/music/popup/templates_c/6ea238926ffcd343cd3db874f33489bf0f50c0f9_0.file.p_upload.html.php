<?php
/* Smarty version 3.1.34-dev-7, created on 2020-05-22 14:49:34
  from '/var/www/vhosts/vps1957235.fastwebserver.de/localhost.vaneayoung.de/music/template/popups/p_upload.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ec7e67e94f8d3_21016636',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6ea238926ffcd343cd3db874f33489bf0f50c0f9' => 
    array (
      0 => '/var/www/vhosts/vps1957235.fastwebserver.de/localhost.vaneayoung.de/music/template/popups/p_upload.html',
      1 => 1590158204,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ec7e67e94f8d3_21016636 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!--------------- Upload files [ popup layer ] -------------------------->

<div id="layer_popup"><div class="layer_ovr"></div><div class="up_music_layer_cnt" ><div class="mus_upload_title">By clicking "Select files" you accept and agree to abide by the terms and conditions of&nbsp;<a href="http://<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
/terms_and_condition.html" target="_blank" class="mus_upload_a il">regulations</a>.</div><div class="mus_upload_cnt"><label class="vl_btn" tabindex="0"><span>Select files</span><form name="musicformn" id="musicform" enctype="multipart/form-data" method="post"><input type="hidden" data-upload-hiden="true" name="uploadin" value="mymusic"><input type="hidden" data-upload-playlist-cover="true" name="pl_cover" value=""><input accept="audio/mpeg" class="vl_btn_it" multiple="multiple" id="files" name="files[]" size="1" title="" type="file" value=""></form></label></div><div class="mus_upload_tx">You should upload music files in MP3 format. Uploaded<br>file should meet the following technical requirements: bit rate not less than<br>128kbps, sampling frequency not less than 44,1 kHz.<br>Uploaded file should contain in IS3-tags the info on the singer<br>the title of the song and the name of the album, where it is published.</div><span class="layer_close ic ic_close"></span></div></div>
<?php }
}
