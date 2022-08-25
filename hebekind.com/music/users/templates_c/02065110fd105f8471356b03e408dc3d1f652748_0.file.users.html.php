<?php
/* Smarty version 3.1.34-dev-7, created on 2022-01-18 14:12:05
  from '/home/u631248999/domains/hebekind.com/public_html/music/template/users/users.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_61e6cab50e3ee0_76219563',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '02065110fd105f8471356b03e408dc3d1f652748' => 
    array (
      0 => '/home/u631248999/domains/hebekind.com/public_html/music/template/users/users.html',
      1 => 1642509743,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61e6cab50e3ee0_76219563 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!------------ User's songs -------------->

<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['s_query']->value, 'result');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['result']->value) {
if ($_smarty_tpl->tpl_vars['condition']->value === 0) {?><div class="mus_content_w"><div class="mus_album"><div class="mus_album_i__fixed"><div class="mus_album_i_w"><div class="mus_album_side_w curPointer"><div class="mus_album_side mus_album_side__c"><img alt="" class="mus_album_i" src="<?php echo $_smarty_tpl->tpl_vars['this']->value->defaultCover;?>
"></div><div class="mus_album_side mus_album_side__a"><img alt="" style="width:128px;height:128px;" class="mus_album_i" src="<?php echo $_smarty_tpl->tpl_vars['result']->value['cover'];?>
"></div></div></div><div class="m_c_s_c_go_to mt-5" title="<?php echo $_smarty_tpl->tpl_vars['result']->value['artist'];?>
"><?php echo $_smarty_tpl->tpl_vars['result']->value['artist'];?>
</div></div><div class="mus-tr_lst mus_scroll-overlay" aria-hidden="false" style="min-height: 280px;"><div class="mus_scroll-overlay_dummy"></div><ol><?php }
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['storage'];
$_prefixVariable1 = ob_get_clean();
$_smarty_tpl->_assignInScope('storage', $_prefixVariable1);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['id'];
$_prefixVariable2 = ob_get_clean();
$_smarty_tpl->_assignInScope('s_id', $_prefixVariable2);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['artist'];
$_prefixVariable3 = ob_get_clean();
$_smarty_tpl->_assignInScope('s_artist', $_prefixVariable3);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['title'];
$_prefixVariable4 = ob_get_clean();
$_smarty_tpl->_assignInScope('s_song', $_prefixVariable4);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['album'];
$_prefixVariable5 = ob_get_clean();
$_smarty_tpl->_assignInScope('s_album', $_prefixVariable5);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['path'];
$_prefixVariable6 = ob_get_clean();
$_smarty_tpl->_assignInScope('s_pth', $_prefixVariable6);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['cover'];
$_prefixVariable7 = ob_get_clean();
$_smarty_tpl->_assignInScope('s_cover', $_prefixVariable7);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['time'];
$_prefixVariable8 = ob_get_clean();
$_smarty_tpl->_assignInScope('s_time', $_prefixVariable8);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['video'];
$_prefixVariable9 = ob_get_clean();
$_smarty_tpl->_assignInScope('s_video', $_prefixVariable9);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['language'];
$_prefixVariable10 = ob_get_clean();
$_smarty_tpl->_assignInScope('s_lang', $_prefixVariable10);
$_smarty_tpl->_assignInScope('download', '');
if ($_smarty_tpl->tpl_vars['s_lang']->value === $_smarty_tpl->tpl_vars['purchase_ic']->value) {
$_smarty_tpl->_assignInScope('download', '__download');
}?><li target="#p0_fr_<?php echo $_smarty_tpl->tpl_vars['this']->value->user_id;?>
_<?php echo $_smarty_tpl->tpl_vars['s_id']->value;?>
"><div class="mus-tr_i  __has-video soh-s <?php echo $_smarty_tpl->tpl_vars['download']->value;?>
"  id="tri_<?php echo $_smarty_tpl->tpl_vars['this']->value->user_id;?>
_<?php echo $_smarty_tpl->tpl_vars['s_id']->value;?>
"><div class="mus-tr_hld"><span class="mus-tr_play __play js-mus-tr_play" id="p0_fr_<?php echo $_smarty_tpl->tpl_vars['this']->value->user_id;?>
_<?php echo $_smarty_tpl->tpl_vars['s_id']->value;?>
" title="Play" data-action="play" data-quest='{"song":"<?php echo $_smarty_tpl->tpl_vars['this']->value->track_path($_smarty_tpl->tpl_vars['s_pth']->value,$_smarty_tpl->tpl_vars['storage']->value);?>
","cover":"<?php echo $_smarty_tpl->tpl_vars['this']->value->cover_path($_smarty_tpl->tpl_vars['s_cover']->value,$_smarty_tpl->tpl_vars['storage']->value);?>
"}'> </span><?php if ($_smarty_tpl->tpl_vars['download']->value !== '') {?><span class="mus-tr_download js-mus-tr_download" title="Download"></span><?php }?><div class="mus-tr_cnt"><a class="mus-tr_a mus-tr_artist"><?php echo $_smarty_tpl->tpl_vars['s_artist']->value;?>
</a>&nbsp;&#8211;&nbsp;<a class="mus-tr_a mus-tr_song"><?php echo $_smarty_tpl->tpl_vars['s_song']->value;?>
</a><span class="foh-s mus-tr_info">&nbsp;from&nbsp;<a class="mus-tr_a mus-tr_album"><span class="mus-tr_album-ic ic10_album"></span><?php echo $_smarty_tpl->tpl_vars['s_album']->value;?>
</a></span></div><div class="mus-tr_right-controls foh-s" id="rc_<?php echo $_smarty_tpl->tpl_vars['s_id']->value;?>
"><span class="mus-tr_add js-mus-tr_add" title="Add to My music"></span><span class="mus-tr_dropdown js-mus_dropdown_trigger" title="Add to the playlist"></span></div><span class="mus-tr_time"><?php echo $_smarty_tpl->tpl_vars['s_time']->value;?>
</span></div><?php if ($_smarty_tpl->tpl_vars['s_video']->value > '0') {?><div class="mus-tr_video" data-showVideo="true" data-video="<?php echo $_smarty_tpl->tpl_vars['s_video']->value;?>
"></div><?php }?></div></li><?php ob_start();
echo $_smarty_tpl->tpl_vars['condition']->value++;
$_prefixVariable11 = ob_get_clean();
$_smarty_tpl->_assignInScope('condition', $_prefixVariable11);
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></ol></div><?php if ($_smarty_tpl->tpl_vars['songs_count']->value >= $_smarty_tpl->tpl_vars['friend_songs_limit']->value) {?><div class="m_c_s_c_go_to mt-20" id="mus_more_song" d-more-songs="true" data-users-mr-sng="true" data-q="friends" data-user="<?php echo $_smarty_tpl->tpl_vars['this']->value->user_id;?>
">More songs</div><?php }?><!--- get the user's playlists ----><?php echo $_smarty_tpl->tpl_vars['this']->value->getUserPlaylists();?>

               <?php }
}
