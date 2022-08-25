<?php
/* Smarty version 3.1.34-dev-7, created on 2020-11-09 16:04:56
  from '/var/www/vhosts/vps1957235.fastwebserver.de/localhost.vaneayoung.de/music/template/my_music/edit.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fa968a8d24b19_75842703',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '902355ba35b1742541bce369a409ed9862431317' => 
    array (
      0 => '/var/www/vhosts/vps1957235.fastwebserver.de/localhost.vaneayoung.de/music/template/my_music/edit.html',
      1 => 1596493536,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fa968a8d24b19_75842703 (Smarty_Internal_Template $_smarty_tpl) {
?>

<!--------------------------- EDIT MUSIC [ TEMPLATE ] ------------------------>

<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['query']->value, 'result');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['result']->value) {
if ($_smarty_tpl->tpl_vars['condition']->value === 0) {?><div><div class="mus_content_w"><div class="mus_album __edit"><div class="mus_album_i__fixed" style="position:fixed;"><div class="mus_album_i_w"><div class="mus_album_side_w curPointer"><div class="mus_album_side mus_album_side__c"><img alt="" class="mus_album_i" src="<?php echo $_smarty_tpl->tpl_vars['this']->value->defaultCover;?>
"></div><div class="mus_album_side mus_album_side__a"><img alt="" style="width:128px;height:128px;" class="mus_album_i" src="<?php echo $_smarty_tpl->tpl_vars['result']->value['cover'];?>
"></div></div></div><div class="m_c_s_c_go_to mt-5" title="<?php echo $_smarty_tpl->tpl_vars['result']->value['artist'];?>
"><?php echo $_smarty_tpl->tpl_vars['result']->value['artist'];?>
</div><div class="m_c_col-data"><div class="m_c_col-data_ac"><a class="mtico mus-dl m_c_col-data_ac_i __14 js-hide-in-edit m_hidden"><i class="mic14 mic14_upload"></i><span>Upload music</span></a><div aria-hidden="true" class="mb-10" style="display: none;"><div aria-valuemax="100" aria-valuemin="0" aria-valuenow="0" class="progress __dark" role="progressbar"><div class="progress_bar" style="width: 0%;"></div><div aria-hidden="false" class="progress_tx ellip"></div><span class="progress_ac"><span class="progress_ac_ic ic10 ic10_close-w m_hidden" role="button" title="Cancel"></span></span></div></div><div class="mtico m_c_col-data_ac_i __14" aria-hidden="true" style="display: none;"><div class="tico"><i class="tico_img ic"></i><span class="mus-text"></span></div></div><a class="mtico mus-dl m_c_col-data_ac_i __14 js-hide-in-edit js-pl-edit m_hidden"><i class="mic14 ic14_edit"></i><span>Edit</span></a><a class="vl_btn m_c_col-data_finish js-pl-edit-finish finish_my_music" data-href="mymusic">Ready</a></div></div></div><div class="mus-tr_lst mus_scroll-overlay" style="min-height: 280px;"><div id="mus_sort" data-act="my"><ol><?php }
$_smarty_tpl->_assignInScope($_smarty_tpl->tpl_vars['condition']->value, $_smarty_tpl->tpl_vars['condition']->value++ ,true);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['artist'];
$_prefixVariable1 = ob_get_clean();
$_smarty_tpl->_assignInScope('artist', $_prefixVariable1);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['title'];
$_prefixVariable2 = ob_get_clean();
$_smarty_tpl->_assignInScope('title', $_prefixVariable2);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['album'];
$_prefixVariable3 = ob_get_clean();
$_smarty_tpl->_assignInScope('album', $_prefixVariable3);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['id'];
$_prefixVariable4 = ob_get_clean();
$_smarty_tpl->_assignInScope('id', $_prefixVariable4);?><li target="#pm_sec_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" id="tracks_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"><div class="mus-tr_i  __has-video soh-s mus_track" edit-track-id="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" id="track_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" data-position="<?php echo $_smarty_tpl->tpl_vars['result']->value['position'];?>
" style=""><div class="mus-tr_hld __pr-m"><span class="mus-tr_restore"><span class="mus-tr_restore_tx"><span class="mus-tr_il js-mus-tr_restore" trackId="track_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" data-action="restore">Restore?</span>&nbsp;<?php echo $_smarty_tpl->tpl_vars['artist']->value;?>
&nbsp;&#8211;&nbsp;<?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</span></span><span class="mus-tr_play __play js-mus-tr_play" id="pm_sec_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" title="Play" data-action="play" data-quest='{"song":"<?php echo $_smarty_tpl->tpl_vars['this']->value->track_path($_smarty_tpl->tpl_vars['result']->value['path'],$_smarty_tpl->tpl_vars['result']->value['storage']);?>
","cover":"<?php echo $_smarty_tpl->tpl_vars['this']->value->cover_path($_smarty_tpl->tpl_vars['result']->value['cover'],$_smarty_tpl->tpl_vars['result']->value['storage']);?>
"}' ></span><div class="mus-tr_cnt"><a class="mus-tr_a mus-tr_artist" onclick="event.preventDefault();event.stopImmediatePropagation();"><?php echo $_smarty_tpl->tpl_vars['artist']->value;?>
</a>&nbsp;&#8211;&nbsp;<a class="mus-tr_a mus-tr_song" onclick="event.preventDefault();event.stopImmediatePropagation();"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</a><span style="display:none;" class="foh-s mus-tr_info">&nbsp;from&nbsp;<a class="mus-tr_a mus-tr_album" onclick="event.preventDefault();event.stopImmediatePropagation();"><span class="mus-tr_album-ic ic10_album"></span><?php echo $_smarty_tpl->tpl_vars['album']->value;?>
</a></span></div><div class="mus-tr_right-controls foh-s" id="rc_m_sec_klass"><span class="mus-tr_edit js-mus-tr_edit" trackid="track_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" title="Edit" data-action="edit"></span><span class="mus-tr_delete js-mus-tr_delete " title="Remove from my list" trackId="track_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" data-action="delete"></span></div><span class="mus-tr_time"><?php echo $_smarty_tpl->tpl_vars['result']->value['time'];?>
</span></div></div></li><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></div></div></ol>
    <?php }
}
