<?php
/* Smarty version 3.1.34-dev-7, created on 2020-05-22 15:09:24
  from '/var/www/vhosts/vps1957235.fastwebserver.de/localhost.vaneayoung.de/music/template/search/a_more_result.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ec7eb2432e756_38816216',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a8985ca4638f1cfad10287c3ef034419d750cc80' => 
    array (
      0 => '/var/www/vhosts/vps1957235.fastwebserver.de/localhost.vaneayoung.de/music/template/search/a_more_result.html',
      1 => 1590158206,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ec7eb2432e756_38816216 (Smarty_Internal_Template $_smarty_tpl) {
?><!------------------ More results by respectively artist [ template ] ---------------------------->
<?php if ($_smarty_tpl->tpl_vars['mrs']->value !== false) {
echo $_smarty_tpl->tpl_vars['this']->value->search_build_header($_smarty_tpl->tpl_vars['this']->value->keyword);?>
<div class="m_c_s_scrollable" style="height: 590px;"><div class="mus_content_w" aria-hidden="false"><div><div class="mus_content_w mt-15"><?php }
if ($_smarty_tpl->tpl_vars['count']->value > 0) {
if ($_smarty_tpl->tpl_vars['mrs']->value === false) {?><span class="gwt-InlineHTML"><div class="mus_separator mt-50"></div><div class="mus_h2">More Results</div></span><div id="search_result_more_artist"><?php }
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['query']->value, 'result');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['result']->value) {
?><div class="mus_card_i"><div class="mus_card" uid="card" id="crdI_<?php echo $_smarty_tpl->tpl_vars['result']->value['m_id'];?>
"><div class="mus_card_img_w"><img src="<?php echo $_smarty_tpl->tpl_vars['result']->value['m_cover'];?>
" class="mus_card_img" data-href="search" data-action="true" data-query="?action=searchResult&method=inx&key=<?php echo urlencode($_smarty_tpl->tpl_vars['result']->value['m_artist']);?>
"><div class="mus_card_ac_lst"><span class="mus_card_ac_i mus_card_ac_i__pl" uid="pl" data-href="search" data-action="true" data-query="?action=searchResult&method=inx&key=<?php echo urlencode($_smarty_tpl->tpl_vars['result']->value['m_artist']);?>
&play=true"><span class="mus_card_play"></span>Play</span><span class="mus_card_ac_i mus_card_ac_i__ps" uid="pause"><span class="mus_card_play __pause"></span>pause</span><span class="mus_card_ac_i mus_card_ac_i__more" data-href="search" data-action="true" data-query="?action=searchResult&method=inx&key=<?php echo urlencode($_smarty_tpl->tpl_vars['result']->value['m_artist']);?>
"><span class="mus_card_more"></span>More</span></div></div><div class="mus_card_n_w"><div class="mus_card_n textWrap" data-href="search" data-action="true" data-query="?action=searchResult&method=inx&key=<?php echo urlencode($_smarty_tpl->tpl_vars['result']->value['m_artist']);?>
"><span class="mus_card_n_a" title="<?php echo $_smarty_tpl->tpl_vars['result']->value['m_artist'];?>
"><?php echo $_smarty_tpl->tpl_vars['result']->value['m_artist'];?>
</span></div></div></div></div><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
} else {
if ($_smarty_tpl->tpl_vars['mrs']->value !== false) {
echo $_smarty_tpl->tpl_vars['this']->value->empty_result(null,null,'No artists that matched to your search');
}
}
}
}
