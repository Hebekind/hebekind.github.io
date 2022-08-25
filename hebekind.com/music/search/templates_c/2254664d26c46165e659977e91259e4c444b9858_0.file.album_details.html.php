<?php
/* Smarty version 3.1.34-dev-7, created on 2020-04-10 02:02:53
  from 'E:\XAMPP\htdocs\music\template\search\album_details.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e8fb7ad2a1dd9_44194436',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2254664d26c46165e659977e91259e4c444b9858' => 
    array (
      0 => 'E:\\XAMPP\\htdocs\\music\\template\\search\\album_details.html',
      1 => 1499365833,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e8fb7ad2a1dd9_44194436 (Smarty_Internal_Template $_smarty_tpl) {
?><!--------------------- Album details [ Template ] --------------------------->

<span class="m_c_s_searchResult pl-mb-90"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['query_a']->value, 'result');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['result']->value) {
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['id'];
$_prefixVariable1 = ob_get_clean();
$_smarty_tpl->_assignInScope('al_s_id', $_prefixVariable1);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['title'];
$_prefixVariable2 = ob_get_clean();
$_smarty_tpl->_assignInScope('al_s_tt', $_prefixVariable2);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['artist'];
$_prefixVariable3 = ob_get_clean();
$_smarty_tpl->_assignInScope('al_s_ar', $_prefixVariable3);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['album'];
$_prefixVariable4 = ob_get_clean();
$_smarty_tpl->_assignInScope('al_s_al', $_prefixVariable4);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['video'];
$_prefixVariable5 = ob_get_clean();
$_smarty_tpl->_assignInScope('al_s_vd', $_prefixVariable5);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['time'];
$_prefixVariable6 = ob_get_clean();
$_smarty_tpl->_assignInScope('al_s_tm', $_prefixVariable6);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['cover'];
$_prefixVariable7 = ob_get_clean();
$_smarty_tpl->_assignInScope('al_s_cv', $_prefixVariable7);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['path'];
$_prefixVariable8 = ob_get_clean();
$_smarty_tpl->_assignInScope('al_s_pt', $_prefixVariable8);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['language'];
$_prefixVariable9 = ob_get_clean();
$_smarty_tpl->_assignInScope('al_s_lg', $_prefixVariable9);
$_smarty_tpl->_assignInScope('download', '');
if ($_smarty_tpl->tpl_vars['al_s_lg']->value === $_smarty_tpl->tpl_vars['this']->value->purchase_ic) {
$_smarty_tpl->_assignInScope('download', '__download');
}
if ($_smarty_tpl->tpl_vars['play']->value > 0) {?><div style="display:none;" id="this_playlist_active" data-collection-play="<?php echo $_smarty_tpl->tpl_vars['al_s_id']->value;?>
"></div><?php }
if ($_smarty_tpl->tpl_vars['c']->value === 0) {?><div class="mus_content_w" id="windowMusic_search_container"><div class="mus_album"><div class="mus_album_i__absolute" parent-for-cover="true"><div class="mus_album_i_w"><div class="mus_card_img_w mus_card_img_w__album"><img class="mus_card_img" src="<?php echo $_smarty_tpl->tpl_vars['al_s_cv']->value;?>
"></div></div><div class="m_c_col-data"><div class="m_c_col-data_ac"><a class="mtico mus-dl m_c_col-data_ac_i __14" data-search-res-add="<?php echo $_smarty_tpl->tpl_vars['al_s_id']->value;?>
" data-search-res-name="<?php echo $_smarty_tpl->tpl_vars['al_s_al']->value;?>
" data-search-res-count="<?php echo $_smarty_tpl->tpl_vars['count']->value;?>
"><i class="mic14 mic14_add"></i><span id="alBM_st">Add to My music</span></a></div></div></div><div class="mus_h2"><span class="mus_h2_tx ellip" m_ppl_title="true" data-id="<?php echo $_smarty_tpl->tpl_vars['al_s_id']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['al_s_al']->value;?>
</span></div><div class="mus_h3 ellip"><div class="mus_h2_tx ellip" data-href="search" data-action="true" data-query="?action=searchResult&method=inx&key=<?php echo urlencode($_smarty_tpl->tpl_vars['al_s_ar']->value);?>
"><span class="mus-dl"><?php echo $_smarty_tpl->tpl_vars['al_s_ar']->value;?>
</span></div></div><div class="mus-tr_lst mus_scroll-overlay"><div class="mus_scroll-overlay_dummy"></div><ol data-for-serialize="true"><?php }?><li target="#p18m_sec_album_<?php echo $_smarty_tpl->tpl_vars['al_s_id']->value;?>
"><div class="mus-tr_i  __has-video soh-s <?php echo $_smarty_tpl->tpl_vars['download']->value;?>
" id="tri_m_sec_album_<?php echo $_smarty_tpl->tpl_vars['al_s_id']->value;?>
"><div class="mus-tr_hld"><span class="mus-tr_play __play js-mus-tr_play" id="p18m_sec_album_<?php echo $_smarty_tpl->tpl_vars['al_s_id']->value;?>
" title="Play" data-action="play" data-quest='{"song":"<?php echo $_smarty_tpl->tpl_vars['al_s_pt']->value;?>
","cover":"<?php echo $_smarty_tpl->tpl_vars['al_s_cv']->value;?>
"}' ></span><?php if ($_smarty_tpl->tpl_vars['download']->value !== '') {?><span class="mus-tr_download js-mus-tr_download" title="Download"></span><?php }?><div class="mus-tr_cnt"><a style="display:none;" class="mus-tr_a mus-tr_artist"><?php echo $_smarty_tpl->tpl_vars['al_s_ar']->value;?>
</a><a class="mus-tr_a mus-tr_song"><?php echo $_smarty_tpl->tpl_vars['al_s_tt']->value;?>
</a><span class="foh-s mus-tr_info"></span></div><div class="mus-tr_right-controls foh-s" id="rc_m_sec_album_<?php echo $_smarty_tpl->tpl_vars['al_s_id']->value;?>
"><span class="mus-tr_add js-mus-tr_add" title="Add to My music"></span><span class="mus-tr_dropdown js-mus_dropdown_trigger" title="Add to the playlist"></span></div><span class="mus-tr_time"><?php echo $_smarty_tpl->tpl_vars['al_s_tm']->value;?>
</span></div><?php if ($_smarty_tpl->tpl_vars['al_s_vd']->value > '0') {?><div class="mus-tr_video" data-showVideo="true" data-video="<?php echo $_smarty_tpl->tpl_vars['al_s_vd']->value;?>
"></div><?php }?></div></li><?php $_smarty_tpl->_assignInScope($_smarty_tpl->tpl_vars['c']->value, $_smarty_tpl->tpl_vars['c']->value++ ,true);
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></ol></div><?php if ($_smarty_tpl->tpl_vars['count']->value < 3) {?><div class="m_album_upload mt-10">Some songs are missing from the album?</div><a class="m_album_upload m_c_s_c_go_to" data-href="mymusic">Upload</a><?php }?></div><?php if ($_smarty_tpl->tpl_vars['ot_count']->value > 0) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['query_b']->value, 'result');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['result']->value) {
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['id'];
$_prefixVariable10 = ob_get_clean();
$_smarty_tpl->_assignInScope('ot_alb_id', $_prefixVariable10);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['artist'];
$_prefixVariable11 = ob_get_clean();
$_smarty_tpl->_assignInScope('ot_alb_ar', $_prefixVariable11);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['cover'];
$_prefixVariable12 = ob_get_clean();
$_smarty_tpl->_assignInScope('ot_alb_cv', $_prefixVariable12);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['album'];
$_prefixVariable13 = ob_get_clean();
$_smarty_tpl->_assignInScope('ot_alb_nm', $_prefixVariable13);
if ($_smarty_tpl->tpl_vars['oc']->value === 0) {?><div class="mus_h2" id="gwt-uid-435">Other artist's albums</div><div class="mus_album-list"><div><div><?php }?><div class="mus_card_i wd24"><div class="mus_card" uid="card" id="crdI_<?php echo $_smarty_tpl->tpl_vars['ot_alb_id']->value;?>
"><div class="mus_card_img_w mus_card_img_w__album"><img src="<?php echo $_smarty_tpl->tpl_vars['ot_alb_cv']->value;?>
" class="mus_card_img" data-href="search" data-action="true" data-query="?action=searchResult&method=album&key=<?php echo urlencode($_smarty_tpl->tpl_vars['ot_alb_ar']->value);?>
&alb=<?php echo urlencode($_smarty_tpl->tpl_vars['ot_alb_nm']->value);?>
"><div class="mus_card_ac_lst"><span class="mus_card_ac_i mus_card_ac_i__pl" uid="pl" data-href="search" data-action="true" data-query="?action=searchResult&method=album&key=<?php echo urlencode($_smarty_tpl->tpl_vars['ot_alb_ar']->value);?>
&alb=<?php echo urlencode($_smarty_tpl->tpl_vars['ot_alb_nm']->value);?>
&play=true"><span class="mus_card_play"></span>Play</span><span class="mus_card_ac_i mus_card_ac_i__ps" uid="pause"><span class="mus_card_play __pause"></span>pause</span><span class="mus_card_ac_i mus_card_ac_i__more" data-href="search" data-action="true" data-query="?action=searchResult&method=album&key=<?php echo urlencode($_smarty_tpl->tpl_vars['ot_alb_ar']->value);?>
&alb=<?php echo urlencode($_smarty_tpl->tpl_vars['ot_alb_nm']->value);?>
"><span class="mus_card_more"></span>More</span></div></div><div class="mus_card_n_w"><div class="mus_card_n textWrap" data-href="search" data-action="true" data-query="?action=searchResult&method=album&key=<?php echo urlencode($_smarty_tpl->tpl_vars['ot_alb_ar']->value);?>
&alb=<?php echo urlencode($_smarty_tpl->tpl_vars['ot_alb_nm']->value);?>
"><span class="mus_card_n_a" title="<?php echo $_smarty_tpl->tpl_vars['ot_alb_nm']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['ot_alb_nm']->value;?>
</span></div><div class="mus_card_n_artist ellip"><span data-href="search" data-action="true" data-query="?action=searchResult&method=inx&key=<?php echo urlencode($_smarty_tpl->tpl_vars['ot_alb_ar']->value);?>
" class="mus_card_n_artist_a" title="<?php echo $_smarty_tpl->tpl_vars['ot_alb_ar']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['ot_alb_ar']->value;?>
</span></div></div></div></div><?php $_smarty_tpl->_assignInScope($_smarty_tpl->tpl_vars['oc']->value, $_smarty_tpl->tpl_vars['oc']->value++ ,true);
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
}
