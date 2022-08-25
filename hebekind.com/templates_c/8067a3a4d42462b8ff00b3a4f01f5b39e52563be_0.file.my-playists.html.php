<?php
/* Smarty version 3.1.34-dev-7, created on 2022-01-18 14:40:15
  from '/home/u631248999/domains/hebekind.com/public_html/music/mobile/layout/my-playists.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_61e6c33f641b72_26273477',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8067a3a4d42462b8ff00b3a4f01f5b39e52563be' => 
    array (
      0 => '/home/u631248999/domains/hebekind.com/public_html/music/mobile/layout/my-playists.html',
      1 => 1642509742,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61e6c33f641b72_26273477 (Smarty_Internal_Template $_smarty_tpl) {
ob_start();
echo $_smarty_tpl->tpl_vars['_musheader']->value;
$_prefixVariable1 = ob_get_clean();
$_smarty_tpl->_subTemplateRender($_prefixVariable1, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
if ($_smarty_tpl->tpl_vars['this']->value->myCollectionsCount() <= 0) {?><h3><?php echo $_smarty_tpl->tpl_vars['this']->value->lang['you_dont_have_collections'];?>
</h3><div class="mus_mob_add_playlist"><a href="/mmusic/add-collection" hrefattr="true"><span class="glyphicon glyphicon-plus"></span>&nbsp;<?php echo $_smarty_tpl->tpl_vars['this']->value->lang['mus_create_collection'];?>
</a></div><?php } else { ?><div class="mus_mob_add_playlist"><a href="/mmusic/add-collection" hrefattr="true"><span class="glyphicon glyphicon-plus"></span>&nbsp;<?php echo $_smarty_tpl->tpl_vars['this']->value->lang['mus_create_collection'];?>
</a></div><div class="music_album_lst_w"><ul class="music_album_lst_grid"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['this']->value->myCollections(), 'collection');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['collection']->value) {
$_smarty_tpl->_assignInScope('pl_cover', urldecode($_smarty_tpl->tpl_vars['collection']->value['favorite_cover']));
if (strstr($_smarty_tpl->tpl_vars['pl_cover']->value,'mp3_covers')) {
ob_start();
echo urldecode($_smarty_tpl->tpl_vars['collection']->value['favorite_cover']);
$_prefixVariable2=ob_get_clean();
$_smarty_tpl->_assignInScope('pl_cover', $_prefixVariable2);
}?><li class="music_album_i m8" data-func="open" role="link"><A class="mobmusic-album-a" href="/mmusic/collection/<?php echo $_smarty_tpl->tpl_vars['collection']->value['id'];?>
" hrefattr="true"><?php if ($_smarty_tpl->tpl_vars['collection']->value['favorite_cover']) {?><img class="music_album_img" src="<?php echo $_smarty_tpl->tpl_vars['pl_cover']->value;?>
"><?php }?><div class="music_album_name-w"><div class="music_album_name"><?php echo urldecode($_smarty_tpl->tpl_vars['collection']->value['name']);?>
</div></div></a></li><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></ul></div><?php }
ob_start();
echo $_smarty_tpl->tpl_vars['_musfooter']->value;
$_prefixVariable3 = ob_get_clean();
$_smarty_tpl->_subTemplateRender($_prefixVariable3, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
}
}
