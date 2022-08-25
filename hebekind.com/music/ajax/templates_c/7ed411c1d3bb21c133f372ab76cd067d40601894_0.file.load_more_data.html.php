<?php
/* Smarty version 3.1.34-dev-7, created on 2020-04-10 01:30:40
  from 'E:\XAMPP\htdocs\music\template\ajax_result\load_more_data.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e8fb020708053_77328345',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7ed411c1d3bb21c133f372ab76cd067d40601894' => 
    array (
      0 => 'E:\\XAMPP\\htdocs\\music\\template\\ajax_result\\load_more_data.html',
      1 => 1499365821,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e8fb020708053_77328345 (Smarty_Internal_Template $_smarty_tpl) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['query']->value, 'result');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['result']->value) {
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['id'];
$_prefixVariable1 = ob_get_clean();
$_smarty_tpl->_assignInScope('mr_id', $_prefixVariable1);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['artist'];
$_prefixVariable2 = ob_get_clean();
$_smarty_tpl->_assignInScope('mr_artist', $_prefixVariable2);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['title'];
$_prefixVariable3 = ob_get_clean();
$_smarty_tpl->_assignInScope('mr_song', $_prefixVariable3);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['album'];
$_prefixVariable4 = ob_get_clean();
$_smarty_tpl->_assignInScope('mr_album', $_prefixVariable4);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['path'];
$_prefixVariable5 = ob_get_clean();
$_smarty_tpl->_assignInScope('mr_pth', $_prefixVariable5);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['cover'];
$_prefixVariable6 = ob_get_clean();
$_smarty_tpl->_assignInScope('mr_cover', $_prefixVariable6);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['time'];
$_prefixVariable7 = ob_get_clean();
$_smarty_tpl->_assignInScope('mr_time', $_prefixVariable7);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['video'];
$_prefixVariable8 = ob_get_clean();
$_smarty_tpl->_assignInScope('mr_video', $_prefixVariable8);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['language'];
$_prefixVariable9 = ob_get_clean();
$_smarty_tpl->_assignInScope('mr_lang', $_prefixVariable9);
$_smarty_tpl->_assignInScope('download', '');
if ($_smarty_tpl->tpl_vars['mr_lang']->value === $_smarty_tpl->tpl_vars['purchase_ic']->value) {
$_smarty_tpl->_assignInScope('download', '__download');
}?><!---- only for history page, store the current year, current day ..... ----><?php if ($_smarty_tpl->tpl_vars['b']->value == 'history') {
if ($_smarty_tpl->tpl_vars['curr_year']->value === date('Y',$_smarty_tpl->tpl_vars['result']->value['listen'])) {
$_smarty_tpl->_assignInScope('date', date('j F',$_smarty_tpl->tpl_vars['result']->value['listen']));
$_smarty_tpl->_assignInScope('day', explode(' ',$_smarty_tpl->tpl_vars['date']->value));
} else {
$_smarty_tpl->_assignInScope('date', date('d.m.Y',$_smarty_tpl->tpl_vars['result']->value['listen']));
$_smarty_tpl->_assignInScope('day', explode('.',$_smarty_tpl->tpl_vars['date']->value));
}
if (!isset($_smarty_tpl->tpl_vars['_SESSION']->value['curr_date_res'])) {
$_tmp_array = isset($_smarty_tpl->tpl_vars['_SESSION']) ? $_smarty_tpl->tpl_vars['_SESSION']->value : array();
if (!is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess) {
settype($_tmp_array, 'array');
}
$_tmp_array['curr_date_res'] = $_smarty_tpl->tpl_vars['day']->value[0];
$_smarty_tpl->_assignInScope('_SESSION', $_tmp_array);
}
if ($_smarty_tpl->tpl_vars['_SESSION']->value['curr_date_res'] !== $_smarty_tpl->tpl_vars['day']->value[0]) {?><div class="mus_timestamp <?php echo $_smarty_tpl->tpl_vars['nmt']->value;?>
"><div class="mus_timestamp_cnt"><div class="mus_timestamp_tx <?php echo $_smarty_tpl->tpl_vars['todaycl']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['date']->value;?>
</div></div></div><?php }
$_tmp_array = isset($_smarty_tpl->tpl_vars['_SESSION']) ? $_smarty_tpl->tpl_vars['_SESSION']->value : array();
if (!is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess) {
settype($_tmp_array, 'array');
}
$_tmp_array['curr_date_res'] = $_smarty_tpl->tpl_vars['day']->value[0];
$_smarty_tpl->_assignInScope('_SESSION', $_tmp_array);
}?><!--- end for history page ----><li target="#m_<?php echo $_smarty_tpl->tpl_vars['b']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['pd_fr']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['mr_id']->value;?>
"><div class="mus-tr_i  __has-video soh-s <?php echo $_smarty_tpl->tpl_vars['download']->value;?>
" id="tri_<?php echo $_smarty_tpl->tpl_vars['pd_fr']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['mr_id']->value;?>
"><div class="mus-tr_hld"><span class="mus-tr_play __play js-mus-tr_play datanw" id="m_<?php echo $_smarty_tpl->tpl_vars['b']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['pd_fr']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['mr_id']->value;?>
" title="Play" data-action="play" data-quest='{"song":"<?php echo $_smarty_tpl->tpl_vars['mr_pth']->value;?>
","cover":"<?php echo $_smarty_tpl->tpl_vars['mr_cover']->value;?>
"}'></span><?php if ($_smarty_tpl->tpl_vars['download']->value !== '') {?><span class="mus-tr_download js-mus-tr_download" title="Download"></span><?php }?><div class="mus-tr_cnt"><a class="mus-tr_a mus-tr_artist"><?php echo $_smarty_tpl->tpl_vars['mr_artist']->value;?>
</a>&nbsp;&#8211;&nbsp;<a class="mus-tr_a mus-tr_song"><?php echo $_smarty_tpl->tpl_vars['mr_song']->value;?>
</a><span class="foh-s mus-tr_info">&nbsp;from&nbsp;<a class="mus-tr_a mus-tr_album"><span class="mus-tr_album-ic ic10_album"></span><?php echo $_smarty_tpl->tpl_vars['mr_album']->value;?>
</a></span></div><div class="mus-tr_right-controls foh-s" id="rc_<?php echo $_smarty_tpl->tpl_vars['mr_id']->value;?>
"><span class="mus-tr_add js-mus-tr_add" title="Add to My music"></span><span class="mus-tr_dropdown js-mus_dropdown_trigger" title="Add to the playlist"></span></div><span class="mus-tr_time"><?php echo $_smarty_tpl->tpl_vars['mr_time']->value;?>
</span></div><?php if ($_smarty_tpl->tpl_vars['mr_video']->value > '0') {?><div class="mus-tr_video" data-showVideo="true" data-video="<?php echo $_smarty_tpl->tpl_vars['mr_video']->value;?>
"></div><?php }?></div></li><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
