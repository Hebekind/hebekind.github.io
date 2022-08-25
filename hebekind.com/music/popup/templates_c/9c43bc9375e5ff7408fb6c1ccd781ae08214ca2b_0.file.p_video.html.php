<?php
/* Smarty version 3.1.34-dev-7, created on 2022-01-18 13:34:46
  from '/home/u631248999/domains/hebekind.com/public_html/music/template/popups/p_video.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_61e6c1f6f2d5c0_49069822',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9c43bc9375e5ff7408fb6c1ccd781ae08214ca2b' => 
    array (
      0 => '/home/u631248999/domains/hebekind.com/public_html/music/template/popups/p_video.html',
      1 => 1642509743,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61e6c1f6f2d5c0_49069822 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!------------------ Video popup layer ---------------------------->

<div id="layer_popup"><div class="mus_get_video_big__loading"></div><div class="layer_ovr mus_video"></div><div class="mus_get_video_big"><div class="video_name"><?php echo $_smarty_tpl->tpl_vars['artist_name']->value;?>
 - <?php echo $_smarty_tpl->tpl_vars['song_name']->value;?>
</div><div><iframe src="//player.vimeo.com/video/<?php echo $_smarty_tpl->tpl_vars['song_id']->value;?>
?autoplay=1&amp;color=ff9933&amp;title=0&amp;byline=0&amp;portrait=0" width="801" height="450" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe><div id="mus_close_video_popup" class="layer_close mus_get_video_close_svg" title="Close Video"><svg viewBox="0 0 24 24"><path d="M22.2,4c0,0,0.5,0.6,0,1.1l-6.8,6.8l6.9,6.9c0.5,0.5,0,1.1,0,1.1L20,22.3c0,0-0.6,0.5-1.1,0L12,15.4l-6.9,6.9c-0.5,0.5-1.1,0-1.1,0L1.7,20c0,0-0.5-0.6,0-1.1L8.6,12L1.7,5.1C1.2,4.6,1.7,4,1.7,4L4,1.7c0,0,0.6-0.5,1.1,0L12,8.5l6.8-6.8c0.5-0.5,1.1,0,1.1,0L22.2,4z"></path></svg></div><div class="video_bottom_control"><div class="aligment"><div title="Play it later" style="display:none;" onclick="return jQuery.windowMusic('video_archive',<?php echo $_smarty_tpl->tpl_vars['song_id']->value;?>
,'<?php echo $_smarty_tpl->tpl_vars['artist_name']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['song_name']->value;?>
');" class="minimize"><span class="glyphicon glyphicon-time" style="padding-right: 5px;"></span>Play later</div><div title="Close Video" class="close" onclick="document.getElementById('mus_close_video_popup').click();">Close</div></div></div></div></div></div><?php }
}
