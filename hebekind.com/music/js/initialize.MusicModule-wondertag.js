
var popup_music_is_constructed = false;
var popup_music_is_showed = false;

(function(jQuery) {


    jQuery.fn.MusicModule = function(options) {

        var $this = jQuery(this),
            nav_apple = navigator.userAgent.match(/(iPod|iPhone|iPad)/),
            p_left, p_top;

        // default settings
        var settings = jQuery.extend({
            music_path: '/music/',
            p_file: "/index.html",
            append_to: "body",
            open_method: 'default',
            w_modal: true,
            p_left: "100",
            p_top: "50",
            beforeOpen: function() {}
        }, options);



        // inject css
        jQuery('<link rel="stylesheet" type="text/css" href="' + settings.music_path + '/css/initialize.css?v=1.9">').prependTo(settings.append_to);
        var injectCss = {
            layer_overlay_init: 'position: fixed;top: 0;left: 0;right: 0;bottom:0;z-index: 100;height: 100%;width:100%;background: rgba(0, 0, 0, 0.62);',
            layer_overlay_icon: 'position: fixed;display: block;left: 0;right:0;bottom:0;margin:auto;top: 0;width: 99px;height: 99px;z-index: 3000;background: url(' + settings.music_path + '/css/images/wMusic-99.png) no-repeat;',

        };

        // construct html element "Music"
        var o_div = '<div open-mth="overlay" style="' + injectCss.layer_overlay_init + '"></div>',
            t_div = '<div open-mth="overlay" style="' + injectCss.layer_overlay_icon + '"></div>',
            on_mi = '<div id="wMusic_aria" data-m-container="true"></div>'; /// do not change the attribute


	var header_player = '<li class="header_mus_player"><div class="controls_btn"><div><span class="glyphicon glyphicon-backward __back"></span></div><div><span class="glyphicon glyphicon-play mini_player_play_pause __play"></span></div><div><span class="glyphicon glyphicon-forward __forward"></span></div></div><div class="header_play_scrubber"><div class="mini_player_song_info"><marqueeno id="mus_marquee" scrollamount="2" behavior="alternate" direction="left" width="70"><span class="mini_player_artist"></span><span>&nbsp;-&nbsp;</span><span class="mini_player_song"></span></marqueeno></div><div class="bg-head-pl-col"></div><div class="mini_player_loader_controls"><div class="mini_progressbar mus_player-slider_drag"></div><div class="mus_player-slider_tooltip mini_progressTooltip progressTooltip"></div><div class="mini_player_loaderClass mus_player-slider_fill"></div></div></div></li>';

	var __mobile_mus_ic = '<div style="display:none;" id="mmusic_top_header_ic"><A href="/mmusic/mytracks">\
	<svg style="width: 20px;height:20px;fill: #fff;" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 448 448" style="enable-background:new 0 0 448 448;" xml:space="preserve"><path xmlns="http://www.w3.org/2000/svg" d="M442.016,3.5c-3.744-3.04-8.672-4.096-13.472-3.136l-288,64C133.216,65.996,128,72.492,128,79.98V333.1  c-13.408-8.128-29.92-13.12-48-13.12c-44.096,0-80,28.704-80,64s35.904,64,80,64s80-28.704,80-64V188.812l256-56.896V269.1  c-13.408-8.128-29.92-13.12-48-13.12c-44.128,0-80,28.704-80,64s35.872,64,80,64s80-28.704,80-64v-304  C448,11.116,445.824,6.54,442.016,3.5z"/></svg></a></div>';
	
	var __create_music =  header_player+__mobile_mus_ic+'<div class="dropdown tag_hdr_reqtog tag_hdr_droptoggle" plpsbtn="1" id="desktop_music_ic"><A href="javascript:void(0);" music_layer="true">\
	<svg style="width: 20px;height: 20px;fill: #fff;" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 448 448" style="enable-background:new 0 0 448 448;" xml:space="preserve"><path xmlns="http://www.w3.org/2000/svg" d="M442.016,3.5c-3.744-3.04-8.672-4.096-13.472-3.136l-288,64C133.216,65.996,128,72.492,128,79.98V333.1  c-13.408-8.128-29.92-13.12-48-13.12c-44.096,0-80,28.704-80,64s35.904,64,80,64s80-28.704,80-64V188.812l256-56.896V269.1  c-13.408-8.128-29.92-13.12-48-13.12c-44.128,0-80,28.704-80,64s35.872,64,80,64s80-28.704,80-64v-304  C448,11.116,445.824,6.54,442.016,3.5z"/></svg></a></div>';
 
 

        p_left = (nav_apple ? 'auto' : settings.p_left);
        p_top = (nav_apple ? 'auto' : settings.p_top);
        $this.replaceWith(__create_music);
        jQuery('[music_layer_hidden="true"]').on('click', function() {

            call_music($this, 1);


        });

        jQuery('[music_layer="true"]').on('click', function() {
            var $this = jQuery(this);
            if (!popup_music_is_showed) {
                popup_music_is_showed = true;
                return call_music($this);
            } else {
                popup_music_is_showed = false;
                return jQuery.socplusMusic('hide');
            }

        });

        // call MusicWindow's JavaScript file
        function call_music(el, h) {

            if (popup_music_is_constructed == false) {

                settings.beforeOpen.call(this);

                if (settings.open_method !== 'default' && !h)
                    jQuery(o_div + t_div).appendTo(settings.append_to);

                opac = (settings.open_method === 'overlay' ? '0' : '1');

                jQuery(on_mi).appendTo(settings.append_to);
                jQuery.ajax({
                    url: settings.music_path + settings.p_file,
                    cache: false,
                    async: true,
                    success: function(data) {

                        var m_vis = 'visible';
                        var m_hdn = '';

                        if (h) {
                            m_vis = 'invisible';
                            m_hdn = '__hidden';
							mus_start_invisible = true;
                        }

                        jQuery('[data-m-container]')
                            .css({
                                'margin-left': p_left + 'px',
                                'margin-top': p_top + 'px',
                                'opacity': opac,
                                'display': 'block'
                            })
                            .html(jprintf(data, m_hdn, m_vis)).find(!settings.w_modal ? '.layer_ovr' : '').remove();
                        popup_music_is_constructed = window.location.pathname;
                        if (!h) jQuery('[plpsbtn]').addClass('__active');

                        // call MusicWindow's father :)
                        jQuery.ajax({
                            url: '/music/javascript/musicModule-wondertag.js?v=1',
                            cache: false,
                            async: true,
                            dataType: 'script',
                            success: function() {

                                setTimeout(function() {
                                    jQuery('[data-m-container]').show()

                                    if (h) {
                                        setTimeout(function() {

                                            jQuery.socplusMusic('hide');
                                        }, 2000)
                                    }
                                }, 500);
                            }
                        });

                    }

                });

            } else jQuery.socplusMusic('show');


        };

    };

}(jQuery));
if(typeof validateJson != 'function'){
   window.validateJson = function(str){
	   
    try {  
        var json = JSON.parse(str);

        if(typeof json.hasOwnProperty('status'))
            if(json.status === 'require_login')
                window.location.reload();


        return json;
    } catch (e) {
        if(!no_err) {
           

            //if(!dev_enabled) setTimeout(function(){window.location.reload()},500);
        } //' + lang.somethingWrong);
        return false;
    }
   };
}

