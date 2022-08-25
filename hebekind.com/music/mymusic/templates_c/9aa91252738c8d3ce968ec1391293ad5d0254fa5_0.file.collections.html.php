<?php
/* Smarty version 3.1.34-dev-7, created on 2022-01-18 13:36:27
  from '/home/u631248999/domains/hebekind.com/public_html/music/template/my_music/collections.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_61e6c25b26db85_50498788',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9aa91252738c8d3ce968ec1391293ad5d0254fa5' => 
    array (
      0 => '/home/u631248999/domains/hebekind.com/public_html/music/template/my_music/collections.html',
      1 => 1642509743,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61e6c25b26db85_50498788 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!---------- Collections [ TEMPLATE ] ------------>

<div class="mt-20  mb0"><div class="mus_h2 __left">Playlists</div><div class="mus_album-list __left" aria-hidden="false"><div><div class="mus_card_i __mymus"><div class="m_c_ppl_create"><i id="myMusicPPLCreateIco" class="m_c_ppl_create_ico"></i><div id="myMusicPPLCreateText" class="m_c_create_text">Add a playlist</div></div></div><?php if ($_smarty_tpl->tpl_vars['pl_count']->value <= 0) {?><div class="gwt-HTML"><div class="m_no_ppl_container"><div class="m_no_ppl_title">You haven't created a playlist yet.</div><div>Arrange your favourite music into playlists to make it easier for your friends to listen to music on MusicWindow!<br></div></div><?php } else { ?><span class="pl-mb-90"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['query']->value, 'result');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['result']->value) {
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['id'];
$_prefixVariable1 = ob_get_clean();
$_smarty_tpl->_assignInScope('m_pl_id', $_prefixVariable1);
ob_start();
echo urldecode($_smarty_tpl->tpl_vars['result']->value['name']);
$_prefixVariable2 = ob_get_clean();
$_smarty_tpl->_assignInScope('m_pl_name', $_prefixVariable2);
ob_start();
echo urldecode($_smarty_tpl->tpl_vars['result']->value['favorite_cover']);
$_prefixVariable3 = ob_get_clean();
$_smarty_tpl->_assignInScope('m_pl_cover', $_prefixVariable3);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['originalpid'];
$_prefixVariable4 = ob_get_clean();
$_smarty_tpl->_assignInScope('m_pl_original_pid', $_prefixVariable4);
ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['s_count'];
$_prefixVariable5 = ob_get_clean();
$_smarty_tpl->_assignInScope('m_pl_songs_count', $_prefixVariable5);
if ($_smarty_tpl->tpl_vars['m_pl_original_pid']->value > 0) {
ob_start();
echo $_smarty_tpl->tpl_vars['m_pl_original_pid']->value;
$_prefixVariable6 = ob_get_clean();
$_smarty_tpl->_assignInScope('m_pl_id', $_prefixVariable6);
}?><div class="mus_card_i wd24"><div class="mus_card __s" uid="card" id="crdI_<?php echo $_smarty_tpl->tpl_vars['m_pl_id']->value;?>
"><div class="mus_card_img_w mus_card_img_w__col"><img <?php if (empty($_smarty_tpl->tpl_vars['m_pl_cover']->value)) {?>style="display:none;"<?php }?> <?php if (!empty($_smarty_tpl->tpl_vars['m_pl_cover']->value)) {?>src="<?php echo $_smarty_tpl->tpl_vars['m_pl_cover']->value;?>
"<?php }?> width="100%" height="100%"><div class="mus_card_ac_lst"><span class="mus_card_ac_i mus_card_ac_i__pl" uid="pl" title="Play" data-href="playlist" data-action="true" data-query="?action=playlist&play=true&i=<?php echo $_smarty_tpl->tpl_vars['m_pl_id']->value;?>
"><span class="mus_card_play"></span>Play</span><span class="mus_card_ac_i mus_card_ac_i__ps" uid="pause" title="pause"><span class="mus_card_play __pause"></span>pause</span><span class="mus_card_ac_i mus_card_ac_i__more" title="More" data-href="playlist" data-action="true" data-query="?action=my&i=<?php echo $_smarty_tpl->tpl_vars['m_pl_id']->value;?>
"><span class="mus_card_more"></span>More</span></div></div><div class="mus_card_n_w"><div class="mus_card_n textWrap" data-href="playlist" data-action="true" data-query="?action=my&i=<?php echo $_smarty_tpl->tpl_vars['m_pl_id']->value;?>
"><span class="mus_card_n_a" title="<?php echo $_smarty_tpl->tpl_vars['m_pl_name']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['m_pl_name']->value;?>
</span></div><div class="mus_card_n_artist ellip"><?php echo $_smarty_tpl->tpl_vars['m_pl_songs_count']->value;?>
 songs</div></div></div></div><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></span><?php }?></div></div><?php }
}
