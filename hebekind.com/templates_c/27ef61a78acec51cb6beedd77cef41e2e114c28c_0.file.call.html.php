<?php
/* Smarty version 3.1.34-dev-7, created on 2022-01-19 23:12:35
  from '/home/u631248999/domains/hebekind.com/public_html/assets/vaneayoung/layout/messenger/calls/call.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_61e89ae3a1a587_53678723',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '27ef61a78acec51cb6beedd77cef41e2e114c28c' => 
    array (
      0 => '/home/u631248999/domains/hebekind.com/public_html/assets/vaneayoung/layout/messenger/calls/call.html',
      1 => 1642626282,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61e89ae3a1a587_53678723 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="vy_call_popup"><div class="vy_call_popup_design" id="vy_call_js_draggable"><div class="vy_calls_container"><?php ob_start();
echo dirname('__DIR__');
$_prefixVariable1=ob_get_clean();
$_smarty_tpl->_subTemplateRender($_prefixVariable1."/calls-header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?><div class="vy_calls_inf"><div class="vy_calls_user_details"><div class="vy_call_user_cover"><img src="<?php echo $_smarty_tpl->tpl_vars['user']->value['profile_photo'];?>
" border="0" /></div><div class="vy_calls_user_name"><?php echo $_smarty_tpl->tpl_vars['user']->value['name'];?>
</div></div><div class="vy_calls_status"><div id="vy_calling_status"><?php echo $_smarty_tpl->tpl_vars['this']->value->lang['Call_Connecting...'];?>
</div></div><div class="vy_calls_control_buttons"><!-- end call --><div id="vy_ms__decline_buttonevent" class="vy_calls_decline_button __endcall __callinitiator" title="End Call"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" width="612px" height="612px" viewBox="0 0 612 612" style="enable-background:new 0 0 612 612;" xml:space="preserve"><path d="M306,243.525c-40.8,0-79.05,7.65-117.3,17.85v79.05c0,10.199-5.1,17.85-15.3,22.949c-25.5,12.75-48.45,28.051-68.85,48.45    c-5.1,5.101-10.2,7.65-17.85,7.65c-7.65,0-12.75-2.55-17.85-7.65L5.1,348.075c-2.55-5.1-5.1-10.2-5.1-17.85    c0-7.65,2.55-12.75,7.65-17.851c76.5-73.95,183.6-119.85,298.35-119.85s221.85,45.9,298.35,119.85    c5.101,5.101,7.65,10.2,7.65,17.851c0,7.649-2.55,12.75-7.65,17.85l-63.75,63.75c-5.1,5.101-10.199,7.65-17.85,7.65    s-12.75-2.55-17.85-7.65c-20.4-17.85-43.351-35.7-68.851-48.45c-7.649-5.1-15.3-12.75-15.3-22.949v-79.05    C385.05,251.175,346.8,243.525,306,243.525z"/></svg></div><!-- close button --><div id="vy_ms__close_buttonevent" class="vy_calls_close_button vy_calls_control_button __close" title="Close Window"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512.001 512.001" style="enable-background:new 0 0 512.001 512.001;" xml:space="preserve"><path d="M284.286,256.002L506.143,34.144c7.811-7.811,7.811-20.475,0-28.285c-7.811-7.81-20.475-7.811-28.285,0L256,227.717    L34.143,5.859c-7.811-7.811-20.475-7.811-28.285,0c-7.81,7.811-7.811,20.475,0,28.285l221.857,221.857L5.858,477.859    c-7.811,7.811-7.811,20.475,0,28.285c3.905,3.905,9.024,5.857,14.143,5.857c5.119,0,10.237-1.952,14.143-5.857L256,284.287    l221.857,221.857c3.905,3.905,9.024,5.857,14.143,5.857s10.237-1.952,14.143-5.857c7.811-7.811,7.811-20.475,0-28.285    L284.286,256.002z"/></svg></div></div></div><div class="vy_ui_resizable_svg vy_minimized_notshow"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="16" height="16" viewBox="0 0 16 16"><path fill="#444444" d="M6.7 16l9.3-9.3v-1.4l-10.7 10.7z"/><path fill="#444444" d="M9.7 16l6.3-6.3v-1.4l-7.7 7.7z"/><path fill="#444444" d="M12.7 16l3.3-3.3v-1.4l-4.7 4.7z"/><path fill="#444444" d="M15.7 16l0.3-0.3v-1.4l-1.7 1.7z"/></svg></div><div class="vy_ms_wbrtc_mediaelement __none" id="vy_ms_wbrtc_mediaelement"><?php if ($_smarty_tpl->tpl_vars['media_type']->value == 'video') {?><video playsinline  autoplay id="vy-ms__recipient-video-element"></video><video playsinline  autoplay muted id="vy-ms__user-video-element"></video><?php } else { ?><audio autoplay id="vy-ms__recipient-audio-element"></audio><audio autoplay muted id="vy-ms__user-audio-element"></audio><?php }?></div></div></div></div><?php }
}
