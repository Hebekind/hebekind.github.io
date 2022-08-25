<?php
/* Smarty version 3.1.34-dev-7, created on 2020-04-09 22:22:09
  from 'E:\XAMPP\htdocs\music\template\playlist\my_playlists.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e8f83f152e9b7_99190247',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cc7ec8312e276701b66e9a7b4e43505acd85a987' => 
    array (
      0 => 'E:\\XAMPP\\htdocs\\music\\template\\playlist\\my_playlists.html',
      1 => 1586460501,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e8f83f152e9b7_99190247 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!------------------- Playlist details [ Template ] ------------>

<div id="my_active_playlist"></div><?php if (!isset($_smarty_tpl->tpl_vars['get_playlist_id']->value)) {?><div class="pplmus_stub"><div class="mus_content_w"><div class="noMusic_c"><div class="ppl_empty_layer_hld"><div class="ppl_empty_layer_cnt"><div class="portlet-i_h">The playlist doesn't exist.</div></div></div><?php echo $_smarty_tpl->tpl_vars['this']->value->smarty_exit();
} elseif ($_smarty_tpl->tpl_vars['count']->value <= 0) {?><div class="pplmus_stub"><div class="mus_content_w"><div class="noMusic_c"><div class="ppl_empty_layer_hld"><div class="ppl_empty_layer_cnt"><div class="portlet-i_h">This playlist is empty.</div><?php if ($_smarty_tpl->tpl_vars['get_playlist_owner']->value === $_smarty_tpl->tpl_vars['this']->value->USER['id']) {?><div class="mus_stub_cnt"><div class="mus_stub_line"><a class="mtico mus-dl" data-playlist-id="<?php echo $_smarty_tpl->tpl_vars['get_playlist_id']->value;?>
" data-playlist-name="<?php echo $_smarty_tpl->tpl_vars['get_playlist_name']->value;?>
"><i class="mic14 mic14_add"></i>&nbsp;<span>Add music</span></a></div><br><div class="mus_stub_line" data-pl-upload="<?php echo $_smarty_tpl->tpl_vars['get_playlist_id']->value;?>
"><a class="mtico mus-dl"><i class="mic14 mic14_upload"></i>&nbsp;<span>Upload music</span></a></div><br><div aria-hidden="true" class="mb-10 mus_upload_prg_bar" style="display: none;"><div aria-valuemax="100" aria-valuemin="0" aria-valuenow="0" class="progress __dark" role="progressbar"><div class="progress_bar" style="width: 0%;"></div><div aria-hidden="false" class="progress_tx ellip">0 from 0</div><span class="progress_ac"><span class="progress_ac_ic ic10 ic10_close-w m_hidden" role="button" title="Cancel"></span></span></div></div><div class="mus_stub_line"><a class="mtico mus-dl" data-playlist-id="<?php echo $_smarty_tpl->tpl_vars['get_playlist_id']->value;?>
"><i class="mic14 ic14_remove"></i>&nbsp;<span id="dl_ply">Delete the playlist</span></a></div><?php }?></div></div><?php } else { ?><!--- if click play on this playlist ----><?php if ($_smarty_tpl->tpl_vars['play']->value !== '') {?><div style="display:none;" id="this_playlist_active" data-collection-play="<?php echo $_smarty_tpl->tpl_vars['get_playlist_id']->value;?>
"></div><?php }?><div data-playlist-scroll-event="<?php echo $_smarty_tpl->tpl_vars['pl_songs_limit']->value;?>
" data-this-pl-id="<?php echo $_smarty_tpl->tpl_vars['get_playlist_id']->value;?>
" d-more-songs="true"><div class="mus_content_w" style="margin-bottom: -28px;"><div class="m_hidden"><div class="layer mml_popup mus_stub __s"><div class="layer_hld"><div class="layer_cnt"><div class="portlet-i_h"></div><div class="mus_stub_cnt"><div class="mus_stub_line"><a class="mtico mus-dl"><i class="mic14 mic14_add"></i>&nbsp;<span>Add music</span></a></div><br><div class="mus_stub_line" data-pl-upload="<?php echo $_smarty_tpl->tpl_vars['get_playlist_id']->value;?>
"><a class="mtico mus-dl"><i class="mic14 mic14_upload"></i>&nbsp;<span>Upload music</span></a></div><div aria-hidden="true" class="mb-10 mus_upload_prg_bar" style="display: none;"><div aria-valuemax="100" aria-valuemin="0" aria-valuenow="0" class="progress __dark" role="progressbar"><div class="progress_bar" style="width: 0%;"></div><div aria-hidden="false" class="progress_tx ellip">0 from 0</div><span class="progress_ac"><span class="progress_ac_ic ic10 ic10_close-w m_hidden" role="button" title="Cancel"></span></span></div></div><br><div class="mus_stub_line"><a class="mtico mus-dl"><i class="mic14 ic14_remove"></i>&nbsp;<span id="dl_ply">Delete the playlist</span></a></div></div></div></div></div></div><div class="mus_album mus_subinfo" data-edit-playlist-id="<?php echo $_smarty_tpl->tpl_vars['get_playlist_id']->value;?>
"><div class="mus_album_i__fixed"><div class="mus_album_i_w"><div class="mus_card_img_w"><img alt="" class="mus_card_img" src="<?php echo $_smarty_tpl->tpl_vars['get_playlist_cover']->value;?>
"><div class="mus_card_edit_controls m_hidden"><div class="data-with-image_i_h data-with-image_i_h__top curDefault"><div></div><div class="data-with-image_i_nav data-with-image_i_nav__left"></div><div class="data-with-image_i_nav data-with-image_i_nav__right"></div></div><div id="pl_no_covers" class="data-with-image_i_h data-with-image_i_h__bottom data-with-image_i_h__no-img m_hidden"><div class="data-with-image_i_h__no-img_text">There are no songs<br>with covers<br>in this playlist.</div></div><div class="data-with-image_i_h data-with-image_i_h__bottom data-with-image_i_h__no-img __waiting m_hidden"><div class="data-with-image_i_h__no-img_text" style="margin-top:50px;"><img src="../css/images/waiting_transp.gif" /></div></div><div class="data-with-image_i_h data-with-image_i_h__bottom curPointer"><div>Return cover</div></div><div class="data-with-image_i_h data-with-image_i_h__bottom curPointer"><div data-pl-edit-rm-cv="<?php echo $_smarty_tpl->tpl_vars['get_playlist_id']->value;?>
">Remove cover</div></div></div></div></div><div class="m_c_col-data"><?php if ($_smarty_tpl->tpl_vars['get_playlist_plcount']->value !== '-0') {?><div class="m_c_col-data_counter"><span class="m_c_col-data_amount">&nbsp;<?php echo $_smarty_tpl->tpl_vars['get_playlist_plcount']->value;?>
</span>&nbsp;<span class="m_c_col-data_tx">Play counts</span></div><?php }
if ($_smarty_tpl->tpl_vars['get_playlist_owner']->value === $_smarty_tpl->tpl_vars['this']->value->USER['id'] && $_smarty_tpl->tpl_vars['get_playlist_plcount']->value !== '-0') {?><div class="m_c_col-data_ac" id="playlist_nemp_manip"><a class="mtico mus-dl m_c_col-data_ac_i __14 m_hidden"><i class="mic14 mic14_add"></i><span></span></a><a class="mtico mus-dl m_c_col-data_ac_i __14 js-hide-in-edit" data-playlist-id="<?php echo $_smarty_tpl->tpl_vars['get_playlist_id']->value;?>
" data-playlist-name="<?php echo $_smarty_tpl->tpl_vars['get_playlist_name']->value;?>
"><i class="mic14 mic14_add"></i><span>Add music</span></a><a class="mtico mus-dl m_c_col-data_ac_i __14 js-hide-in-edit" data-pl-upload="<?php echo $_smarty_tpl->tpl_vars['get_playlist_id']->value;?>
"><i class="mic14 mic14_upload"></i><span>Upload music</span></a><div aria-hidden="true" class="mb-10 mus_upload_prg_bar" style="display: none;"><div aria-valuemax="100" aria-valuemin="0" aria-valuenow="0" class="progress __dark" role="progressbar"><div class="progress_bar" style="width: 0%;"></div><div aria-hidden="false" class="progress_tx ellip"></div><span class="progress_ac"><span class="progress_ac_ic ic10 ic10_close-w m_hidden" role="button" title="Cancel"></span></span></div></div><div class="mtico m_c_col-data_ac_i __14" id="upload_succ" style="display:<?php echo $_smarty_tpl->tpl_vars['display']->value;?>
;" aria-hidden="false"><div class="tico"><i class="tico_img ic ic_ok"></i><span class="mus-text __success">Uploaded <?php echo $_smarty_tpl->tpl_vars['count_upl_songs']->value;?>
 song<?php echo $_smarty_tpl->tpl_vars['more_s']->value;?>
</span></div></div><div class="mtico m_c_col-data_ac_i __14" aria-hidden="true" style="display: none;"><div class="tico"><i class="tico_img ic"></i><span class="mus-text"></span></div></div><a class="mtico mus-dl m_c_col-data_ac_i __14 js-hide-in-edit js-pl-edit" data-pl-edit="<?php echo $_smarty_tpl->tpl_vars['get_playlist_id']->value;?>
"><i class="mic14 ic14_edit"></i><span>Edit</span></a><a class="mtico mus-dl m_c_col-data_ac_i __14 js-hide-in-edit" data-playlist-id="<?php echo $_smarty_tpl->tpl_vars['get_playlist_id']->value;?>
"><i class="mic14 ic14_remove"></i><span id="dl_ply">Delete the playlist</span></a><a class="vl_btn m_c_col-data_finish m_hidden js-pl-edit-finish">Ready</a></div><?php } elseif ($_smarty_tpl->tpl_vars['run_update']->value === 1) {?><div class="m_c_col-data_ac" id="playlist_nemp_manip"><a class="mtico mus-dl" data-playlist-id="<?php echo $_smarty_tpl->tpl_vars['smarty_original_pl_id']->value;?>
" data-original-playlist-id="<?php echo $_smarty_tpl->tpl_vars['get_playlist_id']->value;?>
"><i class="mic14 ic14_remove"></i>&nbsp;<span id="dl_ply">Delete the playlist</span></a></div><?php } else { ?><div class="m_c_col-data_ac" id="add_collection" data-collection='{"collection_id":"<?php echo $_smarty_tpl->tpl_vars['get_playlist_id']->value;?>
","collection_name":"<?php echo $_smarty_tpl->tpl_vars['get_playlist_name']->value;?>
","collection_cover":"<?php echo $_smarty_tpl->tpl_vars['get_playlist_cover']->value;?>
","collection_count":"<?php echo $_smarty_tpl->tpl_vars['get_playlist_trcount']->value;?>
"}'><span class="mtico mus-dl m_c_col-data_ac_i"><i class="mic14 mic14_add"></i><span>Add to My music</span></span></div><?php }
if ($_smarty_tpl->tpl_vars['get_playlist_owner']->value === $_smarty_tpl->tpl_vars['this']->value->USER['id'] && $_smarty_tpl->tpl_vars['get_playlist_plcount']->value !== '-0') {
$_smarty_tpl->_assignInScope('sortable', 'id="mus_sort"');
}?></div></div><div class="mus_h2 mb-5"><div class="m_ppl_title" m_ppl_title="true" data-id="<?php echo $_smarty_tpl->tpl_vars['get_playlist_id']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['get_playlist_name']->value;?>
</div></div><div></div><div <?php echo $_smarty_tpl->tpl_vars['sortable']->value;?>
 data-act="playlist" data-plid="<?php echo $_smarty_tpl->tpl_vars['this']->value->id;?>
"><ol><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['query']->value, 'result');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['result']->value) {
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['artist'];
$_prefixVariable1 = ob_get_clean();
$_smarty_tpl->_assignInScope('artist', $_prefixVariable1);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['title'];
$_prefixVariable2 = ob_get_clean();
$_smarty_tpl->_assignInScope('title', $_prefixVariable2);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['album'];
$_prefixVariable3 = ob_get_clean();
$_smarty_tpl->_assignInScope('album', $_prefixVariable3);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['id'];
$_prefixVariable4 = ob_get_clean();
$_smarty_tpl->_assignInScope('pid', $_prefixVariable4);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['path'];
$_prefixVariable5 = ob_get_clean();
$_smarty_tpl->_assignInScope('trackPth', $_prefixVariable5);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['cover'];
$_prefixVariable6 = ob_get_clean();
$_smarty_tpl->_assignInScope('trackCover', $_prefixVariable6);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['time'];
$_prefixVariable7 = ob_get_clean();
$_smarty_tpl->_assignInScope('time', $_prefixVariable7);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['added'];
$_prefixVariable8 = ob_get_clean();
$_smarty_tpl->_assignInScope('tadded', $_prefixVariable8);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['position'];
$_prefixVariable9 = ob_get_clean();
$_smarty_tpl->_assignInScope('tpos', $_prefixVariable9);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['trackid'];
$_prefixVariable10 = ob_get_clean();
$_smarty_tpl->_assignInScope('midI', $_prefixVariable10);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['video'];
$_prefixVariable11 = ob_get_clean();
$_smarty_tpl->_assignInScope('track_video', $_prefixVariable11);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['language'];
$_prefixVariable12 = ob_get_clean();
$_smarty_tpl->_assignInScope('track_lang', $_prefixVariable12);
$_smarty_tpl->_assignInScope('download', '');
if ($_smarty_tpl->tpl_vars['track_lang']->value === $_smarty_tpl->tpl_vars['this']->value->show_prch_icon) {
$_smarty_tpl->_assignInScope('download', '__download');
}
if ($_smarty_tpl->tpl_vars['c']->value === 0) {
ob_start();
echo $_smarty_tpl->tpl_vars['pid']->value;
$_prefixVariable13 = ob_get_clean();
$_smarty_tpl->_assignInScope('c', $_prefixVariable13);
}?><li target="#p0m_sec_personal_pl<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['midI']->value;?>
" id="tracks_<?php echo $_smarty_tpl->tpl_vars['midI']->value;?>
"><span style="display:block;" class="mus-tr_lst"><span class="mus_scroll-overlay_dummy"></span><div class="mus-tr_i  __has-video soh-s <?php echo $_smarty_tpl->tpl_vars['download']->value;?>
" id="tri_m_sec_personal_pl<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['midI']->value;?>
" edit-track-id="<?php echo $_smarty_tpl->tpl_vars['midI']->value;?>
" data-position="<?php echo $_smarty_tpl->tpl_vars['tpos']->value;?>
" data-added="<?php echo $_smarty_tpl->tpl_vars['tadded']->value;?>
"><div class="mus-tr_hld"><span class="mus-tr_restore"><span class="mus-tr_restore_tx"><span class="mus-tr_il js-mus-tr_restore js_restore_in_pl" data-action="restore" trackId="track_<?php echo $_smarty_tpl->tpl_vars['midI']->value;?>
" data-dl-pl-id="<?php echo $_smarty_tpl->tpl_vars['get_playlist_id']->value;?>
">Restore?</span>&nbsp;<?php echo $_smarty_tpl->tpl_vars['artist']->value;?>
&nbsp;&#8211;&nbsp;<?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</span></span><span class="mus-tr_play __play js-mus-tr_play" id="p0m_sec_personal_pl<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['midI']->value;?>
" title="Play" data-action="play" data-quest='{"song":"<?php echo $_smarty_tpl->tpl_vars['trackPth']->value;?>
","cover":"<?php echo $_smarty_tpl->tpl_vars['trackCover']->value;?>
"}'></span><?php if ($_smarty_tpl->tpl_vars['download']->value !== '') {?><span class="mus-tr_download js-mus-tr_download" title="Download"></span><?php }?><div class="mus-tr_cnt"><a class="mus-tr_a mus-tr_artist"><?php echo $_smarty_tpl->tpl_vars['artist']->value;?>
</a>&nbsp;&#8211;&nbsp;<a class="mus-tr_a mus-tr_song"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</a><span class="foh-s mus-tr_info">&nbsp;from&nbsp;<a class="mus-tr_a mus-tr_album"><span class="mus-tr_album-ic ic10_album"></span><?php echo $_smarty_tpl->tpl_vars['album']->value;?>
</a></span></div><?php if ($_smarty_tpl->tpl_vars['get_playlist_owner']->value === $_smarty_tpl->tpl_vars['this']->value->USER['id'] && $_smarty_tpl->tpl_vars['get_playlist_plcount']->value !== '-0') {?><div class="mus-tr_right-controls foh-s" id="rc_m_sec_personal_pl"><span class="mus-tr_edit js-mus-tr_edit" trackid="track_<?php echo $_smarty_tpl->tpl_vars['midI']->value;?>
" title="Edit" data-action="edit"></span><span class="mus-tr_delete js-mus-tr_delete js_remove_pl" title="Remove from my playlist" trackId="track_<?php echo $_smarty_tpl->tpl_vars['midI']->value;?>
" data-action="delete" data-dl-pl-id="<?php echo $_smarty_tpl->tpl_vars['get_playlist_id']->value;?>
"></span></div><?php } else { ?><div class="mus-tr_right-controls foh-s" id="rc_m_sec_collection_<?php echo $_smarty_tpl->tpl_vars['midI']->value;?>
"><span class="mus-tr_add js-mus-tr_add" title="Add to My music"></span><span class="mus-tr_dropdown js-mus_dropdown_trigger" title="Add to the playlist"></span></div><?php }?><span class="mus-tr_time"><?php echo $_smarty_tpl->tpl_vars['time']->value;?>
</span></div><?php if ($_smarty_tpl->tpl_vars['track_video']->value > '0') {?><div class="mus-tr_video" data-showVideo="true" data-video="<?php echo $_smarty_tpl->tpl_vars['track_video']->value;?>
"></div><?php }?></div></span></li><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></ol></div><div id="pl_scroll_event" style="padding:20px;"></div><div class="m_hidden"><div class="m_add_ppl"><span class="m_add_ppl_ico"></span><span>Add music</span></div></div></div><div class="mt-20"><div class="mus_h2 m_other_ppl_offset m_hidden">Other playlists</div><div class="mus_album-list" aria-hidden="true" style="display: none;"><div><div class="mus_card_i"><div class="m_c_ppl_create"><i id="myMusicPPLCreateIco" class="m_c_ppl_create_ico"></i><div id="myMusicPPLCreateText" class="m_c_create_text">Add a playlist</div></div></div></div></div></div></div></div></div><!---- recommendation section --------><?php if ($_smarty_tpl->tpl_vars['get_playlist_owner']->value === $_smarty_tpl->tpl_vars['this']->value->USER['id'] && $_smarty_tpl->tpl_vars['get_playlist_plcount']->value !== '-0') {?><div data-mus-my-playlist="<?php echo $_smarty_tpl->tpl_vars['c']->value;?>
"></div><div class="m_recommendations_w js-hide-in-edit js-m_recommendations_w __visible-teaser"><div class="m_recommendations"><div class="m_recommendations_cnt"><span class="ic ic_close m_recommendations_close" title="OK"></span><div class="mus_h2 m_recommendations_h">Similar to your songs</div><div class="m_recommendations_track-list"><div class="mus-tr_lst mus_scroll-overlay"></div></div><div class="m_recommendations_more"><span class="m_c_s_c_go_to">Show more songs</span></div></div><div class="m_recommendations_teaser"><span>We have found songs that will suit you.</span><span class="m_c_s_c_go_to">&nbsp;Show.</span></div></div></div><?php }
}?></div></div></div><?php }
}
