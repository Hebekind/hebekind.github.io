<?php
/* Smarty version 3.1.34-dev-7, created on 2020-04-10 01:32:07
  from 'E:\XAMPP\htdocs\music\template\my_music\history.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e8fb077c5d138_03944104',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e6c2ea2e71d81140468dc46715abf43b203464bc' => 
    array (
      0 => 'E:\\XAMPP\\htdocs\\music\\template\\my_music\\history.html',
      1 => 1586460451,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e8fb077c5d138_03944104 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-------------------------- RECENTLY PLAYED (History) [ TEMPLATE ] -------------------->

<?php if ($_smarty_tpl->tpl_vars['count']->value <= 0) {?><div class="pplmus_stub"><div class="mus_content_w"><div class="noMusic_c"><div class="ppl_empty_layer_hld"><div class="history_empty_layer_cnt"><div class="portlet-i_h">Here are displayed<br>all played songs</div><div class="mb-15"><span>Press button</span><span class="mus_stub_play"></span><span>to start<br>playback.</span></div><img alt="" src="<?php echo $_smarty_tpl->tpl_vars['this']->value->musicimg;?>
mus_stub_playlist.png"></div></div></div><?php } else { ?><div class="mus_history_cnt"><ol><?php $_smarty_tpl->_assignInScope('todaycl', '');
$_smarty_tpl->_assignInScope('nmt', '');
$_smarty_tpl->_assignInScope('date', '');
$_smarty_tpl->_assignInScope('day', '');
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['query']->value, 'result');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['result']->value) {
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['s_id'];
$_prefixVariable1 = ob_get_clean();
$_smarty_tpl->_assignInScope('s_id', $_prefixVariable1);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['path'];
$_prefixVariable2 = ob_get_clean();
$_smarty_tpl->_assignInScope('s_path', $_prefixVariable2);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['cover'];
$_prefixVariable3 = ob_get_clean();
$_smarty_tpl->_assignInScope('s_cover', $_prefixVariable3);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['time'];
$_prefixVariable4 = ob_get_clean();
$_smarty_tpl->_assignInScope('s_time', $_prefixVariable4);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['artist'];
$_prefixVariable5 = ob_get_clean();
$_smarty_tpl->_assignInScope('artist', $_prefixVariable5);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['title'];
$_prefixVariable6 = ob_get_clean();
$_smarty_tpl->_assignInScope('song', $_prefixVariable6);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['album'];
$_prefixVariable7 = ob_get_clean();
$_smarty_tpl->_assignInScope('album', $_prefixVariable7);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['video'];
$_prefixVariable8 = ob_get_clean();
$_smarty_tpl->_assignInScope('track_video', $_prefixVariable8);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['language'];
$_prefixVariable9 = ob_get_clean();
$_smarty_tpl->_assignInScope('track_lang', $_prefixVariable9);
$_smarty_tpl->_assignInScope('download', '');
if ($_smarty_tpl->tpl_vars['track_lang']->value === $_smarty_tpl->tpl_vars['this']->value->show_prch_icon) {
$_smarty_tpl->_assignInScope('download', '__download');
}
if ($_smarty_tpl->tpl_vars['curr_year']->value === date('Y',$_smarty_tpl->tpl_vars['result']->value['listen'])) {
$_smarty_tpl->_assignInScope('date', date('j F',$_smarty_tpl->tpl_vars['result']->value['listen']));
$_smarty_tpl->_assignInScope('day', explode(' ',$_smarty_tpl->tpl_vars['date']->value));
} else {
$_smarty_tpl->_assignInScope('date', date('d.m.Y',$_smarty_tpl->tpl_vars['result']->value['listen']));
$_smarty_tpl->_assignInScope('day', explode('.',$_smarty_tpl->tpl_vars['date']->value));
}
if ($_smarty_tpl->tpl_vars['day']->value[0] === $_smarty_tpl->tpl_vars['today']->value) {
$_smarty_tpl->_assignInScope('date', 'Today');
$_smarty_tpl->_assignInScope('todaycl', 'today');
$_smarty_tpl->_assignInScope('nmt', '__no-mt');
} elseif ($_smarty_tpl->tpl_vars['day']->value[0] === $_smarty_tpl->tpl_vars['yday']->value) {
$_smarty_tpl->_assignInScope('date', 'Yesterday');
}
if ($_smarty_tpl->tpl_vars['condition']->value !== $_smarty_tpl->tpl_vars['day']->value[0]) {?><div class="mus_timestamp <?php echo $_smarty_tpl->tpl_vars['nmt']->value;?>
"><div class="mus_timestamp_cnt"><div class="mus_timestamp_tx <?php echo $_smarty_tpl->tpl_vars['todaycl']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['date']->value;?>
</div></div></div><?php }?><li target="#p0m_sec_history_<?php echo $_smarty_tpl->tpl_vars['s_id']->value;?>
"><div class="mus-tr_i __has-video soh-s <?php echo $_smarty_tpl->tpl_vars['download']->value;?>
" id="tri_m_sec_history_<?php echo $_smarty_tpl->tpl_vars['s_id']->value;?>
"><div class="mus-tr_hld"><span class="mus-tr_play __play js-mus-tr_play" id="p0m_sec_history_<?php echo $_smarty_tpl->tpl_vars['s_id']->value;?>
" title="Play" data-action="play" data-quest='{"song":"<?php echo $_smarty_tpl->tpl_vars['s_path']->value;?>
","cover":"<?php echo $_smarty_tpl->tpl_vars['s_cover']->value;?>
"}'></span><?php if ($_smarty_tpl->tpl_vars['download']->value !== '') {?><span class="mus-tr_download js-mus-tr_download" title="Download"></span><?php }?><div class="mus-tr_cnt"><a class="mus-tr_a mus-tr_artist"><?php echo $_smarty_tpl->tpl_vars['artist']->value;?>
</a>&nbsp;&#8211;&nbsp;<a class="mus-tr_a mus-tr_song"><?php echo $_smarty_tpl->tpl_vars['song']->value;?>
</a><span class="foh-s mus-tr_info">&nbsp;from&nbsp;<a class="mus-tr_a mus-tr_album"><span class="mus-tr_album-ic ic10_album"></span><?php echo $_smarty_tpl->tpl_vars['album']->value;?>
</a></span></div><div class="mus-tr_right-controls foh-s" id="rc_m_sec_history_<?php echo $_smarty_tpl->tpl_vars['s_id']->value;?>
"><span class="mus-tr_add js-mus-tr_add" title="Add to My music"></span><span class="mus-tr_dropdown js-mus_dropdown_trigger" title="Add to the playlist"></span></div><span class="mus-tr_time"><?php echo $_smarty_tpl->tpl_vars['s_time']->value;?>
</span></div><?php if ($_smarty_tpl->tpl_vars['track_video']->value > '0') {?><div class="mus-tr_video" data-showVideo="true" data-video="<?php echo $_smarty_tpl->tpl_vars['track_video']->value;?>
"></div><?php }?></div></li><?php $_smarty_tpl->_assignInScope('condition', $_smarty_tpl->tpl_vars['day']->value[0]);
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></ol></div><div id="history_page_active"></div><div style="position:relative;bottom:-10px;padding:20px;left:45%;" id="history_dmm_scr_load"></div><?php }?>
    <?php }
}
