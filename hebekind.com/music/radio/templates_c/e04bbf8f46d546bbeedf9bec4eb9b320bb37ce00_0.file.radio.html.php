<?php
/* Smarty version 3.1.34-dev-7, created on 2020-04-09 18:52:17
  from 'E:\XAMPP\htdocs\music\template\radio\radio.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e8f52c114fa11_22505915',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e04bbf8f46d546bbeedf9bec4eb9b320bb37ce00' => 
    array (
      0 => 'E:\\XAMPP\\htdocs\\music\\template\\radio\\radio.html',
      1 => 1499365828,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e8f52c114fa11_22505915 (Smarty_Internal_Template $_smarty_tpl) {
?><!--------------------------------- RADIO PAGE [ TEMPLATE ] ------------------------------->
<div class="m_c_s" aria-hidden="false"><div><div class="m_c_s_myRadio"><div class="m_c_s_header"><div class="m_c_s_headerWrapper"><div class="m_c_s_header_title">Broadcast&nbsp;</div></div></div><div class="mus_radio_w __inactive" style="height: 614px;"><div class="mus_radio" style="height: 240px;"><div class="mus_radio_noise"><div class="mus_radio_dec"><div class="mus_radio_top-grad"></div><div class="mus_radio_bot-grad"></div><div class="mus_radio_active-track"></div></div><div class="mus_album_frame usel-off"><div class="mus_album_i_w"><div class="curPointer"><div class="mus_album_side mus_album_side__a"><img alt="" width="100%" height="100%" class="mus_album_i" src="<?php echo $_smarty_tpl->tpl_vars['defaultcover']->value;?>
"></div></div><div class="mus_album_i_play"></div></div></div><div class="mus_album"><div class="mus_radio_tracks" style="top: -90px;"><div class="mus-tr_lst mus_scroll-overlay"><div class="mus_scroll-overlay_dummy"></div><div id="radio_station_tracks"><!-- ========= there appear the tracks of radio station selected ========= ---></div></div></div></div></div><div></div></div></div><div class="mus_radio_stations_w usel-off" style="top: 240px;"><div class="mus_radio_stations_top-fader"></div><div class="mus_radio_stations mus-custom-scrolling"><div class="mus_h2"><span>Choose Station</span><a class="mus_h2_a curPointer m_hidden">Reset</a></div><div class="mus_radio_stations_lst"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rows']->value, 'result');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['result']->value) {
ob_start();
echo $_smarty_tpl->tpl_vars['this']->value->getRadioArtists($_smarty_tpl->tpl_vars['result']->value['genre']);
$_prefixVariable1 = ob_get_clean();
$_smarty_tpl->_assignInScope('artist', $_prefixVariable1);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['genre'];
$_prefixVariable2 = ob_get_clean();
$_smarty_tpl->_assignInScope('radio_name', $_prefixVariable2);
ob_start();
echo $_smarty_tpl->tpl_vars['this']->value->replaceRadioName($_smarty_tpl->tpl_vars['radio_name']->value);
$_prefixVariable3 = ob_get_clean();
$_smarty_tpl->_assignInScope('radio', $_prefixVariable3);
ob_start();
echo $_smarty_tpl->tpl_vars['this']->value->replaceRadioWhiteSpace($_smarty_tpl->tpl_vars['radio_name']->value);
$_prefixVariable4 = ob_get_clean();
$_smarty_tpl->_assignInScope('rd_id_name', $_prefixVariable4);?><div class="mus_radio_stations_i" id="<?php echo $_smarty_tpl->tpl_vars['radio_name']->value;?>
" data-id="<?php echo $_smarty_tpl->tpl_vars['rd_id_name']->value;?>
"><div class="mus_radio_stations_i_b"><div class="mus_radio_station_h ellip"><?php echo $_smarty_tpl->tpl_vars['radio']->value;?>
</div><div class="mus_radio_station_d_w"><div class="mus_radio_station_d ellip"><?php echo $_smarty_tpl->tpl_vars['artist']->value;?>
 and others</div><div class="mus_radio_station_d_l">updating broadcast...</div></div></div></div><?php
}
} else {
?>The radio is empty.<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></div></div></div></div></div></div></div><?php }
}
