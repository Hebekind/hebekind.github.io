<?php
/* Smarty version 3.1.34-dev-7, created on 2020-11-09 16:40:18
  from '/var/www/vhosts/vps1957235.fastwebserver.de/localhost.vaneayoung.de/music/template/search/similar_songs.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fa970f2f24fc9_29955322',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1836ad57c952bb0e144c9116a4e6aa7efaa702f2' => 
    array (
      0 => '/var/www/vhosts/vps1957235.fastwebserver.de/localhost.vaneayoung.de/music/template/search/similar_songs.html',
      1 => 1596494178,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fa970f2f24fc9_29955322 (Smarty_Internal_Template $_smarty_tpl) {
?><!-------------------------------- SIMILAR SONGS (radio) [ template ] -------------------------->

<div class="mus_content_w"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['query']->value, 'result');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['result']->value) {
$_smarty_tpl->_assignInScope('download', '');
if ($_smarty_tpl->tpl_vars['result']->value['language'] === $_smarty_tpl->tpl_vars['this']->value->show_prch_icon) {
$_smarty_tpl->_assignInScope('download', '__download');
}
if ($_smarty_tpl->tpl_vars['c']->value === 0) {?><div class="mus_album"><div class="mus_album_i__fixed"><div class="mus_album_i_w"><div class="mus_album_side_w curPointer"><div class="mus_album_side mus_album_side__b"><img alt="" style="width:128px;height:128px;" class="mus_album_i" src="<?php echo $_smarty_tpl->tpl_vars['this']->value->default_cover;?>
"></div><div class="mus_album_side mus_album_side__a"><img alt="" style="width:128px;height:128px;" class="mus_album_i" src="<?php echo $_smarty_tpl->tpl_vars['result']->value['cover'];?>
"><img alt="" style="width:128px;height:128px;" class="mus_album_i" src="<?php echo $_smarty_tpl->tpl_vars['this']->value->default_cover;?>
"></div></div></div><div class="m_c_s_c_go_to mt-5"><?php echo $_smarty_tpl->tpl_vars['result']->value['artist'];?>
</div></div><div><div class="mus_h2 mb-5"><span class="mus_h2_tx ellip">Similar to <?php echo $_smarty_tpl->tpl_vars['this']->value->keyword;?>
</span></div></div><div class="mus-tr_lst mus_scroll-overlay"><div class="mus_scroll-overlay_dummy"></div><ol><?php }?><li target="#p99m_sec_artist_radio_<?php echo $_smarty_tpl->tpl_vars['result']->value['id'];?>
"><div class="mus-tr_i  __has-video soh-s <?php echo $_smarty_tpl->tpl_vars['download']->value;?>
" id="tri_m_sec_artist_radio_<?php echo $_smarty_tpl->tpl_vars['result']->value['id'];?>
"><div class="mus-tr_hld"><span class="mus-tr_play __play js-mus-tr_play" id="p99m_sec_artist_radio_<?php echo $_smarty_tpl->tpl_vars['result']->value['id'];?>
" title="Play" data-action="play" data-quest='{"song":"<?php echo $_smarty_tpl->tpl_vars['this']->value->track_path($_smarty_tpl->tpl_vars['result']->value['path'],$_smarty_tpl->tpl_vars['result']->value['storage']);?>
","cover":"<?php echo $_smarty_tpl->tpl_vars['this']->value->cover_path($_smarty_tpl->tpl_vars['result']->value['cover'],$_smarty_tpl->tpl_vars['result']->value['storage']);?>
"}' ></span><?php if ($_smarty_tpl->tpl_vars['download']->value !== '') {?><span class="mus-tr_download js-mus-tr_download" title="Download"></span><?php }?><div class="mus-tr_cnt"><a class="mus-tr_a mus-tr_artist"><?php echo $_smarty_tpl->tpl_vars['result']->value['artist'];?>
</a>&nbsp;&#8211;&nbsp;<a class="mus-tr_a mus-tr_song"><?php echo $_smarty_tpl->tpl_vars['result']->value['title'];?>
</a><span class="foh-s mus-tr_info">&nbsp;from&nbsp;<a class="mus-tr_a mus-tr_album"><span class="mus-tr_album-ic ic10_album"></span><?php echo $_smarty_tpl->tpl_vars['result']->value['album'];?>
</a></span></div><div class="mus-tr_right-controls foh-s" id="rc_m_sec_artist_radio_<?php echo $_smarty_tpl->tpl_vars['result']->value['id'];?>
"><span class="mus-tr_add js-mus-tr_add" title="Add to My music"></span><span class="mus-tr_dropdown js-mus_dropdown_trigger" title="Add to the playlist"></span></div><span class="mus-tr_time"><?php echo $_smarty_tpl->tpl_vars['result']->value['time'];?>
</span></div><?php if ($_smarty_tpl->tpl_vars['result']->value['video'] > '0') {?><div class="mus-tr_video" data-showVideo="true" data-video="<?php echo $_smarty_tpl->tpl_vars['result']->value['video'];?>
"></div><?php }?></div></li><?php $_smarty_tpl->_assignInScope($_smarty_tpl->tpl_vars['c']->value, $_smarty_tpl->tpl_vars['c']->value++ ,true);
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></ol></div></div></div></div></div></div></div><?php }
}
