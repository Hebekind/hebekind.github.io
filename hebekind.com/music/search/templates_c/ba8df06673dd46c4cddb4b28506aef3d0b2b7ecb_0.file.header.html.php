<?php
/* Smarty version 3.1.34-dev-7, created on 2020-04-09 21:19:37
  from 'E:\XAMPP\htdocs\music\template\search\header.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e8f7549dde4b9_87998301',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ba8df06673dd46c4cddb4b28506aef3d0b2b7ecb' => 
    array (
      0 => 'E:\\XAMPP\\htdocs\\music\\template\\search\\header.html',
      1 => 1499365832,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e8f7549dde4b9_87998301 (Smarty_Internal_Template $_smarty_tpl) {
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
