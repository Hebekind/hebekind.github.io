<?php
/* Smarty version 3.1.34-dev-7, created on 2020-04-10 01:54:27
  from 'E:\XAMPP\htdocs\music\template\ajax_result\friends.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e8fb5b3d50123_13687494',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '13be67fdc8d24b7ba8d17d7b86c17e18346956c1' => 
    array (
      0 => 'E:\\XAMPP\\htdocs\\music\\template\\ajax_result\\friends.html',
      1 => 1586476416,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e8fb5b3d50123_13687494 (Smarty_Internal_Template $_smarty_tpl) {
?><!--- HTML for users from left side --->
<div class="mml_subcat_ul"><?php $_smarty_tpl->_assignInScope('aria_hiddr', 'true');
$_smarty_tpl->_assignInScope('s_display', 'none;');
$_smarty_tpl->_assignInScope('c', '0');
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['query']->value, 'result');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['result']->value) {
ob_start();
echo $_smarty_tpl->tpl_vars['this']->value->get_friend_songs_count($_smarty_tpl->tpl_vars['result']->value['user_id']);
$_prefixVariable1 = ob_get_clean();
$_smarty_tpl->_assignInScope('f_song_count', $_prefixVariable1);
$_smarty_tpl->_assignInScope('aria_hidd', 'false');
$_smarty_tpl->_assignInScope('aria_hiddr', 'true');
$_smarty_tpl->_assignInScope('l_a_h', 'false');
$_smarty_tpl->_assignInScope('f_display', 'block;');
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['user_id'];
$_prefixVariable2 = ob_get_clean();
$_smarty_tpl->_assignInScope('u_id', $_prefixVariable2);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['first_name'];
$_prefixVariable3 = ob_get_clean();
$_smarty_tpl->_assignInScope('u_name', $_prefixVariable3);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['last_name'];
$_prefixVariable4 = ob_get_clean();
$_smarty_tpl->_assignInScope('u_fam', $_prefixVariable4);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['avatar'];
$_prefixVariable5 = ob_get_clean();
$_smarty_tpl->_assignInScope('u_photo', $_prefixVariable5);
ob_start();
echo $_smarty_tpl->tpl_vars['f_song_count']->value;
$_prefixVariable6 = ob_get_clean();
$_smarty_tpl->_assignInScope('u_c_mus', $_prefixVariable6);
if ($_smarty_tpl->tpl_vars['c']->value === $_smarty_tpl->tpl_vars['limit_of_users']->value) {
$_smarty_tpl->_assignInScope('f_display', 'none;');
$_smarty_tpl->_assignInScope('s_display', 'block;');
$_smarty_tpl->_assignInScope('aria_hidd', 'true');
$_smarty_tpl->_assignInScope('aria_hiddr', 'false');
$_smarty_tpl->_assignInScope('l_a_h', 'true');
}?><div class="mml_subcat_li mus_friends" style="display:<?php echo $_smarty_tpl->tpl_vars['f_display']->value;?>
" aria-hidden="<?php echo $_smarty_tpl->tpl_vars['aria_hidd']->value;?>
" aria-hidden-live="<?php echo $_smarty_tpl->tpl_vars['l_a_h']->value;?>
" data-href="users" data-action="true" data-query="?user=<?php echo $_smarty_tpl->tpl_vars['u_id']->value;?>
"><a class="mml_subcat_btn" style="padding-bottom:41px;" data-mymus-subcat="true" title="<?php echo $_smarty_tpl->tpl_vars['u_name']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['u_fam']->value;?>
"><div class="mml_ucard"><div class="mml_ucard_img"> <img class="mml_ucard_img_cnt" src="<?php echo $_smarty_tpl->tpl_vars['u_photo']->value;?>
" onerror="this.style.display='none';"><img src="/music/css/images/user50__dark-redesign.png"></div><div class="mml_ucard_n"><div class="mml_ucard_n_f ellip" style="margin-top:0px;"><?php echo $_smarty_tpl->tpl_vars['u_name']->value;?>
<br><?php echo $_smarty_tpl->tpl_vars['u_fam']->value;?>
</div></div></div><div class="mml_notif mml_notif__num __on"><?php echo $_smarty_tpl->tpl_vars['u_c_mus']->value;?>
</div></a></div><?php $_smarty_tpl->_assignInScope($_smarty_tpl->tpl_vars['c']->value, $_smarty_tpl->tpl_vars['c']->value++ ,true);
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></div><div class="mus_user-search_empty" id="mUSR" style="display: <?php echo $_smarty_tpl->tpl_vars['s_display']->value;?>
;"><p class="mus_user-search_empty-tx"></p><p class="mus_user-search_empty-tx" aria-hidden="<?php echo $_smarty_tpl->tpl_vars['aria_hiddr']->value;?>
"><a id="mus_show_all_friends" class="m_c_s_c_go_to">Show all friends</a></p><div class="mml_subcat_ul"></div></div></div><?php }
}
