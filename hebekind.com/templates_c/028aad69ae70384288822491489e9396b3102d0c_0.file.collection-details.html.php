<?php
/* Smarty version 3.1.34-dev-7, created on 2022-01-18 15:39:45
  from '/home/u631248999/domains/hebekind.com/public_html/music/mobile/layout/collection-details.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_61e6d1315dd5c0_04817524',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '028aad69ae70384288822491489e9396b3102d0c' => 
    array (
      0 => '/home/u631248999/domains/hebekind.com/public_html/music/mobile/layout/collection-details.html',
      1 => 1642509742,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61e6d1315dd5c0_04817524 (Smarty_Internal_Template $_smarty_tpl) {
ob_start();
echo $_smarty_tpl->tpl_vars['_musheader']->value;
$_prefixVariable1 = ob_get_clean();
$_smarty_tpl->_subTemplateRender($_prefixVariable1, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['query']->value, 'collection');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['collection']->value) {
$_smarty_tpl->_assignInScope('pl_cover', urldecode($_smarty_tpl->tpl_vars['collection']->value['favorite_cover']));
if (strstr($_smarty_tpl->tpl_vars['pl_cover']->value,'mp3_covers')) {
ob_start();
echo urldecode($_smarty_tpl->tpl_vars['collection']->value['favorite_cover']);
$_prefixVariable2=ob_get_clean();
$_smarty_tpl->_assignInScope('pl_cover', $_prefixVariable2);
}
if ($_smarty_tpl->tpl_vars['collection']->value['owner'] == $_smarty_tpl->tpl_vars['this']->value->USER['id']) {?><div id="is_owner"></div><div class="mob_muss_add_tracks"><div class="mob_muss_add_ctt"><i class="plus_slideshow_photo"></i><span><?php echo $_smarty_tpl->tpl_vars['this']->value->lang['upload_music'];?>
</span></div><input type="file" class="post-html5-upload-file" onchange="uploadTracks(event,this);" name="files[]" accept="audio/*" multiple="multiple" id="tracks_files" /></div><?php }?><ul class="music_album_lst __alone" style="display: inherit;"><li class="music_album_i"><?php if ($_smarty_tpl->tpl_vars['collection']->value['favorite_cover']) {?><img class="music_album_img" src="<?php echo $_smarty_tpl->tpl_vars['pl_cover']->value;?>
"><?php }?><div class="music_album_cnt"><?php if ($_smarty_tpl->tpl_vars['this']->value->USER['id'] == $_smarty_tpl->tpl_vars['collection']->value['owner']) {?><div id="upload_track_in_collection" data-collid="<?php echo $_smarty_tpl->tpl_vars['collection']->value['id'];?>
"></div><a onclick="collectionSet(this,event);" class="music_more" data-func="menu"></a><?php }?><div class="music_album_name-w"><div class="music_album_name"><?php echo urldecode($_smarty_tpl->tpl_vars['collection']->value['name']);?>
</div></div><div class="music_album_kind"><?php echo $_smarty_tpl->tpl_vars['this']->value->lang['collection'];?>
. <?php echo $_smarty_tpl->tpl_vars['this']->value->lang['Listens'];?>
 <?php echo $_smarty_tpl->tpl_vars['collection']->value['playcount'];?>
</div><?php if ($_smarty_tpl->tpl_vars['this']->value->USER['id'] != $_smarty_tpl->tpl_vars['collection']->value['owner']) {?><!--<div class="music_ctrls album_add"><div class="base-button __modern __accept __has-icon music_ctrls_i js-add-album"><a class="base-button_target" data-collection='{"collection_id":"<?php echo $_smarty_tpl->tpl_vars['collection']->value['id'];?>
","collection_name":"<?php echo urlencode($_smarty_tpl->tpl_vars['collection']->value['name']);?>
","collection_cover":"<?php echo $_smarty_tpl->tpl_vars['collection']->value['favorite_cover'];?>
","collection_count":"<?php echo $_smarty_tpl->tpl_vars['collection']->value['playcount'];?>
"}' onclick="addCollection(event,this,'<?php echo $_smarty_tpl->tpl_vars['collection']->value['id'];?>
');" role="button" data-func="add"><?php echo $_smarty_tpl->tpl_vars['this']->value->lang['mus_add_to_my_music'];?>
</a><div class="base-button_bg"></div><div aria-hidden="true" class="base-button_content"><span class="ic  ic-pls __white base-button_content_icon __empty ic16"></span><div class="base-button_content_text"><?php echo $_smarty_tpl->tpl_vars['this']->value->lang['mus_add_to_my_music'];?>
</div></div></div><div class="base-button __modern __has-icon music_ctrls_i js-album-added"><a class="base-button_target" role="button"><?php echo $_smarty_tpl->tpl_vars['this']->value->lang['added'];?>
</a><div class="base-button_bg"></div><div aria-hidden="true" class="base-button_content"><span class="ic  ic-tick base-button_content_icon __empty ic16"></span><div class="base-button_content_text"><?php echo $_smarty_tpl->tpl_vars['this']->value->lang['added'];?>
</div></div></div></div>--><?php }?></div></li></ul><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?><div class="music_track_lst-w"><span style="display:none;" id="mus_collection_page" data-collid="<?php echo $_smarty_tpl->tpl_vars['collection_id']->value;?>
"></span><ul class="music_track_lst"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['this']->value->collectionTracks($_smarty_tpl->tpl_vars['collection_id']->value), 'track');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['track']->value) {
?><li class="music_track_i" id="track_<?php echo $_smarty_tpl->tpl_vars['track']->value['tid'];?>
"><div class="music_track_aux"><span class="music_track_time music_track_seek"><span>25</span>&nbsp;/&nbsp;</span><span class="music_track_time"><?php echo $_smarty_tpl->tpl_vars['track']->value['time'];?>
</span><a class="music_add" data-func="add" role="button"></a><a class="music_more" data-track-ap='{"id":"pm_sec_track_<?php echo $_smarty_tpl->tpl_vars['track']->value['tid'];?>
","artist":"<?php echo urlencode($_smarty_tpl->tpl_vars['track']->value['artist']);?>
","track_title":"<?php echo urlencode($_smarty_tpl->tpl_vars['track']->value['title']);?>
"}' onclick="trackSet(this,event);" data-func="menu" role="button"></a></div><div class="music_track_cnt"><div class="mob-play-track-button pButton" onclick="mmPlay(this,event);" data-mob-track='{"id":"mob-track-<?php echo $_smarty_tpl->tpl_vars['track']->value['tid'];?>
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
?><div class="mobmus-empty"><?php echo $_smarty_tpl->tpl_vars['this']->value->lang['No_tracks_in_this_collection'];?>
</div><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></ul></div><?php ob_start();
echo $_smarty_tpl->tpl_vars['_musfooter']->value;
$_prefixVariable3 = ob_get_clean();
$_smarty_tpl->_subTemplateRender($_prefixVariable3, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
}
}
