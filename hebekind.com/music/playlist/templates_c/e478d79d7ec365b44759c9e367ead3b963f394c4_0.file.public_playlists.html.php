<?php
/* Smarty version 3.1.34-dev-7, created on 2020-04-09 21:36:56
  from 'E:\XAMPP\htdocs\music\template\playlist\public_playlists.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e8f7958890c80_57650948',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e478d79d7ec365b44759c9e367ead3b963f394c4' => 
    array (
      0 => 'E:\\XAMPP\\htdocs\\music\\template\\playlist\\public_playlists.html',
      1 => 1499365825,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e8f7958890c80_57650948 (Smarty_Internal_Template $_smarty_tpl) {
?><!------------------------------------- Playlists [template] ------------------------------------------>

<div class="mus_content_w"><div class="pl-mb-90"><!-- foreach loop --><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rows']->value, 'res');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['res']->value) {
ob_start();
echo urldecode($_smarty_tpl->tpl_vars['res']->value['name']);
$_prefixVariable1 = ob_get_clean();
$_smarty_tpl->_assignInScope('pl_name', $_prefixVariable1);
ob_start();
echo strtotime($_smarty_tpl->tpl_vars['days']->value,$_smarty_tpl->tpl_vars['res']->value['added']);
$_prefixVariable2 = ob_get_clean();
$_smarty_tpl->_assignInScope('pl_new', $_prefixVariable2);
ob_start();
echo $_smarty_tpl->tpl_vars['res']->value['id'];
$_prefixVariable3 = ob_get_clean();
$_smarty_tpl->_assignInScope('pl_id', $_prefixVariable3);
ob_start();
echo $_smarty_tpl->tpl_vars['res']->value['songs_count'];
$_prefixVariable4 = ob_get_clean();
$_smarty_tpl->_assignInScope('pl_songs_count', $_prefixVariable4);
ob_start();
echo $_smarty_tpl->tpl_vars['res']->value['favorite_cover'];
$_prefixVariable5 = ob_get_clean();
$_smarty_tpl->_assignInScope('pl_cover', $_prefixVariable5);?><div class="mus_card_i"><div id="crdI_<?php echo $_smarty_tpl->tpl_vars['pl_id']->value;?>
" data-pl-count="<?php echo $_smarty_tpl->tpl_vars['pl_songs_count']->value;?>
" class="mus_card" uid="card"><div class="col-card"><div class="mus_card_img_w mus_card_img_w__col"><img src="<?php echo $_smarty_tpl->tpl_vars['pl_cover']->value;?>
" class="mus_card_img"><div class="mus_card_ac_lst"><span class="mus_card_ac_i mus_card_ac_i__pl" uid="pl" data-href="playlist" data-action="true" data-query="?action=playlist&play=true&i=<?php echo $_smarty_tpl->tpl_vars['pl_id']->value;?>
"><span class="mus_card_play"></span>Play</span><span class="mus_card_ac_i mus_card_ac_i__ps" uid="pause"><span class="mus_card_play __pause"></span>Pause</span><span class="mus_card_ac_i mus_card_ac_i__add" uid="add"><span class="mus_card_add"></span>add</span><span class="mus_card_ac_i mus_card_ac_i__success"><span class="mus_card_add __added"></span>Added</span><span class="mus_card_ac_i mus_card_ac_i__more" data-href="playlist" data-action="true" data-query="?action=playlist&i=<?php echo $_smarty_tpl->tpl_vars['pl_id']->value;?>
"><span class="mus_card_more"></span>more</span></div></div></div><div class="mus_card_n_w"><div class="mus_card_n textWrap" data-href="playlist" data-action="true" data-query="?action=playlist&i=<?php echo $_smarty_tpl->tpl_vars['pl_id']->value;?>
"><span class="mus_card_n_a" title="<?php echo $_smarty_tpl->tpl_vars['pl_name']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['pl_name']->value;?>
</span></div></div><?php if ($_smarty_tpl->tpl_vars['pl_new']->value >= time()) {?><span class="mus_card_new"><?php }?></span></div></div><?php
}
} else {
?><div style="margin:10px 0px 10px;">Sorry, but there no playlists.</div><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></div></div><?php }
}
