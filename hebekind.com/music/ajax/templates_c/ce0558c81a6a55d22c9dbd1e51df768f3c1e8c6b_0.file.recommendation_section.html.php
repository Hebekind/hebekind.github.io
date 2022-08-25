<?php
/* Smarty version 3.1.34-dev-7, created on 2020-04-09 18:52:28
  from 'E:\XAMPP\htdocs\music\template\ajax_result\recommendation_section.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e8f52cc44c102_12623229',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ce0558c81a6a55d22c9dbd1e51df768f3c1e8c6b' => 
    array (
      0 => 'E:\\XAMPP\\htdocs\\music\\template\\ajax_result\\recommendation_section.html',
      1 => 1499365821,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e8f52cc44c102_12623229 (Smarty_Internal_Template $_smarty_tpl) {
?><!--- SONGS FOR RECOMMENDATION SECTION ---->
<ol class="rec_pl"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['query']->value, 'result');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['result']->value) {
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['id'];
$_prefixVariable1 = ob_get_clean();
$_smarty_tpl->_assignInScope('id', $_prefixVariable1);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['artist'];
$_prefixVariable2 = ob_get_clean();
$_smarty_tpl->_assignInScope('artist', $_prefixVariable2);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['title'];
$_prefixVariable3 = ob_get_clean();
$_smarty_tpl->_assignInScope('song', $_prefixVariable3);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['album'];
$_prefixVariable4 = ob_get_clean();
$_smarty_tpl->_assignInScope('album', $_prefixVariable4);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['path'];
$_prefixVariable5 = ob_get_clean();
$_smarty_tpl->_assignInScope('filep', $_prefixVariable5);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['cover'];
$_prefixVariable6 = ob_get_clean();
$_smarty_tpl->_assignInScope('fcover', $_prefixVariable6);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['time'];
$_prefixVariable7 = ob_get_clean();
$_smarty_tpl->_assignInScope('ftime', $_prefixVariable7);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['video'];
$_prefixVariable8 = ob_get_clean();
$_smarty_tpl->_assignInScope('track_video', $_prefixVariable8);?><li target="track_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" id="tr_rc_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"><div class="mus-tr_i  __has-video soh-s <?php echo $_smarty_tpl->tpl_vars['download']->value;?>
" id="tri_m_sec_ppl_rec_tr_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"><div class="mus-tr_hld"><span class="mus-tr_play __play js-mus-tr_play" id="recommendation_tr<?php echo $_smarty_tpl->tpl_vars['add_slash']->value;
echo $_smarty_tpl->tpl_vars['id']->value;?>
" title="Play" data-action="play" data-quest='{"song":"<?php echo $_smarty_tpl->tpl_vars['filep']->value;?>
","cover":"<?php echo $_smarty_tpl->tpl_vars['fcover']->value;?>
"}'></span><?php if ($_smarty_tpl->tpl_vars['download']->value !== '') {?><span class="mus-tr_download js-mus-tr_download" onclick="return call_buy_popup(jQuery(this));" title="Download"></span><?php }?><div class="mus-tr_cnt"><a class="mus-tr_a mus-tr_artist"><?php echo $_smarty_tpl->tpl_vars['artist']->value;?>
</a>&nbsp;&#8211;&nbsp;<a class="mus-tr_a mus-tr_song"><?php echo $_smarty_tpl->tpl_vars['song']->value;?>
</a><span class="foh-s mus-tr_info">&nbsp;from&nbsp;<a class="mus-tr_a mus-tr_album"><span class="mus-tr_album-ic ic10_album"></span><?php echo $_smarty_tpl->tpl_vars['album']->value;?>
</a></span></div><div class="mus-tr_right-controls foh-s" id="rc_m_sec_ppl_rec_tr_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"><span class="mus-tr_add js-mus-tr_add" title="Add to My music"></span><span class="mus-tr_dropdown js-mus_dropdown_trigger" title="Add to the playlist"></span></div><span class="mus-tr_time"><?php echo $_smarty_tpl->tpl_vars['ftime']->value;?>
</span></div><?php if ($_smarty_tpl->tpl_vars['track_video']->value > '0') {?><div class="mus-tr_video" data-showVideo="true" data-video="<?php echo $_smarty_tpl->tpl_vars['track_video']->value;?>
"></div><?php }?></div></li><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></ol><?php }
}