if(typeof jprintf != 'function'){
   window.jprintf = function(format){
	   
    var arg = arguments;
    var i = 1;
    return format.replace(/%((%)|s)/g, function(m) {
        return m[2] || arg[i++]
    })
	   
   };
}
if(typeof createCookie != 'function'){
   window.createCookie = function(name, value, days){
	   
    if(!days) days = 100;
    if(days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        var expires = "; expires=" + date.toGMTString()
    } else var expires = "";
    document.cookie = name + "=" + value + expires + "; path=/"
	   
   };
}

if(typeof readCookie != 'function'){
   window.readCookie = function(name){
	   
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while(c.charAt(0) == ' ') c = c.substring(1, c.length);
        if(c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length)
    }
    return null
   };
}
if(typeof __j != 'function'){
   window.__j = function(a){
	   
    return $(a);
   };
} 
 
 /**
* author Remy Sharp
* url http://remysharp.com/tag/marquee
*/

(function ($) {
    $.fn.marquee = function (klass) {
        var newMarquee = [],
            last = this.length;

        // works out the left or right hand reset position, based on scroll
        // behavior, current direction and new direction
        function getReset(newDir, marqueeRedux, marqueeState) {
            var behavior = marqueeState.behavior, width = marqueeState.width, dir = marqueeState.dir;
            var r = 0;
            if (behavior == 'alternate') {
                r = newDir == 1 ? marqueeRedux[marqueeState.widthAxis] - (width*2) : width;
            } else if (behavior == 'slide') {
                if (newDir == -1) {
                    r = dir == -1 ? marqueeRedux[marqueeState.widthAxis] : width;
                } else {
                    r = dir == -1 ? marqueeRedux[marqueeState.widthAxis] - (width*2) : 0;
                }
            } else {
                r = newDir == -1 ? marqueeRedux[marqueeState.widthAxis] : 0;
            }
            return r;
        }

        // single "thread" animation
        function animateMarquee() {
            var i = newMarquee.length,
                marqueeRedux = null,
                $marqueeRedux = null,
                marqueeState = {},
                newMarqueeList = [],
                hitedge = false;
                
            while (i--) {
                marqueeRedux = newMarquee[i];
                $marqueeRedux = $(marqueeRedux);
                marqueeState = $marqueeRedux.data('marqueeState');
                
                if ($marqueeRedux.data('paused') !== true) {
                    // TODO read scrollamount, dir, behavior, loops and last from data
                    marqueeRedux[marqueeState.axis] += (marqueeState.scrollamount * marqueeState.dir);

                    // only true if it's hit the end
                    hitedge = marqueeState.dir == -1 ? marqueeRedux[marqueeState.axis] <= getReset(marqueeState.dir * -1, marqueeRedux, marqueeState) : marqueeRedux[marqueeState.axis] >= getReset(marqueeState.dir * -1, marqueeRedux, marqueeState);
                    
                    if ((marqueeState.behavior == 'scroll' && marqueeState.last == marqueeRedux[marqueeState.axis]) || (marqueeState.behavior == 'alternate' && hitedge && marqueeState.last != -1) || (marqueeState.behavior == 'slide' && hitedge && marqueeState.last != -1)) {                        
                        if (marqueeState.behavior == 'alternate') {
                            marqueeState.dir *= -1; // flip
                        }
                        marqueeState.last = -1;

                        $marqueeRedux.trigger('stop');

                        marqueeState.loops--;
                        if (marqueeState.loops === 0) {
                            if (marqueeState.behavior != 'slide') {
                                marqueeRedux[marqueeState.axis] = getReset(marqueeState.dir, marqueeRedux, marqueeState);
                            } else {
                                // corrects the position
                                marqueeRedux[marqueeState.axis] = getReset(marqueeState.dir * -1, marqueeRedux, marqueeState);
                            }

                            $marqueeRedux.trigger('end');
                        } else {
                            // keep this marquee going
                            newMarqueeList.push(marqueeRedux);
                            $marqueeRedux.trigger('start');
                            marqueeRedux[marqueeState.axis] = getReset(marqueeState.dir, marqueeRedux, marqueeState);
                        }
                    } else {
                        newMarqueeList.push(marqueeRedux);
                    }
                    marqueeState.last = marqueeRedux[marqueeState.axis];

                    // store updated state only if we ran an animation
                    $marqueeRedux.data('marqueeState', marqueeState);
                } else {
                    // even though it's paused, keep it in the list
                    newMarqueeList.push(marqueeRedux);                    
                }
            }

            newMarquee = newMarqueeList;
            
            if (newMarquee.length) {
                setTimeout(animateMarquee, 25);
            }            
        }
        
        // TODO consider whether using .html() in the wrapping process could lead to loosing predefined events...
        this.each(function (i) {
            var $marquee = $(this),
                width = $marquee.attr('width') || $marquee.width(),
                height = $marquee.attr('height') || $marquee.height(),
                $marqueeRedux = $marquee.after('<div ' + (klass ? 'class="' + klass + '" ' : '') + 'style="display: block-inline; width: ' + width + 'px; height: ' + height + 'px; overflow: hidden;"><div style="float: left; white-space: nowrap;">' + $marquee.html() + '</div></div>').next(),
                marqueeRedux = $marqueeRedux.get(0),
                hitedge = 0,
                direction = ($marquee.attr('direction') || 'left').toLowerCase(),
                marqueeState = {
                    dir : /down|right/.test(direction) ? -1 : 1,
                    axis : /left|right/.test(direction) ? 'scrollLeft' : 'scrollTop',
                    widthAxis : /left|right/.test(direction) ? 'scrollWidth' : 'scrollHeight',
                    last : -1,
                    loops : $marquee.attr('loop') || -1,
                    scrollamount : $marquee.attr('scrollamount') || this.scrollAmount || 2,
                    behavior : ($marquee.attr('behavior') || 'scroll').toLowerCase(),
                    width : /left|right/.test(direction) ? width : height
                };
            
            // corrects a bug in Firefox - the default loops for slide is -1
            if ($marquee.attr('loop') == -1 && marqueeState.behavior == 'slide') {
                marqueeState.loops = 1;
            }

            $marquee.remove();
            
            // add padding
            if (/left|right/.test(direction)) {
                $marqueeRedux.find('> div').css('padding', '0 ' + width + 'px');
            } else {
                $marqueeRedux.find('> div').css('padding', height + 'px 0');
            }
            
            // events
            $marqueeRedux.bind('stop', function () {
                $marqueeRedux.data('paused', true);
            }).bind('pause', function () {
                $marqueeRedux.data('paused', true);
            }).bind('start', function () {
                $marqueeRedux.data('paused', false);
            }).bind('unpause', function () {
                $marqueeRedux.data('paused', false);
            }).data('marqueeState', marqueeState); // finally: store the state
            
            // todo - rerender event allowing us to do an ajax hit and redraw the marquee

            newMarquee.push(marqueeRedux);

            marqueeRedux[marqueeState.axis] = getReset(marqueeState.dir, marqueeRedux, marqueeState);
            $marqueeRedux.trigger('start');
            
            // on the very last marquee, trigger the animation
            if (i+1 == last) {
                animateMarquee();
            }
        });            

        return $(newMarquee);
    };
}(jQuery));
 
 
 
		function marquee_stop(){
			
			$('#mus_marquee').parent().removeClass('__onact');
			document.getElementById("mus_marquee").outerHTML = document.getElementById("mus_marquee").outerHTML.replace("marquee","marqueeno");
		}
		function marquee_start(){
			document.getElementById("mus_marquee").outerHTML = document.getElementById("mus_marquee").outerHTML.replace("marqueeno","marquee");

			$('#mus_marquee').parent().addClass('__onact');
			
		}


