<?php
/* Smarty version 3.1.34-dev-7, created on 2022-01-18 14:40:14
  from '/home/u631248999/domains/hebekind.com/public_html/music/mobile/layout/popular.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_61e6c33ee1b428_23246449',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6d21015d9960fde502e59d831b1ce9a28c438aeb' => 
    array (
      0 => '/home/u631248999/domains/hebekind.com/public_html/music/mobile/layout/popular.html',
      1 => 1642509742,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61e6c33ee1b428_23246449 (Smarty_Internal_Template $_smarty_tpl) {
ob_start();
echo $_smarty_tpl->tpl_vars['_musheader']->value;
$_prefixVariable1 = ob_get_clean();
$_smarty_tpl->_subTemplateRender($_prefixVariable1, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
if (count($_smarty_tpl->tpl_vars['this']->value->popularCollections())) {?><div class="music_album_lst_w __nativeScroll" style="display: inherit;"><ul class="music_album_lst"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['this']->value->popularCollections(), 'collection');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['collection']->value) {
$_smarty_tpl->_assignInScope('pl_cover', urldecode($_smarty_tpl->tpl_vars['collection']->value['favorite_cover']));
if (strstr($_smarty_tpl->tpl_vars['pl_cover']->value,'mp3_covers')) {
ob_start();
echo urldecode($_smarty_tpl->tpl_vars['collection']->value['favorite_cover']);
$_prefixVariable2=ob_get_clean();
$_smarty_tpl->_assignInScope('pl_cover', $_prefixVariable2);
}?><li class="music_album_i" data-func="open" role="link"><A class="mobmusic-album-a" href="/mmusic/collection/<?php echo $_smarty_tpl->tpl_vars['collection']->value['id'];?>
" hrefattr="true"><?php if ($_smarty_tpl->tpl_vars['collection']->value['favorite_cover']) {?><img class="music_album_img" src="<?php echo $_smarty_tpl->tpl_vars['pl_cover']->value;?>
"><?php }?><div class="music_album_name-w"><div class="music_album_name"><?php echo urldecode($_smarty_tpl->tpl_vars['collection']->value['name']);?>
</div></div></a></li><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></ul></div><?php }?><div class="music_track_lst-w"><ul class="music_track_lst"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['this']->value->popularTracks(), 'track');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['track']->value) {
?><li class="music_track_i" id="track_<?php echo $_smarty_tpl->tpl_vars['track']->value['id'];?>
"><div class="music_track_aux"><span class="music_track_time music_track_seek"><span></span>&nbsp;/&nbsp;</span><span class="music_track_time"><?php echo $_smarty_tpl->tpl_vars['track']->value['time'];?>
</span><a class="music_add" data-func="add" role="button"></a><a class="music_more" data-track-ap='{"id":"pm_sec_track_<?php echo $_smarty_tpl->tpl_vars['track']->value['id'];?>
","artist":"<?php echo urlencode($_smarty_tpl->tpl_vars['track']->value['artist']);?>
","track_title":"<?php echo urlencode($_smarty_tpl->tpl_vars['track']->value['title']);?>
"}' onclick="trackSet(this,event);" data-func="menu" role="button"></a></div><div class="music_track_cnt"><div class="mob-play-track-button pButton" onclick="mmPlay(this,event);" data-mob-track='{"time":"<?php echo $_smarty_tpl->tpl_vars['track']->value['time'];?>
","id":"mob-track-<?php echo $_smarty_tpl->tpl_vars['track']->value['id'];?>
","artist":"<?php echo urlencode($_smarty_tpl->tpl_vars['track']->value['artist']);?>
","track_name":"<?php echo urlencode($_smarty_tpl->tpl_vars['track']->value['title']);?>
","album_name":"<?php echo urlencode($_smarty_tpl->tpl_vars['track']->value['album']);?>
","file":"<?php echo $_smarty_tpl->tpl_vars['this']->value->track_path($_smarty_tpl->tpl_vars['track']->value['path'],$_smarty_tpl->tpl_vars['track']->value['storage']);?>
","cover":"<?php echo $_smarty_tpl->tpl_vars['this']->value->cover_path($_smarty_tpl->tpl_vars['track']->value['cover'],$_smarty_tpl->tpl_vars['track']->value['storage']);?>
"}'><div class="ai_play" style="background-image:url(<?php echo $_smarty_tpl->tpl_vars['track']->value['cover'];?>
)"><i class="i_play"></i></div><div class="mob-audio-placeholder"></div></div><span class="music_track_data"><span class="music_track_artist" data-func="goToArtist" role="link"><?php echo $_smarty_tpl->tpl_vars['track']->value['artist'];?>
</span><span class="music_track_album"><?php echo $_smarty_tpl->tpl_vars['track']->value['title'];?>
</span></span></div></li><?php
}
} else {
?><div class="mobmus-empty"><?php echo $_smarty_tpl->tpl_vars['this']->value->lang['no_tracks_on_site_at_the_momment'];?>
</div><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></ul></div><?php ob_start();
echo $_smarty_tpl->tpl_vars['_musfooter']->value;
$_prefixVariable3 = ob_get_clean();
$_smarty_tpl->_subTemplateRender($_prefixVariable3, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
}
}
