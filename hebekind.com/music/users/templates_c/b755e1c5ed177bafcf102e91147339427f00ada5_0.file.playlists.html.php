<?php
/* Smarty version 3.1.34-dev-7, created on 2020-04-10 01:58:54
  from 'E:\XAMPP\htdocs\music\template\users\playlists.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e8fb6be1a86d2_81922127',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b755e1c5ed177bafcf102e91147339427f00ada5' => 
    array (
      0 => 'E:\\XAMPP\\htdocs\\music\\template\\users\\playlists.html',
      1 => 1499365833,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e8fb6be1a86d2_81922127 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!---------- User's playlists ---------->
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pl_query']->value, 'result');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['result']->value) {
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['id'];
$_prefixVariable11 = ob_get_clean();
$_smarty_tpl->_assignInScope('m_pl_id', $_prefixVariable11);
ob_start();
echo urldecode($_smarty_tpl->tpl_vars['result']->value['name']);
$_prefixVariable12 = ob_get_clean();
$_smarty_tpl->_assignInScope('m_pl_name', $_prefixVariable12);
ob_start();
echo urldecode($_smarty_tpl->tpl_vars['result']->value['favorite_cover']);
$_prefixVariable13 = ob_get_clean();
$_smarty_tpl->_assignInScope('m_pl_cover', $_prefixVariable13);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['originalpid'];
$_prefixVariable14 = ob_get_clean();
$_smarty_tpl->_assignInScope('m_pl_original_pid', $_prefixVariable14);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['s_count'];
$_prefixVariable15 = ob_get_clean();
$_smarty_tpl->_assignInScope('m_pl_songs_count', $_prefixVariable15);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['playcount'];
$_prefixVariable16 = ob_get_clean();
$_smarty_tpl->_assignInScope('m_pl_play_count', $_prefixVariable16);
if ($_smarty_tpl->tpl_vars['m_pl_original_pid']->value && $_smarty_tpl->tpl_vars['m_pl_play_count']->value !== '-0') {
ob_start();
echo $_smarty_tpl->tpl_vars['m_pl_original_pid']->value;
$_prefixVariable17 = ob_get_clean();
$_smarty_tpl->_assignInScope('m_pl_id', $_prefixVariable17);
}
if ($_smarty_tpl->tpl_vars['condition']->value === 0) {?><div class="mt-20  mb0"><div class="mus_h2 __left">Playlists</div><div class="mus_album-list __left" aria-hidden="false"><div><span class="pl-mb-90" id="user_have_playlist"><?php }?><div class="mus_card_i wd24"><div class="mus_card __s" uid="card" id="crdI_<?php echo $_smarty_tpl->tpl_vars['m_pl_id']->value;?>
" data-pl-count="<?php echo $_smarty_tpl->tpl_vars['m_pl_songs_count']->value;?>
"><div class="mus_card_img_w mus_card_img_w__col"><img src="<?php echo $_smarty_tpl->tpl_vars['m_pl_cover']->value;?>
" width="100%" height="100%"><div class="mus_card_ac_lst"><span class="mus_card_ac_i mus_card_ac_i__pl" uid="pl" title="Play" data-href="playlist" data-action="true" data-query="?action=playlist&play=true&i=<?php echo $_smarty_tpl->tpl_vars['m_pl_id']->value;?>
"><span class="mus_card_play"></span>Play</span><span class="mus_card_ac_i mus_card_ac_i__ps" uid="pause" title="pause"><span class="mus_card_play __pause"></span>pause</span><span class="mus_card_ac_i mus_card_ac_i__add" uid="add" title="add"><span class="mus_card_add"></span>add</span><span class="mus_card_ac_i mus_card_ac_i__success" title="Added"><span class="mus_card_add __added"></span>Added</span><span class="mus_card_ac_i mus_card_ac_i__more" title="More" data-href="playlist" data-action="true" data-query="?action=my&i=<?php echo $_smarty_tpl->tpl_vars['m_pl_id']->value;?>
"><span class="mus_card_more"></span>More</span></div></div><div class="mus_card_n_w"><div class="mus_card_n textWrap" data-href="playlist" data-action="true" data-query="?action=my&i=<?php echo $_smarty_tpl->tpl_vars['m_pl_id']->value;?>
"><span class="mus_card_n_a" title="<?php echo $_smarty_tpl->tpl_vars['m_pl_name']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['m_pl_name']->value;?>
</span></div><span class="mus_card_n_artist ellip"><?php echo $_smarty_tpl->tpl_vars['m_pl_songs_count']->value;?>
 songs</span></div></div></div><?php $_smarty_tpl->_assignInScope($_smarty_tpl->tpl_vars['condition']->value, $_smarty_tpl->tpl_vars['condition']->value++ ,true);
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></span></div></div><?php }
}
