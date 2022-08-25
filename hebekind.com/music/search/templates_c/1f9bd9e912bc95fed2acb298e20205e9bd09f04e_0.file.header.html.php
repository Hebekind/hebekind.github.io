<?php
/* Smarty version 3.1.34-dev-7, created on 2022-01-18 13:36:51
  from '/home/u631248999/domains/hebekind.com/public_html/music/template/search/header.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_61e6c27395ca44_32297213',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1f9bd9e912bc95fed2acb298e20205e9bd09f04e' => 
    array (
      0 => '/home/u631248999/domains/hebekind.com/public_html/music/template/search/header.html',
      1 => 1642509743,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61e6c27395ca44_32297213 (Smarty_Internal_Template $_smarty_tpl) {
?><!------------------------- Header (statistic of search result) [ template ] --------------------------->

<div class="m_c_s" aria-hidden="false">
  <div class="m_c_s_searchResult m_c_s_bestMatch_artist pl-mb-90" id="windowMusic_search_container">
    <div class="m_c_s_header">
      <div class="m_c_s_headerWrapper">
        <div class="m_c_s_header_search_title">
          Search results in:
        </div>
        <div class="mus_tabs">
          <div class="mus_tabs_i <?php echo $_smarty_tpl->tpl_vars['song_active']->value;?>
">
            <div class="mus_tabs_i_a" <?php echo $_smarty_tpl->tpl_vars['songs_href']->value;?>
>
              Songs 
              <span class="mus_tabs_i_a_count">
                <?php echo $_smarty_tpl->tpl_vars['songs_count']->value;?>

              </span>
            </div>
          </div>
          <div class="mus_tabs_i <?php echo $_smarty_tpl->tpl_vars['inx_active']->value;?>
">
            <div class="mus_tabs_i_a" <?php echo $_smarty_tpl->tpl_vars['artis_href']->value;?>
>
              Artists 
              <span class="mus_tabs_i_a_count">
                <?php echo $_smarty_tpl->tpl_vars['artists_count']->value;?>

              </span>
            </div>
          </div>
          <div class="mus_tabs_i <?php echo $_smarty_tpl->tpl_vars['album_active']->value;?>
">
            <div class="mus_tabs_i_a" <?php echo $_smarty_tpl->tpl_vars['album_href']->value;?>
>
              Albums 
              <span class="mus_tabs_i_a_count">
                <?php echo $_smarty_tpl->tpl_vars['albums_count']->value;?>

              </span>
            </div>
          </div>
        </div>
      </div>
    </div><?php }
}
