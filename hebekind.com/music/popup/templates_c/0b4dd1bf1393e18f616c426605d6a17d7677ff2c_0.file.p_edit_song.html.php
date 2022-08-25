<?php
/* Smarty version 3.1.34-dev-7, created on 2020-04-10 01:31:47
  from 'E:\XAMPP\htdocs\music\template\popups\p_edit_song.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e8fb06312f2c6_96451763',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0b4dd1bf1393e18f616c426605d6a17d7677ff2c' => 
    array (
      0 => 'E:\\XAMPP\\htdocs\\music\\template\\popups\\p_edit_song.html',
      1 => 1499365825,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e8fb06312f2c6_96451763 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-------------------------- Edit song [ popup layer ] --------------------->



<div id="layer_popup">
  <div class="layer_ovr">
    </div>
    <div class="track_edit_layer_cnt mml_popup">
      <div class="portlet-i_h mb-25">
        Info about the song
      </div>
      <div class="form form__gl-1-2">
        <div class="form_i mb-5">
          <label>
            
            <span class="input-l">
              Artist
            </span>
            <div class="it_w">
              <input data-query="mus_artist" class="it vl_it tred" maxlength="256" type="text" value="<?php echo $_smarty_tpl->tpl_vars['s_artist']->value;?>
">
            </div>
          </label>
        </div>
        <div class="form_i mb-5">
          <label>
            
            <span class="input-l">
              Title
            </span>
            <div class="it_w">
              <input data-query="mus_title" class="it vl_it tred" maxlength="256" type="text" value="<?php echo $_smarty_tpl->tpl_vars['s_title']->value;?>
">
            </div>
          </label>
        </div>
        <div class="form_i mb-5">
          <label>
            
            <span class="input-l">
              Album
            </span>
            <div class="it_w">
              <input data-query="mus_album" class="it vl_it tred" maxlength="256" type="text" value="<?php echo $_smarty_tpl->tpl_vars['s_album']->value;?>
">
            </div>
          </label>
        </div>
	<?php if ($_smarty_tpl->tpl_vars['allow_change_cover']->value) {?>
        <div class="form_i mb-5">
          <label>
            
            <span class="input-l">
              Cover
            </span>
            <div class="it_w">
              <input id="cover_input" style="opacity:.5;cursor:not-allowed" disabled="true" data-query="mus_cover" class="it vl_it tred" maxlength="256" type="text" value="<?php echo $_smarty_tpl->tpl_vars['s_cover']->value;?>
">

	      <div class="song_editable_info" style="font-size: 11px;white-space: nowrap;margin-left: -23px;">
	      <input onclick="var el = document.getElementById('cover_input'); if(!this.che) { this.che=true; el.removeAttribute('disabled');el.removeAttribute('style');}else{ this.che=false; el.setAttribute('disabled','true');el.setAttribute('style','opacity:.5;cursor:not-allowed;');}" type="checkbox" style="vertical-align: bottom;height: 11px;cursor: pointer;">Please enter a valid cover URL for respective song</div>
	      
            </div>
          </label>
        </div>
<?php } else { ?>
<div style="text-align: center;color: #C1C0C0;font-size: 8pt;">* This song contains its original cover and can't be changed.</div>
<?php }?>
      </div>
      <div class="form-actions">
        <button class="vl_btn" data-track="<?php echo $_smarty_tpl->tpl_vars['s_id']->value;?>
" data-action="trackSaveChanges">
          Ready
        </button>
        <span class="vl_a-sw ml-15 curPointer">
          Cancel
        </span>
        
      </div>
      
      <span class="layer_close ic ic_close">
      </span>
      
    </div>
    
</div>

<?php }
}
