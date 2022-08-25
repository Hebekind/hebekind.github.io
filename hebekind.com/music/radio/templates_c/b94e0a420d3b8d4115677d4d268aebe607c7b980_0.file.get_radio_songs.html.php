<?php
/* Smarty version 3.1.34-dev-7, created on 2020-04-09 21:25:40
  from 'E:\XAMPP\htdocs\music\template\radio\get_radio_songs.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e8f76b45572b2_01503239',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b94e0a420d3b8d4115677d4d268aebe607c7b980' => 
    array (
      0 => 'E:\\XAMPP\\htdocs\\music\\template\\radio\\get_radio_songs.html',
      1 => 1499365829,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e8f76b45572b2_01503239 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-------------------- get the songs by radio station [ Template ]  --------------------->
<ol><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rows']->value, 'result');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['result']->value) {
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['artist'];
$_prefixVariable1 = ob_get_clean();
$_smarty_tpl->_assignInScope('artist', $_prefixVariable1);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['title'];
$_prefixVariable2 = ob_get_clean();
$_smarty_tpl->_assignInScope('track', $_prefixVariable2);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['album'];
$_prefixVariable3 = ob_get_clean();
$_smarty_tpl->_assignInScope('album', $_prefixVariable3);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['time'];
$_prefixVariable4 = ob_get_clean();
$_smarty_tpl->_assignInScope('track_length', $_prefixVariable4);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['language'];
$_prefixVariable5 = ob_get_clean();
$_smarty_tpl->_assignInScope('track_lang', $_prefixVariable5);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['id'];
$_prefixVariable6 = ob_get_clean();
$_smarty_tpl->_assignInScope('track_id', $_prefixVariable6);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['path'];
$_prefixVariable7 = ob_get_clean();
$_smarty_tpl->_assignInScope('track_pth', $_prefixVariable7);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['cover'];
$_prefixVariable8 = ob_get_clean();
$_smarty_tpl->_assignInScope('track_cover', $_prefixVariable8);
$_smarty_tpl->_assignInScope('download', '');
if ($_smarty_tpl->tpl_vars['track_lang']->value === $_smarty_tpl->tpl_vars['d_ic']->value) {
$_smarty_tpl->_assignInScope('download', '__download');
}?><li target="#tri_m_sec_rd_<?php echo $_smarty_tpl->tpl_vars['track_id']->value;?>
"><div class="mus-tr_i  soh-s <?php echo $_smarty_tpl->tpl_vars['download']->value;?>
" id="tri_m_sec_radio_<?php echo $_smarty_tpl->tpl_vars['track_id']->value;?>
"><div class="mus-tr_hld"><span class="mus-tr_play __play js-mus-tr_play" id="p1m_sec_my_radio_<?php echo $_smarty_tpl->tpl_vars['track_id']->value;?>
" title="Play" data-action="play" data-quest='{"song":"<?php echo $_smarty_tpl->tpl_vars['track_pth']->value;?>
","cover":"<?php echo $_smarty_tpl->tpl_vars['track_cover']->value;?>
"}' ></span><?php if ($_smarty_tpl->tpl_vars['download']->value !== '') {?><span class="mus-tr_download js-mus-tr_download" title="Download"></span><?php }?><div class="mus-tr_cnt"><a class="mus-tr_a mus-tr_artist"><?php echo $_smarty_tpl->tpl_vars['artist']->value;?>
</a>&nbsp;&#8211;&nbsp;<a class="mus-tr_a mus-tr_song"><?php echo $_smarty_tpl->tpl_vars['track']->value;?>
</a><span class="foh-s mus-tr_info">&nbsp;from&nbsp;<a class="mus-tr_a mus-tr_album"><span class="mus-tr_album-ic ic10_album"></span><?php echo $_smarty_tpl->tpl_vars['album']->value;?>
</a></span></div><div class="mus-tr_right-controls foh-s" id="rc_m_sec_radio_<?php echo $_smarty_tpl->tpl_vars['track_id']->value;?>
"><span class="mus-tr_add js-mus-tr_add" title="Add to My music"></span><span class="mus-tr_dropdown js-mus_dropdown_trigger" title="Add to the playlist"></span></div><span class="mus-tr_time"><?php echo $_smarty_tpl->tpl_vars['track_length']->value;?>
</span></div></div></li><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></ol><?php }
}
