<?php
/* Smarty version 3.1.34-dev-7, created on 2020-11-09 16:18:48
  from '/var/www/vhosts/vps1957235.fastwebserver.de/localhost.vaneayoung.de/music/template/ajax_result/search_new_collection.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fa96be88c3430_15643906',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f030f4436ca8beec0b451e9accc242f1fe63a837' => 
    array (
      0 => '/var/www/vhosts/vps1957235.fastwebserver.de/localhost.vaneayoung.de/music/template/ajax_result/search_new_collection.html',
      1 => 1596493171,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fa96be88c3430_15643906 (Smarty_Internal_Template $_smarty_tpl) {
?><ul><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['query']->value, 'result');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['result']->value) {
?><li><div class="mus-tr_i __selectable soh-s"><div class="mus-tr_hld"><span class="mus-tr_play __play js-mus-tr_play" id="_pm_sec_<?php echo $_smarty_tpl->tpl_vars['result']->value['id'];?>
" data-quest='{"song":"<?php echo $_smarty_tpl->tpl_vars['this']->value->track_path($_smarty_tpl->tpl_vars['result']->value['path'],$_smarty_tpl->tpl_vars['result']->value['storage']);?>
","cover":"<?php echo $_smarty_tpl->tpl_vars['this']->value->track_path($_smarty_tpl->tpl_vars['result']->value['cover'],$_smarty_tpl->tpl_vars['result']->value['storage']);?>
"}' title="Play"></span><div class="mus-tr_cnt"><span class="mus-tr_artist"><?php echo $_smarty_tpl->tpl_vars['result']->value['artist'];?>
</span>&nbsp;&#8211;&nbsp; <span class="mus-tr_song"><?php echo $_smarty_tpl->tpl_vars['result']->value['title'];?>
</span></div><div class="mus-tr_right-controls foh-s"> <span class="mus-tr_add"></span> </div></div></div></li><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></ul><?php }
}
