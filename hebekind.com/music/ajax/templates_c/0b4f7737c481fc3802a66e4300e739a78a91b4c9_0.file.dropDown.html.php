<?php
/* Smarty version 3.1.34-dev-7, created on 2020-04-09 19:13:24
  from 'E:\XAMPP\htdocs\music\template\ajax_result\dropDown.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e8f57b428da80_01223077',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0b4f7737c481fc3802a66e4300e739a78a91b4c9' => 
    array (
      0 => 'E:\\XAMPP\\htdocs\\music\\template\\ajax_result\\dropDown.html',
      1 => 1499365822,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e8f57b428da80_01223077 (Smarty_Internal_Template $_smarty_tpl) {
?><!---------- DropDown for add songs to the playlist --------->
<div class="mus_dropDown_active"><div class="mus_dropdown_w __active"><div class="mus_dropdown"><ul class="mus_dropdown_lst"><?php if ($_smarty_tpl->tpl_vars['count']->value > 0) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['query']->value, 'result');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['result']->value) {
?><li data-hv-pl="true" class="mus_dropdown_i" pid="<?php echo $_smarty_tpl->tpl_vars['result']->value['id'];?>
"><a class="mus_dropdown_a mus-tr_a" uid="personalPL" ><?php echo urldecode($_smarty_tpl->tpl_vars['result']->value['name']);?>
<i class="fader-img"></i></a></li><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
} else { ?><div class="textWrap mus_dropdown_txt">You doesn't have any<br>playlists yet.<?php if ($_smarty_tpl->tpl_vars['d']->value === '') {?><br>Create one by entering<br>the title:</div><?php }
}
if ($_smarty_tpl->tpl_vars['d']->value === '') {?><li class="mus_dropdown_i"><div class="mus_dropdown_f"><a class="mus_dropdown_f_a mtico tdn"><i class="mic12 mic12_add" uid="addPersonalPL"></i><label uid="addPersonalPL" for="inputId" class="mus-tr_il">&nbsp;Add a playlist</label></a><div class="m_add_ppl_input_cont" id="addPersonalPLInputWrapper"><div class="m_add_ppl_input_wrapper"><input uid="pplName" class="m_add_ppl_input" maxlength="100"><div class="m_ppl_input_enter"><i class="tico_img m_enter_ppl_ico" uid="createPPL"></i></div></div></div></div></li></ul></div></div></div><?php }
}
}
