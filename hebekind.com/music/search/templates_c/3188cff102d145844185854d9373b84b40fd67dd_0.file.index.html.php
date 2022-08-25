<?php
/* Smarty version 3.1.34-dev-7, created on 2022-01-18 13:36:51
  from '/home/u631248999/domains/hebekind.com/public_html/music/template/search/index.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_61e6c27394a950_03561126',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3188cff102d145844185854d9373b84b40fd67dd' => 
    array (
      0 => '/home/u631248999/domains/hebekind.com/public_html/music/template/search/index.html',
      1 => 1642509743,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61e6c27394a950_03561126 (Smarty_Internal_Template $_smarty_tpl) {
?><!----------------------------------  search [template] --------------------------->
<?php if ($_smarty_tpl->tpl_vars['inx']->value !== '') {
echo $_smarty_tpl->tpl_vars['this']->value->search_build_header($_smarty_tpl->tpl_vars['key']->value);
} else { ?><div class="m_c_s_alb" id="windowMusic_search_container"><div class="m_c_s_header"><div class="m_c_s_headerWrapper"><div class="m_c_s_header_title">Artist&nbsp;</div></div></div><?php }
if ($_smarty_tpl->tpl_vars['count_rows']->value > 0) {
$_tmp_array = isset($_smarty_tpl->tpl_vars['_SESSION']) ? $_smarty_tpl->tpl_vars['_SESSION']->value : array();
if (!is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess) {
settype($_tmp_array, 'array');
}
$_tmp_array['rus_artist'] = 'pending';
$_smarty_tpl->_assignInScope('_SESSION', $_tmp_array);
$_tmp_array = isset($_smarty_tpl->tpl_vars['_SESSION']) ? $_smarty_tpl->tpl_vars['_SESSION']->value : array();
if (!is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess) {
settype($_tmp_array, 'array');
}
$_tmp_array['not_concr_artist'] = FALSE;
$_smarty_tpl->_assignInScope('_SESSION', $_tmp_array);?><div class="m_c_s_scrollable mus-custom-scrolling pl-mb-90" style="height: 590px"><div class="mus_content_w"><div class="mus_content_w" aria-hidden="false"><div class="mus_album mb-10 mt-15"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['query']->value, 'result');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['result']->value) {
if ($_smarty_tpl->tpl_vars['c']->value === 0) {
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['m_artist'];
$_prefixVariable1 = ob_get_clean();
$_smarty_tpl->_assignInScope('artist', $_prefixVariable1);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['m_cover'];
$_prefixVariable2 = ob_get_clean();
$_smarty_tpl->_assignInScope('cover', $_prefixVariable2);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['m_id'];
$_prefixVariable3 = ob_get_clean();
$_smarty_tpl->_assignInScope('id', $_prefixVariable3);
if (!isset($_smarty_tpl->tpl_vars['_SESSION']->value['song_genre']) || isset($_smarty_tpl->tpl_vars['_SESSION']->value['song_genre']) !== $_smarty_tpl->tpl_vars['result']->value['m_genre']) {
$_tmp_array = isset($_smarty_tpl->tpl_vars['_SESSION']) ? $_smarty_tpl->tpl_vars['_SESSION']->value : array();
if (!is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess) {
settype($_tmp_array, 'array');
}
$_tmp_array['song_genre'] = $_smarty_tpl->tpl_vars['result']->value['m_genre'];
$_smarty_tpl->_assignInScope('_SESSION', $_tmp_array);
$_tmp_array = isset($_smarty_tpl->tpl_vars['_SESSION']) ? $_smarty_tpl->tpl_vars['_SESSION']->value : array();
if (!is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess) {
settype($_tmp_array, 'array');
}
$_tmp_array['song_artist_searched'] = $_smarty_tpl->tpl_vars['artist']->value;
$_smarty_tpl->_assignInScope('_SESSION', $_tmp_array);
}?><div class="mus_album_i__absolute" parent-for-cover="true"><span class="gwt-InlineHTML"><div class="mus_album_i_w"><div class="mus_card_img_w mus_card_img_w__artist"><img uid="active" class="mus_card_img" src="<?php echo $_smarty_tpl->tpl_vars['cover']->value;?>
"></div></div></span><?php if ($_smarty_tpl->tpl_vars['inx']->value) {?><div class="m_c_a_go_to" data-search-result="artist_albums" mus-search-result="artist_albums" <?php echo $_smarty_tpl->tpl_vars['more_details']->value;?>
><span class="m_c_s_c_go_to mt-5">More details</span></div><?php }?><span class="m_c_col-data"><div class="m_c_col-data_ac"><a class="mtico mus-dl m_c_col-data_ac_i __14" id="aBM_s_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" data-search-res-add="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" data-search-res-name="<?php echo $_smarty_tpl->tpl_vars['artist']->value;?>
" data-search-res-count="<?php echo $_smarty_tpl->tpl_vars['count_rows']->value;?>
"><i class="mic14 mic14_add"></i><span id="aBM_st">Add to My music</span></a></div></span></div><?php if ($_smarty_tpl->tpl_vars['play']->value === '1') {?><div style="display:none;" id="this_playlist_active" data-collection-play="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"></div><?php }?><div class="gwt-HTML"><div class="mus_h2"><span class="mus_h2_tx ellip" m_ppl_title="true" data-id="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['artist']->value;?>
</span></div></div><div class="mus_submenu"><div class="mus_submenu_i"><span class="mus_submenu_a <?php echo $_smarty_tpl->tpl_vars['this']->value->sub_activeClass_hits;?>
" <?php echo $_smarty_tpl->tpl_vars['sub_activeClass_href_hits']->value;?>
>Hits</span></div><div class="mus_submenu_i" <?php echo $_smarty_tpl->tpl_vars['sub_similar_tracks']->value;?>
><span class="mus_submenu_a"><i class="mus_submenu_play"></i><span>Similar tracks</span></span></div><div class="mus_submenu_i" data-search-result="artist_albums"><span class="mus_submenu_a <?php echo $_smarty_tpl->tpl_vars['this']->value->sub_activeClass_albums;?>
" mus-search-result="artist_albums" data-href="search" data-action="true" data-query="?action=searchResult&method=artistalbums&key=<?php echo urlencode($_smarty_tpl->tpl_vars['key']->value);?>
"><span>Albums</span></span></div></div><div class="mus-tr_lst"><ol data-for-serialize="true"><?php }
if ($_smarty_tpl->tpl_vars['c']->value > 4 && (!isset($_smarty_tpl->tpl_vars['_SESSION']->value['srch_display_tracks']) || $_smarty_tpl->tpl_vars['_SESSION']->value['srch_display_tracks'] === FALSE)) {
$_smarty_tpl->_assignInScope('display_tracks', 'style="display:none"');
$_smarty_tpl->_assignInScope('aria_hidden', 'true');
}
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['storage'];
$_prefixVariable4 = ob_get_clean();
$_smarty_tpl->_assignInScope('storage', $_prefixVariable4);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['m_id'];
$_prefixVariable5 = ob_get_clean();
$_smarty_tpl->_assignInScope('song_id', $_prefixVariable5);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['m_time'];
$_prefixVariable6 = ob_get_clean();
$_smarty_tpl->_assignInScope('song_t', $_prefixVariable6);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['m_path'];
$_prefixVariable7 = ob_get_clean();
$_smarty_tpl->_assignInScope('song_p', $_prefixVariable7);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['m_title'];
$_prefixVariable8 = ob_get_clean();
$_smarty_tpl->_assignInScope('song', $_prefixVariable8);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['m_artist'];
$_prefixVariable9 = ob_get_clean();
$_smarty_tpl->_assignInScope('arts', $_prefixVariable9);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['m_album'];
$_prefixVariable10 = ob_get_clean();
$_smarty_tpl->_assignInScope('album', $_prefixVariable10);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['m_video'];
$_prefixVariable11 = ob_get_clean();
$_smarty_tpl->_assignInScope('video', $_prefixVariable11);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['m_cover'];
$_prefixVariable12 = ob_get_clean();
$_smarty_tpl->_assignInScope('cover', $_prefixVariable12);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['language'];
$_prefixVariable13 = ob_get_clean();
$_smarty_tpl->_assignInScope('s_lang', $_prefixVariable13);
$_smarty_tpl->_assignInScope('download', '');
if ($_smarty_tpl->tpl_vars['s_lang']->value === $_smarty_tpl->tpl_vars['this']->value->purchase_ic) {
$_smarty_tpl->_assignInScope('download', '__download');
}?><li <?php echo $_smarty_tpl->tpl_vars['display_tracks']->value;?>
 aria-hidden="<?php echo $_smarty_tpl->tpl_vars['aria_hidden']->value;?>
" target="#windowMusic_searchresult_inx_<?php echo $_smarty_tpl->tpl_vars['song_id']->value;?>
"><div class="mus-tr_i  __has-video soh-s <?php echo $_smarty_tpl->tpl_vars['download']->value;?>
" id="tri_m_sec_search_result_<?php echo $_smarty_tpl->tpl_vars['song_id']->value;?>
"><div class="mus-tr_hld"><span class="mus-tr_play __play js-mus-tr_play" id="windowMusic_searchresult_inx_<?php echo $_smarty_tpl->tpl_vars['song_id']->value;?>
" title="Play" data-action="play" data-quest='{"song":"<?php echo $_smarty_tpl->tpl_vars['this']->value->track_path($_smarty_tpl->tpl_vars['song_p']->value,$_smarty_tpl->tpl_vars['storage']->value);?>
","cover":"<?php echo $_smarty_tpl->tpl_vars['this']->value->cover_path($_smarty_tpl->tpl_vars['cover']->value,$_smarty_tpl->tpl_vars['storage']->value);?>
"}' ></span><?php if ($_smarty_tpl->tpl_vars['download']->value !== '') {?><span class="mus-tr_download js-mus-tr_download" title="Download"></span><?php }?><div class="mus-tr_cnt"><a style="display:none;" class="mus-tr_a mus-tr_artist"><?php echo $_smarty_tpl->tpl_vars['arts']->value;?>
</a><a class="mus-tr_a mus-tr_song"><?php echo $_smarty_tpl->tpl_vars['song']->value;?>
</a><span class="foh-s mus-tr_info">&nbsp;from&nbsp;<a class="mus-tr_a mus-tr_album"><span class="mus-tr_album-ic ic10_album"></span><?php echo $_smarty_tpl->tpl_vars['album']->value;?>
</a></span></div><div class="mus-tr_right-controls foh-s" id="rc_m_sec_search_result_<?php echo $_smarty_tpl->tpl_vars['song_id']->value;?>
"><span class="mus-tr_add js-mus-tr_add" title="Add to My music"></span><span class="mus-tr_dropdown js-mus_dropdown_trigger" title="Add to the playlist"></span></div><span class="mus-tr_time"><?php echo $_smarty_tpl->tpl_vars['song_t']->value;?>
</span></div><?php if ($_smarty_tpl->tpl_vars['video']->value > '0') {?><div class="mus-tr_video" data-showvideo="true" data-video="<?php echo $_smarty_tpl->tpl_vars['video']->value;?>
"></div><?php }?></div></li><?php if ($_smarty_tpl->tpl_vars['c']->value === $_smarty_tpl->tpl_vars['v']->value) {?></ol><?php }
if ($_smarty_tpl->tpl_vars['c']->value === 4 && (!isset($_smarty_tpl->tpl_vars['_SESSION']->value['srch_display_tracks']) || $_smarty_tpl->tpl_vars['_SESSION']->value['srch_display_tracks'] === FALSE)) {?><div class="mt-10"><span class="m_c_s_c_go_to" data-srch-rs-mr="true">More songs</span></div><?php }
if ($_smarty_tpl->tpl_vars['c']->value === $_smarty_tpl->tpl_vars['v']->value) {?></div></div><?php }
if ($_smarty_tpl->tpl_vars['v']->value < 3) {
$_smarty_tpl->_assignInScope('mt', 'mt-40');
}
if ($_smarty_tpl->tpl_vars['c']->value === $_smarty_tpl->tpl_vars['v']->value && $_smarty_tpl->tpl_vars['inx']->value) {
echo $_smarty_tpl->tpl_vars['this']->value->getMoreArtists();
} elseif ($_smarty_tpl->tpl_vars['c']->value === $_smarty_tpl->tpl_vars['v']->value && !$_smarty_tpl->tpl_vars['inx']->value) {
echo $_smarty_tpl->tpl_vars['this']->value->get_artistAlbums($_smarty_tpl->tpl_vars['key']->value,$_smarty_tpl->tpl_vars['mt']->value,$_smarty_tpl->tpl_vars['album']->value);
}
$_smarty_tpl->_assignInScope($_smarty_tpl->tpl_vars['c']->value, $_smarty_tpl->tpl_vars['c']->value++ ,true);
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
} else {
echo $_smarty_tpl->tpl_vars['this']->value->empty_result('songs');
}
}
}
