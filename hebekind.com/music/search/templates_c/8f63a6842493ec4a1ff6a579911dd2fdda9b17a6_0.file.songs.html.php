<?php
/* Smarty version 3.1.34-dev-7, created on 2022-01-18 13:37:01
  from '/home/u631248999/domains/hebekind.com/public_html/music/template/search/songs.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_61e6c27daf7b67_92200415',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8f63a6842493ec4a1ff6a579911dd2fdda9b17a6' => 
    array (
      0 => '/home/u631248999/domains/hebekind.com/public_html/music/template/search/songs.html',
      1 => 1642509743,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61e6c27daf7b67_92200415 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-------------------- Result of song search [ template ] -------------------------->

<?php if ($_smarty_tpl->tpl_vars['count_songs']->value > 0) {
echo $_smarty_tpl->tpl_vars['this']->value->search_build_header($_smarty_tpl->tpl_vars['this']->value->keyword);?>
<div class="m_c_s_scrollable mus-custom-scrolling pl-mb-90" style="height: 590px;"><div class="mus_content_w"><div class="mus-tr_lst mus_scroll-overlay"><div class="mus_scroll-overlay_dummy"></div><ol><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['query']->value, 'result');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['result']->value) {
$_smarty_tpl->_assignInScope('download', '');
if ($_smarty_tpl->tpl_vars['result']->value['language'] === $_smarty_tpl->tpl_vars['purchase_ic']->value) {
$_smarty_tpl->_assignInScope('download', '__download');
}?><li target="#p0m_song_search_result_<?php echo $_smarty_tpl->tpl_vars['result']->value['id'];?>
"><div class="mus-tr_i  __has-video soh-s <?php echo $_smarty_tpl->tpl_vars['download']->value;?>
" id="tri_m_sec_search_result_<?php echo $_smarty_tpl->tpl_vars['result']->value['id'];?>
"><div class="mus-tr_hld"><span class="mus-tr_play __play js-mus-tr_play" id="p0m_song_search_result_<?php echo $_smarty_tpl->tpl_vars['result']->value['id'];?>
" title="Play" data-action="play" data-quest='{"song":"<?php echo $_smarty_tpl->tpl_vars['this']->value->track_path($_smarty_tpl->tpl_vars['result']->value['path'],$_smarty_tpl->tpl_vars['result']->value['storage']);?>
","cover":"<?php echo $_smarty_tpl->tpl_vars['this']->value->cover_path($_smarty_tpl->tpl_vars['result']->value['cover'],$_smarty_tpl->tpl_vars['result']->value['storage']);?>
"}'></span><?php if ($_smarty_tpl->tpl_vars['download']->value !== '') {?><span class="mus-tr_download js-mus-tr_download" title="Download"></span><?php }?><div class="mus-tr_cnt"><a class="mus-tr_a mus-tr_artist"><?php echo $_smarty_tpl->tpl_vars['result']->value['artist'];?>
</a>&nbsp;&#8211;&nbsp;<a class="mus-tr_a mus-tr_song"><?php echo $_smarty_tpl->tpl_vars['result']->value['title'];?>
</a><span class="foh-s mus-tr_info">&nbsp;from&nbsp;<a class="mus-tr_a mus-tr_album"><span class="mus-tr_album-ic ic10_album"></span><?php echo $_smarty_tpl->tpl_vars['result']->value['album'];?>
</a></span></div><div class="mus-tr_right-controls foh-s" id="rc_m_sec_search_result_<?php echo $_smarty_tpl->tpl_vars['result']->value['id'];?>
"><span class="mus-tr_add js-mus-tr_add" title="Add to My music"></span><span class="mus-tr_dropdown js-mus_dropdown_trigger" title="Add to the playlist"></span></div><span class="mus-tr_time"><?php echo $_smarty_tpl->tpl_vars['result']->value['time'];?>
</span></div><?php if ($_smarty_tpl->tpl_vars['result']->value['video'] > '0') {?><div class="mus-tr_video" data-showVideo="true" data-video="<?php echo $_smarty_tpl->tpl_vars['result']->value['video'];?>
"></div><?php }?></div></li><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></ol><div id="search_result_scr_ev" style="position:relative;bottom:-10px;padding:25px;left:45%;"></div><div data-search-key="<?php echo urlencode($_smarty_tpl->tpl_vars['this']->value->keyword);?>
" d-more-songs="true" data-search-scroll-event="<?php echo $_smarty_tpl->tpl_vars['this']->value->songs_limit;?>
"></div><?php } elseif ($_smarty_tpl->tpl_vars['count_albums']->value > 0 && $_smarty_tpl->tpl_vars['albums_redir']->value > '0') {
echo $_smarty_tpl->tpl_vars['this']->value->empty_result('albums');
} elseif ($_smarty_tpl->tpl_vars['count_albums']->value > 0 && $_smarty_tpl->tpl_vars['albums_redir']->value <= 0) {
echo $_smarty_tpl->tpl_vars['this']->value->search_build_header($_smarty_tpl->tpl_vars['this']->value->keyword);
echo $_smarty_tpl->tpl_vars['this']->value->empty_result(null,null,'No songs that matched to your search');
} else {
echo $_smarty_tpl->tpl_vars['this']->value->empty_result();
}
}
}
