<?php
/* Smarty version 3.1.34-dev-7, created on 2020-04-09 21:23:27
  from 'E:\XAMPP\htdocs\music\template\popular\popular.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e8f762facf449_11982210',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '577d3fb7f1b7fe619749edf81e3336e5cfcc2fe1' => 
    array (
      0 => 'E:\\XAMPP\\htdocs\\music\\template\\popular\\popular.html',
      1 => 1499365825,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e8f762facf449_11982210 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!------------------------------- Template for popular page ------------------------------------>
<div><div class="m_c_s_featured"><div class="m_c_s_header"><div class="m_c_s_headerWrapper"><div class="m_c_s_header_title">Popular music</div></div></div><div class="m_c_s_scrollable mus-custom-scrolling" style="height: 570px;"><div class="mus_content_w"><div class="mus_h2" id="gwt-uid-8">Playlists</div><div class="mb-20 pl-mb-90"><div><!------------------------------- Top 4 playlists ----------------------------><!-- foreach loop --><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['p_res']->value, 'pr');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['pr']->value) {
ob_start();
echo $_smarty_tpl->tpl_vars['pr']->value['favorite_cover'];
$_prefixVariable1 = ob_get_clean();
$_smarty_tpl->_assignInScope('p_cover', $_prefixVariable1);?><div class="mus_card_i"><div id="crdI_<?php echo $_smarty_tpl->tpl_vars['pr']->value['id'];?>
" data-pl-count="<?php echo $_smarty_tpl->tpl_vars['pr']->value['pl_c'];?>
" class="mus_card" uid="card"><div class="col-card"><div class="mus_card_img_w mus_card_img_w__col"><img src="<?php echo urldecode($_smarty_tpl->tpl_vars['p_cover']->value);?>
" class="mus_card_img"><div class="mus_card_ac_lst"><span class="mus_card_ac_i mus_card_ac_i__pl" uid="pl" data-href="playlist" data-action="true" data-query="?action=playlist&play=true&i=<?php echo $_smarty_tpl->tpl_vars['pr']->value['id'];?>
"><span class="mus_card_play"></span>Play</span><span class="mus_card_ac_i mus_card_ac_i__ps" uid="pause"><span class="mus_card_play __pause"></span>pause</span><span class="mus_card_ac_i mus_card_ac_i__add" uid="add"><span class="mus_card_add"></span>add</span><span class="mus_card_ac_i mus_card_ac_i__success"><span class="mus_card_add __added"></span>Added</span><span class="mus_card_ac_i mus_card_ac_i__more" data-href="playlist" data-action="true" data-query="?action=playlist&i=<?php echo $_smarty_tpl->tpl_vars['pr']->value['id'];?>
"><span class="mus_card_more"></span>more</span></div></div></div><div class="mus_card_n_w"><div class="mus_card_n textWrap" data-href="playlist" data-action="true" data-query="?action=playlist&i=<?php echo $_smarty_tpl->tpl_vars['pr']->value['id'];?>
"><span class="mus_card_n_a mus-l" title="<?php echo urldecode($_smarty_tpl->tpl_vars['pr']->value['name']);?>
"><?php echo urldecode($_smarty_tpl->tpl_vars['pr']->value['name']);?>
</span></div></div><?php if (strtotime($_smarty_tpl->tpl_vars['pl_is_new']->value,$_smarty_tpl->tpl_vars['pr']->value['added']) >= time()) {?><span class="mus_card_new"></span><?php }?></div></div><?php
}
} else {
?><div style="margin:10px 0px 10px;">Sorry, but there no playlists.</div><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?><div class="mus_album-list_more" aria-hidden="true" style="display: none;"></div><div><span data-href="playlist" class="m_c_s_c_go_to" style="display:inline-block;margin-top:20px;">Top playlists</span></div></div></div><div class="mus_separator"></div><div class="mus_h2"><span class="vaMid" id="gwt">Popular</span><div class="mus_tabs __multitop"><div class="mus_tabs_cnt"><div id="m_l_f_dropDown"></div><div class="mus_tabs_i 1" index-ovr="true" data-href="popular" data-action="true" data-query="?cta"><div class="mus_tabs_i_a">All</div><span class="mus_last_upload_arrow m_last_uploads"></span></div><div class="mus_tabs_i 2" index-ovr="true" data-href="popular" data-action="true" data-query="?ct=hipHop"><div class="mus_tabs_i_a">Hip hop</div></div><div class="mus_tabs_i 3" index-ovr="true" data-href="popular" data-action="true" data-query="?ct=trance"><div class="mus_tabs_i_a">Trance</div></div><div class="mus_tabs_i 4" index-ovr="true" data-href="popular" data-action="true" data-query="?ct=popDance"><div class="mus_tabs_i_a">Pop music</div></div><div class="mus_tabs_i 5" index-ovr="true" data-href="popular" data-action="true" data-query="?ct=rock"><div class="mus_tabs_i_a">Rock</div></div><div class="mus_tabs_i 6" index-ovr="true" data-href="popular" data-action="true" data-query="?ct=other"><div class="mus_tabs_i_a">Miscellaneous</div></div></div></div></div><!------------------------------- Popular Songs ----------------------------><div style="font-size:12px;padding-bottom: 20px;" class="mus-tr_lst mus_scroll-overlay" style="opacity: 1;"><ol><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['s_res']->value, 'result');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['result']->value) {
$_smarty_tpl->_assignInScope('song_down', '');?><!---- check if song is ready for download ---><?php if ($_smarty_tpl->tpl_vars['result']->value['language'] == $_smarty_tpl->tpl_vars['s_av_down']->value) {
$_smarty_tpl->_assignInScope('song_down', '__download');
}?><li target="#pm_sec_best_<?php echo $_smarty_tpl->tpl_vars['result']->value['id'];?>
"><div class="mus-tr_i  __has-video soh-s <?php echo $_smarty_tpl->tpl_vars['song_down']->value;?>
" id="tri_m_sec_best_<?php echo $_smarty_tpl->tpl_vars['result']->value['id'];?>
"><div class="mus-tr_hld"><span class="mus-tr_play __play js-mus-tr_play" id="pm_sec_best_<?php echo $_smarty_tpl->tpl_vars['result']->value['id'];?>
" title="Play" data-action="play" data-quest='{"song":"<?php echo $_smarty_tpl->tpl_vars['result']->value['path'];?>
","cover":"<?php echo $_smarty_tpl->tpl_vars['result']->value['cover'];?>
"}'></span><?php if ($_smarty_tpl->tpl_vars['song_down']->value != '') {?><span class="mus-tr_download js-mus-tr_download" title="Download"></span><?php }?><div class="mus-tr_cnt"><a class="mus-tr_a mus-tr_artist"><?php echo $_smarty_tpl->tpl_vars['result']->value['artist'];?>
</a>&nbsp;&#8211;&nbsp;<a class="mus-tr_a mus-tr_song"><?php echo $_smarty_tpl->tpl_vars['result']->value['title'];?>
</a><span class="foh-s mus-tr_info">&nbsp;from&nbsp;<a class="mus-tr_a mus-tr_album"><span class="mus-tr_album-ic ic10_album"></span><?php echo $_smarty_tpl->tpl_vars['result']->value['album'];?>
</a></span></div><div class="mus-tr_right-controls foh-s" id="rc_m_sec_best_<?php echo $_smarty_tpl->tpl_vars['result']->value['id'];?>
"><span class="mus-tr_add js-mus-tr_add" title="Add to My music"></span><span class="mus-tr_dropdown js-mus_dropdown_trigger" title="Add to the playlist"></span></div><span class="mus-tr_time"><?php echo $_smarty_tpl->tpl_vars['result']->value['time'];?>
</span></div><?php if ($_smarty_tpl->tpl_vars['result']->value['video'] > '0') {?><div class="mus-tr_video" data-showVideo="true" data-video="<?php echo $_smarty_tpl->tpl_vars['result']->value['video'];?>
"></div><?php }?></div></li><?php
}
} else {
?><div style="margin-top:40px;">Sorry, but there no songs yet</div><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></ol></div></div><?php }
}
