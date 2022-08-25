<?php
/* Smarty version 3.1.34-dev-7, created on 2020-04-10 13:08:47
  from 'E:\XAMPP\htdocs\music\template\ajax_result\search_new_collection.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e9053bf746728_52416168',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7d071d57d9f6d9d17279cfce9b3145d0dbb274bc' => 
    array (
      0 => 'E:\\XAMPP\\htdocs\\music\\template\\ajax_result\\search_new_collection.html',
      1 => 1499365821,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e9053bf746728_52416168 (Smarty_Internal_Template $_smarty_tpl) {
?><ul><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['query']->value, 'result');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['result']->value) {
?><li><div class="mus-tr_i __selectable soh-s"><div class="mus-tr_hld"><span class="mus-tr_play __play js-mus-tr_play" id="_pm_sec_<?php echo $_smarty_tpl->tpl_vars['result']->value['id'];?>
" data-quest='{"song":"<?php echo $_smarty_tpl->tpl_vars['result']->value['path'];?>
","cover":"<?php echo $_smarty_tpl->tpl_vars['result']->value['cover'];?>
"}' title="Play"></span><div class="mus-tr_cnt"><span class="mus-tr_artist"><?php echo $_smarty_tpl->tpl_vars['result']->value['artist'];?>
</span>&nbsp;&#8211;&nbsp; <span class="mus-tr_song"><?php echo $_smarty_tpl->tpl_vars['result']->value['title'];?>
</span></div><div class="mus-tr_right-controls foh-s"> <span class="mus-tr_add"></span> </div></div></div></li><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></ul><?php }
}
