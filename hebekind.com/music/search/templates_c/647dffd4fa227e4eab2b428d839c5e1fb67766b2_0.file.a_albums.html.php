<?php
/* Smarty version 3.1.34-dev-7, created on 2020-11-09 16:40:21
  from '/var/www/vhosts/vps1957235.fastwebserver.de/localhost.vaneayoung.de/music/template/search/a_albums.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fa970f57c5291_95229317',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '647dffd4fa227e4eab2b428d839c5e1fb67766b2' => 
    array (
      0 => '/var/www/vhosts/vps1957235.fastwebserver.de/localhost.vaneayoung.de/music/template/search/a_albums.html',
      1 => 1590158206,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fa970f57c5291_95229317 (Smarty_Internal_Template $_smarty_tpl) {
?><!--------------------- Artist's albums [ template ] ------------------------->

<?php if ($_smarty_tpl->tpl_vars['count_a']->value > 0) {?><div class="m_c_s_searchResult" m_mus_similar_artists="1"><div class="mus_h2 <?php echo $_smarty_tpl->tpl_vars['mt']->value;?>
">Similar artists</div><div aria-hidden="false"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['query_a']->value, 'result');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['result']->value) {
if (($_smarty_tpl->tpl_vars['c']->value > 7)) {
$_smarty_tpl->_assignInScope('display_sm_art', 'style="display:none"');
$_smarty_tpl->_assignInScope('aria_hidden', 'true');
}?><div class="mus_card_i" <?php echo $_smarty_tpl->tpl_vars['display_sm_art']->value;?>
 aria-hidden="<?php echo $_smarty_tpl->tpl_vars['aria_hidden']->value;?>
"><div class="mus_card __s" uid="card" id="crdI_<?php echo $_smarty_tpl->tpl_vars['result']->value['id'];?>
"><div class="mus_card_img_w"><img data-href="search" data-action="true" data-query="?action=searchResult&method=inx&key=<?php echo urlencode($_smarty_tpl->tpl_vars['result']->value['artist']);?>
" src="<?php echo $_smarty_tpl->tpl_vars['result']->value['cover'];?>
" width="100%" height="100%"><div class="mus_card_ac_lst"><span class="mus_card_ac_i mus_card_ac_i__pl" uid="pl" data-href="search" data-action="true" data-query="?action=searchResult&method=inx&key=<?php echo urlencode($_smarty_tpl->tpl_vars['result']->value['artist']);?>
&play=true" title="Play"><span class="mus_card_play"></span>Play</span><span class="mus_card_ac_i mus_card_ac_i__ps" uid="pause" title="pause"><span class="mus_card_play __pause"></span>pause</span><span data-href="search" data-action="true" data-query="?action=searchResult&method=inx&key=<?php echo urlencode($_smarty_tpl->tpl_vars['result']->value['artist']);?>
" class="mus_card_ac_i mus_card_ac_i__more" title="More"><span class="mus_card_more"></span>More</span></div></div><div class="mus_card_n_w"><div class="mus_card_n textWrap" data-href="search" data-action="true" data-query="?action=searchResult&method=inx&key=<?php echo urlencode($_smarty_tpl->tpl_vars['result']->value['artist']);?>
"><span class="mus_card_n_a" title="<?php echo $_smarty_tpl->tpl_vars['result']->value['artist'];?>
"><?php echo $_smarty_tpl->tpl_vars['result']->value['artist'];?>
</span></div></div></div></div><?php $_smarty_tpl->_assignInScope($_smarty_tpl->tpl_vars['c']->value, $_smarty_tpl->tpl_vars['c']->value++ ,true);
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?><div style="width: 500px;"><span class="m_c_s_c_go_to" data-srch-mr-sm-ar="true">More artists</span></div></div></div><?php }
if ($_smarty_tpl->tpl_vars['count_b']->value > 0) {?><div class="mus_separator mt-20"></div><div class="mus_h2" id="artists_albums">Artist's albums</div><div class="mus_album-list" aria-hidden="false"><div><div><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['query_b']->value, 'result');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['result']->value) {
?><div class="mus_card_i wd24"><div class="mus_card" uid="card" id="crdI_<?php echo $_smarty_tpl->tpl_vars['result']->value['b_id'];?>
"><div class="mus_card_img_w mus_card_img_w__album"><img src="<?php echo $_smarty_tpl->tpl_vars['result']->value['b_cover'];?>
" class="mus_card_img" data-href="search" data-action="true" data-query="?action=searchResult&method=album&key=<?php echo urlencode($_smarty_tpl->tpl_vars['result']->value['b_artist']);?>
&alb=<?php echo urlencode($_smarty_tpl->tpl_vars['result']->value['b_album']);?>
"><div class="mus_card_ac_lst"><span class="mus_card_ac_i mus_card_ac_i__pl" uid="pl" data-href="search" data-action="true" data-query="?action=searchResult&method=album&key=<?php echo urlencode($_smarty_tpl->tpl_vars['result']->value['b_artist']);?>
&alb=<?php echo urlencode($_smarty_tpl->tpl_vars['result']->value['b_album']);?>
&play=true"><span class="mus_card_play"></span>Play</span><span class="mus_card_ac_i mus_card_ac_i__ps" uid="pause"><span class="mus_card_play __pause"></span>pause</span><span class="mus_card_ac_i mus_card_ac_i__more" data-href="search" data-action="true" data-query="?action=searchResult&method=album&key=<?php echo urlencode($_smarty_tpl->tpl_vars['result']->value['b_artist']);?>
&alb=<?php echo urlencode($_smarty_tpl->tpl_vars['result']->value['b_album']);?>
"><span class="mus_card_more"></span>More</span></div></div><div class="mus_card_n_w"><div class="mus_card_n textWrap"><span class="mus_card_n_a" data-href="search" data-action="true" data-query="?action=searchResult&method=album&key=<?php echo urlencode($_smarty_tpl->tpl_vars['result']->value['b_artist']);?>
&alb=<?php echo urlencode($_smarty_tpl->tpl_vars['result']->value['b_album']);?>
" title="<?php echo $_smarty_tpl->tpl_vars['result']->value['b_album'];?>
"><?php echo $_smarty_tpl->tpl_vars['result']->value['b_album'];?>
</span></div><div class="mus_card_n_artist ellip"><span class="mus_card_n_artist_a" data-href="search" data-action="true" data-query="?action=searchResult&method=inx&key=<?php echo urlencode($_smarty_tpl->tpl_vars['result']->value['b_artist']);?>
" title="<?php echo $_smarty_tpl->tpl_vars['result']->value['b_artist'];?>
"><?php echo $_smarty_tpl->tpl_vars['result']->value['b_artist'];?>
</span></div></div></div></div><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></div></div></div><?php } else { ?><div class="mus_h2">Sorry, but did't found any albums</div><?php }
}
}
