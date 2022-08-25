<?php
/* Smarty version 3.1.34-dev-7, created on 2020-11-09 15:58:13
  from '/var/www/vhosts/vps1957235.fastwebserver.de/localhost.vaneayoung.de/music/template/popups/p_collection.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fa96715a11821_02717688',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6d2335afe587db9fde9a0ad6a7de7e9dae1378e8' => 
    array (
      0 => '/var/www/vhosts/vps1957235.fastwebserver.de/localhost.vaneayoung.de/music/template/popups/p_collection.html',
      1 => 1596493799,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fa96715a11821_02717688 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!------------------------ Create new collection [ popup layer ] ----------------------------->

<div id="layer_popup">
  <div class="layer_ovr">
  </div>
  <div class="playlist_add_layer_cnt mus_playlist-add mml_popup">
    <div class="portlet-i_h">
      Create a playlist
    </div>
    <div class="form">
      <div class="form_i mb-5">
        <div class="it_w noPadding">
          <input class="it vl_it" maxlength="100" type="text" id="nameOfAlbum">
          <span class="mus_playlist-add_placeholder" data-input="#nameOfAlbum">
            What'd you call it?
          </span>
        </div>
      </div>
      <div class="form_i noMargin" id="emptyPlayList">
        <div>
          
          <span>
            This playlist is empty.
          </span>
          
          <span class="m_c_s_c_go_to">
            
            <span>
              Add
            </span>
            
          </span>
        </div>
      </div>
      <div class="m_hidden mus_playlist-add_hld">
        <div class="mus_playlist-add_h">
          <div class="jcol-l">
            <div class="mus_tabs">
              
              <span class="mus_tabs_i __active">
                
                <span class="mus_tabs_i_a">
                  My music
                </span>
                
              </span>
              <span class="mus_tabs_i">
                
                <span class="mus_tabs_i_a">
                  
                  <span>
                    Selected
                  </span>
                  
                  <span class="mus_tabs_i_a_count">
                    0
                  </span>
                  
                </span>
              </span>
            </div>
          </div>
          <div class="jcol-r">
            <div class="mus_playlist-add_search">
              <input id="livesearch" class="it vl_it mus_playlist-add_livesearch">
              
              <span data-input="#livesearch" class="mus_playlist-add_placeholder">
                Search for music
              </span>
              
              <span class="mus_playlist-add_searchicon">
              </span>
              
            </div>
          </div>
        </div>
        <div class="mus_playlist-add_cnt">
          <div class="mus_playlist-add_tracks" style="height: 425px;">
            <div class="mus_playlist-add_lst">
              <ul>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['query']->value, 'result');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['result']->value) {
?>
                <?php ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['artist'];
$_prefixVariable1 = ob_get_clean();
$_smarty_tpl->_assignInScope('artist', $_prefixVariable1);?>
                <?php ob_start();
echo $_smarty_tpl->tpl_vars['result']->value['title'];
$_prefixVariable2 = ob_get_clean();
$_smarty_tpl->_assignInScope('title', $_prefixVariable2);?>
                
                <li>
                  <div class="mus-tr_i __selectable soh-s">
                    <div class="mus-tr_hld">
                      <span class="mus-tr_play __play js-mus-tr_play" id="_pm_sec_<?php echo $_smarty_tpl->tpl_vars['result']->value['id'];?>
" data-quest='{"song":"<?php echo $_smarty_tpl->tpl_vars['this']->value->track_path($_smarty_tpl->tpl_vars['result']->value['path'],$_smarty_tpl->tpl_vars['result']->value['storage']);?>
","cover":"<?php echo $_smarty_tpl->tpl_vars['this']->value->cover_path($_smarty_tpl->tpl_vars['result']->value['cover'],$_smarty_tpl->tpl_vars['result']->value['storage']);?>
"}' title="Play">
                      </span>
                      <div class="mus-tr_cnt">
                        
                        <span class="mus-tr_artist">
                          <?php echo $_smarty_tpl->tpl_vars['artist']->value;?>

                        </span>
                        &nbsp;&#8211;&nbsp; 
                        <span class="mus-tr_song">
                          <?php echo $_smarty_tpl->tpl_vars['title']->value;?>

                        </span>
                        
                      </div>
                      <div class="mus-tr_right-controls foh-s">
                        
                        <span class="mus-tr_add">
                        </span>
                        
                      </div>
                    </div>
                  </div>
                </li>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
              </ul>
            </div>
          </div>
          <div class="mus_playlist-add_shadow m_hidden">
          </div>
        </div>
        
      </div>
      <div class="form-actions">
        
        <span class="vl_btn" id="gwt-uid">
          Create
        </span>
        
        <span class="vl_a-sw ml-15 curPointer" uid="closeIntoPPL">
          Cancel
        </span>
        
      </div>
      <div class="layer_close ic ic_close">
      </div>
    </div>
    
  </div>
</div>
<?php }
}
