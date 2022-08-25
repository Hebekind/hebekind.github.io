<?php
/* Smarty version 3.1.34-dev-7, created on 2022-01-18 14:15:09
  from '/home/u631248999/domains/hebekind.com/public_html/music/mobile/layout/mus-header.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_61e6bd5dc5b5c2_62077561',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'af07c52c450171a0fa4de3a3993a2a542ec84449' => 
    array (
      0 => '/home/u631248999/domains/hebekind.com/public_html/music/mobile/layout/mus-header.html',
      1 => 1642509742,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61e6bd5dc5b5c2_62077561 (Smarty_Internal_Template $_smarty_tpl) {
if (!$_smarty_tpl->tpl_vars['is_json']->value) {?><div class="vy-mobile-music-container" id="mmusic_container"><?php }
if (!isset($_smarty_tpl->tpl_vars['change_header']->value)) {?><div data-headername="<?php echo $_smarty_tpl->tpl_vars['this']->value->lang['Home'];?>
" data-backhref="/?<?php echo time();?>
" id="modifyheader"></div><?php }?><div class="music-search-form"><div class="field input-text __has-icon __plain __search __active"><div class="input-text_visual"><div class="input-text_visual_inner"><div class="mus-search-ic"></div><input class="input-text_element search_input" id="musicSearchField" autocomplete="off" autocapitalize="off" autocorrect="off" spellcheck="false" data-func="inputInteraction" placeholder="Search for music" maxlength="250" type="text"><div class="input-text_icons"><label class="input-text_icon-w __search" for="musicSearchField" aria-hidden="true"><span class="ic  ic-search input-text_icon __empty ic16"></span></label><div class="ui_search_reset" style="display:none;" id="mus_search_clear" onclick="ga('#musicSearchField').val('').focus();ga(this).hide();"><span class="blind_label">Cancel</span></div><a href="/music/search/" style="display:none;" id="mus-search-a" hrefattr="true"></a><label class="input-text_icon-w __progress" for="musicSearchField" aria-hidden="true"><span class="ic  ic-progress input-text_icon __empty ic16"></span></label></div><label for="musicSearchField" class="input-text_visual_bg"></label></div></div></div></div><div class="music_content"><div class="upload-bar" id="mus-upload-bar"><ul></ul></div><nav role="navigation" class="tabs"><ul class="tabs_list js-tabs-list" role="menu"><li class="tabs_item"><a hrefattr="true" href="/mmusic/popular" class="tabs_action ai <?php if ($_smarty_tpl->tpl_vars['cmd']->value == 'popular') {?>aslnk<?php }?>" tabindex="0"><?php echo $_smarty_tpl->tpl_vars['this']->value->lang['Popular'];?>
<i class="tabs_action_counter hidden"></i></a></li><li class="tabs_item"><a hrefattr="true" href="/mmusic/mytracks" class="tabs_action ai <?php if ($_smarty_tpl->tpl_vars['cmd']->value == 'mytracks') {?>aslnk<?php }?>" tabindex="0"><?php echo $_smarty_tpl->tpl_vars['this']->value->lang['mus_my_music'];?>
<i id="mus_header_my_tracks_count" class="tabs_action_counter "><?php echo count($_smarty_tpl->tpl_vars['this']->value->myTracks());?>
</i></a></li><li class="tabs_item"><a hrefattr="true" id="mus_header_mycol" href="/mmusic/myplaylists" class="tabs_action ai <?php if ($_smarty_tpl->tpl_vars['cmd']->value == 'myplaylists') {?>aslnk<?php }?>" tabindex="0"><?php echo $_smarty_tpl->tpl_vars['this']->value->lang['mus_my_collections'];?>
<i class="tabs_action_counter "><?php echo $_smarty_tpl->tpl_vars['this']->value->myCollectionsCount();?>
</i></a></li><li class="tabs_item" style="display:none;"><a href="/mmusic/mytracks?v=<?php echo time();?>
" id="go_to_my_music" class="tabs_action ai" hrefattr="true" tabindex="0">&nbsp;</a></li></ul></nav><?php }
}
