"use strict"

var hasTouchStartEvent = 'ontouchstart' in document.createElement( 'div' );
var up_href;
var mobmusic; // id for audio element
var js_mob_audio_tag_track; // audio element track src
var duration = 0; // Duration of audio clip

var pButton; // jquery play button

var not_play_next_rewind_button = 'stop';
var playhead;

// timeline width adjusted for playhead
var timelineWidth;

var timeline;

var desktop_host = '';
var music_pth = desktop_host+'/music/mp3Files/';

var current_track_index;
var tracks_db = [];
var default_url = window.location.href;
var global_max_player;
document.addEventListener("DOMContentLoaded", function(event) {
mobmusic = __j('#mobmusic')[0]; // id for audio element	
js_mob_audio_tag_track = __j('.mobmusic-track-source')[0];	


});

setInterval(function(){
	
	if( !(window.location.href.indexOf("mmusic") > -1) )
		__j('.vy-mobile-music-container').remove();
	
},3000);

// Boolean value so that audio position is updated only when the playhead is released
var onplayhead = false;
function getTrackCover(cvr){
	
return cvr;
	
}
function objHook(str)
{
	if (typeof str == 'undefined') return;
	else
	return validateJson(str.replace(/<!--/g, '')
		.replace(/-->/g, ''));
}

function timelineClickable(timeline){
	
	
	
		// makes timeline clickable
	//	timeline.addEventListener( hasTouchStartEvent ? "touchend" : "click", function(event) {
		__j('.track_timeline').on( hasTouchStartEvent ? "touchend" : "click", function(event) {
			moveplayhead(event);
		
			mobmusic.currentTime = duration * clickPercent(event);
	 
				__j('li.__paused.__selected').removeClass('__paused').addClass('__playing');
				__j('.glyphicon-play.glbminpl_btn_play_pause').addClass('playing');
				mobmusic.play();
			
		});
	
}

function playHeadDragable(playhead){
	
		//playhead.addEventListener( hasTouchStartEvent ? 'touchstart' : 'mousedown', mouseDown, false);
		__j('.track_playhead').on( hasTouchStartEvent ? 'touchstart' : 'mousedown', mouseDown);
		

	
}
function mmPlay(el,ev){
	
ev.preventDefault();
 
	var _this = __j(el),
		_track_info = _this.data('track-inf') ? _this.data('track-inf') : _this.data('mob-track');
 
 var is__outside = _this.data('track-inf') ? true : false;
 
		 if(is__outside){
	 
				_track_info.time = '';
				 
		}
 
 if(__j('ul.music_track_lst').length) {
	tracks_db = [];
 
	__j('ul.music_track_lst').children().each(function(){
		var $this = __j(this);
		
		
		
		tracks_db.push($this.find('.pButton'));
		 
	});
	 
 }
 
 		 if(is__outside && _track_info.id !=  js_mob_audio_tag_track.id){
	 
				 
				__j('.commentsWidgetTracks .track_timeline').remove();
				__j('.commentsWidgetTracks .m_portal_track_pause').removeClass('m_portal_track_pause');
		}	
		
		if(is__outside){
			__j('.m_portal_track_pause').removeClass('m_portal_track_pause');
			__j('.track_timeline').remove();
			_this.addClass('m_portal_track_pause');
		}
	// pause this track	
	if( _track_info.id ===  js_mob_audio_tag_track.id && _this.closest('li').hasClass('__playing')){
	// close recent playing track
	_this.closest('li').removeClass('__playing').addClass('__paused');
	 
		 mobmusic.pause();
		 __j(mobmusic).addClass('paused');
		if(is__outside){
			_this.removeClass('m_portal_track_pause');
		}
	} 
	
	// paused track, play next
	else if (_this.closest('li').hasClass('__paused'))
	{
		_this.closest('li').removeClass('__paused').addClass('__playing');
		 
		mobmusic.play();
		__j(mobmusic).removeClass('paused');
		
	} 
	// load another track
	else

		{
		__j('.music_track_i').removeClass('__playing __paused').closest('li').removeClass('__selected');
		__j('.__playing,.__paused').removeClass('__playing __paused');
		__j('.music_track_i').find('.track_timeline').remove();
		__j(mobmusic).removeClass('paused');
		__j('.glyphicon-play.glbminpl_btn_play_pause').addClass('playing');
		
		var track_timeline_markup = '<div class="track_timeline">\
				<div class="track_playhead"></div>\
				<div class="mobmus-seekbar"></div>\
				<div class="mobmus-buffbar"></div>\
					</div>'
		
		
		
		if(!_this.find('.track_timeline').length && !is__outside)
		_this.closest('li').append(track_timeline_markup);
		else
			_this.parent().append(track_timeline_markup);
        // remove pause, add play
         _this.closest('li').addClass('__playing __selected');
		 let song_storage = _track_info.file.includes('http') || _track_info.file.includes('https') ? _track_info.file : music_pth + _track_info.file;
		js_mob_audio_tag_track.src = song_storage;
		js_mob_audio_tag_track.id = _track_info.id;
		//__j('#mobmusic-track').removeAttr('src').attr({'id':_track_info.id,'src': music_pth + _track_info.file});	
		 __j(mobmusic).removeAttr('track-cover').attr('track-cover',getTrackCover(_track_info.cover));

		 var artist_name = decodeUrlEncode(_track_info.artist);
		 var track_title = decodeUrlEncode(_track_info.track_name);
		 var track_album = decodeUrlEncode(_track_info.album_name);
		 
		 
		 
		 if (not_play_next_rewind_button == 'stop') {
			 closeGlobalAudioPlayer(ev);
		 var $body = __j('body');
		 $body.find('#background_track_play').remove();
 
 
		 $body.append('<div id="background_track_play" class="global_bg_track_play fixed_always">\
		 <div id="global_min_player-max" class="global_min_player_maximized"></div>\
		 <div class="hookData _0 global_min_player_json_dt"><!--{"id":"'+_track_info.id+'","time":"'+_track_info.time+'","cover":"'+_track_info.cover+'","artist":"'+artist_name+'","track":"'+track_title+'","album":"'+track_album+'"}--></div>\
		 <div class="global_track_play_img"><div class="global_track_ovr_play"></div><div class="global_play_btn_track"></div><div class="global_min_player-covers"><div class="track_glob_play_cover" style="background-image:url('+getTrackCover(_track_info.cover)+')"></div><div class="global-min-player-placeholder mob-audio-placeholder"></div></div></div></div>');
		 
		 not_play_next_rewind_button = 'stop';
 
		 
		 
		if(is__outside){
		 
		 __j('#background_track_play').fadeIn();
		}
		 
		 
		 } else {   
		 
					// set the new track's title to global mini player
					__j('.glbminpl_song_txt').html(artist_name+' - '+track_title);
					__j('.glbminpl_album_name').html(track_album);
					__j('.glbminpl_cover').css('background-image','url('+getTrackCover(_track_info.cover)+')');
					__j('#glbminpl_track_time').html( _track_info.time );
					__j('#global_min_player_add_song').show().removeAttr('onclick').attr("onclick","addTrack('pm_sec_add_"+_track_info.id+"');");
					__j('#mus_global_song_added').remove();
			 
		 }
		 
		 current_track_index = _this.closest('li').index();
		   
		// Gets audio file duration
		mobmusic.addEventListener("canplaythrough", function(e) {
			
			duration = e.target.duration;
			
		}, false);		
/*mobmusic.addEventListener('loadedmetadata', function(e) {
    console.log(e.target.duration); //0
	duration = e.target.duration;
});*/
		 
		 // timeupdate event listener
		mobmusic.addEventListener("timeupdate", function(e){timeUpdate(e,_this);}, false);
		 
		pButton = _this[0];
		timeline = not_play_next_rewind_button != 'stop' ? __j('#global_min_player-max').find('.track_timeline')[0] : _this.closest('li').find('.track_timeline')[0]; // timeline 
		playhead = not_play_next_rewind_button != 'stop' ? __j('#global_min_player-max').find('.track_playhead')[0] : _this.closest('li').find('.track_playhead')[0];
		
		timelineWidth = timeline.offsetWidth - playhead.offsetWidth;
		
 
		
		
		timelineClickable(timeline);
			
 

		
		

		// makes playhead draggable
		playHeadDragable(playhead);


		window.addEventListener(hasTouchStartEvent ? 'touchend' : 'mouseup', mouseUp, false);
	
		mobmusic.load();
		mobmusic.play();
		

		// buffer

		var mobloop = function () {
	
			var buffered = mobmusic.buffered;

				if (buffered.length) {
					__j('.mobmus-buffbar').css('width', (100 * buffered.end(0) / duration) + '%');
					
				}

			setTimeout(mobloop, 100);
	
		}
		mobloop();

		
		
		
	}
}

function playedTime(seconds){

    var minutes = Math.floor(seconds / 60);
    var secs = Math.floor(seconds % 60);

    if (minutes < 10) {
        minutes = minutes;
    }

    if (secs < 10) {
        secs = '0' + secs;
    }

    return minutes +  ':' + secs;
}

// Synchronizes playhead position with current point in audio
function timeUpdate(e,a) {
	duration = e.target.duration;
    var playPercent = timelineWidth * (mobmusic.currentTime / duration);
	//alert(duration);
	
	var song_index = __j(a).closest('li').index();
	
    
    __j('.track_playhead').css('margin-left',playPercent + "px");
	__j('.mobmus-seekbar').css('width',playPercent + 'px');
	
	__j('.music_track_seek span').html(playedTime(mobmusic.currentTime));
	
	if (mobmusic.currentTime == duration && duration > 0 && a) {
         a.closest('li').removeClass('__playing'); 
		 playNextTrack(song_index);
    }
}

// returns click as decimal (.77) of the total timelineWidth
function clickPercent(event) {
	
    return ( (hasTouchStartEvent ? event.changedTouches[0].clientX : event.clientX) - getPosition(timeline)) / timelineWidth;

}

// getPosition
// Returns elements left position relative to top-left of viewport
function getPosition(el) {
    return el.getBoundingClientRect().left;
}

// mousemove EventListener
// Moves playhead as user drags
function moveplayhead(event) {



var w,q,f,k,n,r;



var playhead_jq = __j('.track_playhead');

    var newMargLeft = (hasTouchStartEvent ? event.changedTouches[0].clientX : event.clientX) - getPosition(timeline);

    if (newMargLeft >= 0 && newMargLeft <= timelineWidth) {
        playhead_jq.css('margin-left',newMargLeft + "px");
		__j('.mobmus-seekbar').css('width',newMargLeft + 'px');
    }
    if (newMargLeft < 0) {
        
		playhead_jq.css('margin-left',"0px");
		__j('.mobmus-seekbar').css('width','0px');
    }
    if (newMargLeft > timelineWidth) {
         
		playhead_jq.css('margin-left',timelineWidth + "px");
		__j('.mobmus-seekbar').css('width',timelineWidth + 'px');
    }
	
	if( __j('.music_track_seek span').text() == __j('.music_track_time').text()) return;
	
	
                        w = duration * (newMargLeft / timelineWidth);
                        q = Math.floor(w / 60);
                        w = Math.floor(w % 60);

                        if (q >= 60) {
                            f = Math.floor(q / 60);
                            k = q % 60;
                            n = (k < 10 ? "0" : "");
                            k = n + k;
                            q = f + ':' + k;
                        }
						q = q < 0 ? 0 : q;
						w = w < 0 ? 0 : w;


                        r = (q < 10 ? "" : "") + q + ":" + (w < 10 ? "0" : "") + w;
						
						
						
						__j('.music_track_seek span').html(r);
	
}


// mouseDown EventListener
function mouseDown() {
    onplayhead = true;
	mobmusic.removeEventListener('timeupdate', function(e){timeUpdate(e)}, false);
    window.addEventListener(hasTouchStartEvent ? 'touchmove' : 'mousemove', moveplayhead, true);


}

// mouseUp EventListener
// getting input from all mouse clicks
function mouseUp(event) {
    if (onplayhead == true) {
        moveplayhead(event);
        window.removeEventListener(hasTouchStartEvent ? 'touchmove' : 'mousemove', moveplayhead, true);
        // change current time
        mobmusic.currentTime = duration * clickPercent(event);
        mobmusic.addEventListener('timeupdate', function(e){timeUpdate(e)}, false);
		
	__j('li.__paused.__selected').removeClass('__paused').addClass('__playing');
	 __j('.glyphicon-play.glbminpl_btn_play_pause').addClass('playing');
	mobmusic.play();
		
		
    }
    onplayhead = false;
}
function deleteCollection(){
	
	var col_id = __j('#upload_track_in_collection').data('collid');
	
	var send = jAjax('/mmusic.php', 'post', {'cmd':'delete-collection','id':col_id});
	send.done(function(d){
		
		if(d == 1)
			__j('#mus_header_mycol').trigger('click');
		else
			mus_ajax_err('Error! Your playlist was not deleted, please retry.');
	});
	
}
function collectionSet(el,ev){
	ev.stopPropagation();
	__j('.music_track_menu').remove();
	var mobmus_col_actionmenu = '<div class="music_track_menu __open" role="menu">\
								 <a onclick="deleteCollection();" class="fi fi-trsh menu-link" style="text-decoration:none;">\
								 <span class="mob-trash-20"></span><span class="ic_tx">Delete</span></a></div>';
								 
								 
	el = __j(el);
	
	if(	!el.closest('li').find('.music_track_menu').length )
		el.closest('li').append(mobmus_col_actionmenu);
	else el.closest('li').find('.music_track_menu').remove();
		
}
function deleteTrack(id,p){
 
	id = id.match(/\d/g).join("");
	
	 
	 
	var a_d = p ? 'p' : 'm';
	var b = p ? p : 0;
 
	var send = jAjax('/mmusic.php', 'post', {'cmd':'deletesong','d':a_d,'b':b,'track':id});
	
	send.done(function(d){ 
		
			if(d == 1){
				
				__j('#track_'+id).slideUp(function(){__j(this).remove()});
				
			} else {
				
				mus_ajax_err('An error occured at delete track');
			}
		
	});
	
	
}
function addTrack(id,p,el){
	
	id = id.match(/\d/g).join("");
	
	 
	 
	var b = p ? 'p' : 'm';//!__j('#mus_collection_page').length ? 'm' : 'p';
	var c = p ? p : 0;
	var send = jAjax('/mmusic.php', 'post', {'cmd':'addsong','c':c,'b':b,'track':id});
	
	send.done(function(d){  
		 
			if(b == 'm' && d > 0){
				__j('#mus_header_my_tracks_count').text(d);
				__j('#track_'+id).addClass('added');
				__j('#global_min_player_add_song').hide().after('<span id="mus_global_song_added" class="ic_song_added"></span>');
				__j(el).addClass('ic_added_w __disabled');
			} else {
				 
				mus_ajax_err('An error occured at adding track to your collection.');
			}
		
	});
	
	
}
function mus_ajax_err(str){
	
	
	alert(str);
}
function trackSet(el,ev){
	
	ev.stopPropagation();
	el = __j(el);
	
	var is_collection = __j('.music_album_name').length ? 1 : 0;
	var is_owner_collection = __j('#is_owner').length ? 1 : 0;
	var ext_track = el.data('track-ap'),
	    track_id = ext_track.id,
		track_artist = decodeUrlEncode(ext_track.artist),
		track_title  = decodeUrlEncode(ext_track.track_title);
	var collection_id = __j('#mus_collection_page').attr('data-collid');
	
	__j('.music_track_menu').remove();
	var mobmus_track_actionmenu =  	is_owner_collection ? '<div class="music_track_menu track __open" role="menu">\
										 <a '+ (is_collection ? 'style="display:none;"' : '') +' class="ic ic-pls menu-link" data-func="menuAdd" role="menuitem"><span class="ic_tx">Add to collection</span></a>\
										 <a style="display:none;" ontouchend="as_status(this,event, \''+escape(track_id)+'\', \''+escape(track_artist)+'\', \''+escape(track_title)+'\');" class="ic ic-horn menu-link" data-func="toStatus" role="menuitem"><span class="ic_tx">Post as status</span></a>\
										 <a class="ic ic-del menu-link" onclick="deleteTrack(\''+escape(track_id)+'\', '+(is_collection ? collection_id : false)+');" data-func="remove" role="menuitem"><span class="ic_tx">Delete</span></a>\
										 </div>' 
										 
										 : 
										 
										 '<div class="music_track_menu track __open" role="menu">\
										 <a class="ic ic-pls menu-link" onclick="addTrack(\''+escape(track_id)+'\');" data-func="menuAdd" role="menuitem"><span class="ic_tx">Add to my music</span></a>\
										 </div>';
	
	
	if(	!el.closest('li').find('.music_track_aux:not(button) .music_track_menu').length )
		el.closest('li').find('.music_track_aux:not(button)').prepend(mobmus_track_actionmenu);
	else 
		el.closest('li').find('.music_track_menu').remove();
		
}
// post as status
function as_status(el,ev, id, artist, song) {
	ev.stopPropagation();
var mobmus_col_actionmenu_done = '<div class="music_track_menu track __done __open" role="menu">\
								 <a class="fi fi-trsh menu-link" style="text-decoration:none;">\
								 <span class="mob-done-16"></span><span class="ic_tx">In the status</span></a></div>';
    id = id.split('_');
    id = id[id.length - 1];
    var send = jAjax('/profile', 'post', 'q=' + escape(artist + ' - ' + song) + '&cmd=pStatus&i=' + escape(id) + '&type=pos&view_as=json');
     ajaxLoading();

    send.done(function(r) {
        var res = validateJson(r);
       // curr_playing_song = id;
         removeAjaxLoad();

        if (res && res['response'] != 'OK') {
            return displayErr(res['response']);
        } else {
           __j(el).closest('.music_track_menu').replaceWith(mobmus_col_actionmenu_done);//addClass('__done');
         
            setTimeout(function() {
				__j('.music_track_menu.track.__done').remove();
            }, 3000);
        }


    });

}

function addCollection (evt,el,id){
	var collection_details = __j(el).data('collection');
	var send = jAjax('/mmusic.php', 'post', {'cmd':'add-foreign-collection','b':id,'l':id,'i':collection_details.cover,'n':collection_details.collection_name});
	send.done(function(d){
		
		
		//alert(d);
	});
}
 

function uploadTracks(evt,el){
	
	evt.preventDefault();
	
	
	var t_files = el.files; 
	var count = 0;
	var totalFiles = t_files.length;
	
 

        for(var i = 0; i < totalFiles;i++){
			var upload_track_markup = '<li class="track_upload" id="track-upload-'+i+'"><div class="track-upload-progr ellip">'+t_files[i].name+'</div><div class="track-progress-bar"></div></li>';
	
			__j('#mus-upload-bar>ul').prepend(upload_track_markup);
		} 
    
 var uploadTracksN = function(c){
	
	var is_playlist = __j('body').find('#upload_track_in_collection');
	var uploadin = is_playlist.length ? is_playlist.data('collid') : 'mymusic';
 
	
	var formData = new FormData();
	formData.append('files[]', t_files[c]);
	formData.append('cmd','upload-tracks');
	formData.append('uploadin',uploadin);
	 
    $.ajax({
        url: "/mmusic.php", //Server script to process data
        type: 'POST',
			xhr: function ()
			{ // Custom XMLHttpRequest
				var Xhr = $.ajaxSettings.xhr();
				if (Xhr.upload)
				{ // Check if upload property exists
					Xhr.upload.addEventListener('progress', function (e)
					{
						var t_id = __j('#track-upload-' + c);
						var p_percentage = Math.round((e.loaded / e.total) * 100);
						t_id.find('.track-progress-bar').css('width', p_percentage + '%');
						
						//mainUploadProgressHandling(e, count, totalFiles)
					}, false); // For handling the progress of the upload
				}
				return Xhr;
			},
        //Ajax events
        beforeSend: function() { 
		
		//__j('#mus-upload-bar>ul').prepend(upload_track_markup);
		
		
		
		},
        success: function(d) { 
		
			c++;
			
			if( c < totalFiles)
			uploadTracksN(c);
			else {
			setTimeout(function(){
				if(uploadin != 'mymusic'){   
				
			__j('.music_album_lst').before('<a style="display:none;" id="go_to_pl" href="/mmusic/collection/'+uploadin+'?v='+ new Date().getTime()+'" hrefattr="true"></a>');
			up_href();
			__j('#go_to_pl').trigger("click");
				 
				}else { __j('#go_to_my_music').trigger('click');}
			},1200);
			//kn_liveNotif(lang.upload_complete,'done',4000,lang.your_tracks_was_uploaded);
		}
		},
        error: function(e) {alert('an error occured while uploading your tracks, please contact administrator or retry.');},
        // Form data
        data: formData,
        //Options to tell jQuery not to process data or worry about content-type.
        cache: false,
        contentType: false,
        processData: false
    });
	
 }
   
 uploadTracksN(count);
	
}
function playMusicInBackground(){
	
	if(!__j('.music_content').length){
		
		
		var $body = __j('body');
		
		
		__j('.global_bg_track_play').addClass('visible');
		
		
	} else {
		__j('.global_bg_track_play').removeClass('visible');
		
	}
	
	
}

	// open mini player
__j(document).off(hasTouchStartEvent ? 'touchend.openGlobalMiniPlayer' : 'click.openGlobalMiniPlayer').on(hasTouchStartEvent ? 'touchend.openGlobalMiniPlayer' :'click.openGlobalMiniPlayer', '#background_track_play', function(e){
	 
	e.preventDefault();
	e.stopImmediatePropagation();
	var $this = __j(this);
    var opened_min_playe_url = default_url+'/audio-mini-player';
 
	 if(global_max_player == 'active') return;
	 	default_url = window.location.href;
		createUrl('', '', default_url+'/audio-mini-player'); 
	
	
		is_mobile_popup = true;
		// close global player by back button
		__j(window).on('popstate.closeMobilePopup',function(e){
 
				e.preventDefault();
				e.stopImmediatePropagation();
				__j(window).off('popstate.globalAjax');
				return closeGlobalAudioPlayer(e);
				
		});
 
	
	if($this.find('#global_min_player-max').hasClass('hidden'))
	{
		 global_max_player = 'active';
		__j('#global_min_player-max').removeClass('hidden');
		__j('#background_track_play').addClass('open');
		__j('body').addClass('noscroll');
		return;
	}
	
	
	
	
	
	
	var _track_info = objHook( __j('.global_min_player_json_dt').html() );
			 var artist_name = decodeUrlEncode(_track_info.artist);
		 var track_title = decodeUrlEncode(_track_info.track);
		 var track_album = decodeUrlEncode(_track_info.album);
		 var track_id = js_mob_audio_tag_track.id;
	 var track_cover = _track_info.cover;
	if(!$this.hasClass('open')){
		    global_max_player = 'active';
		
		__j('body').addClass('noscroll');
		$this.addClass('open');
		$this.find('#global_min_player-max').html('<div class="glbminpl_center">\
		<div class="glyphicon glyphicon-remove glbminpl_hide"></div>\
		<div class="glbminpl_cover" style="background-image:url('+getTrackCover(track_cover)+');"></div>\
		<div class="global-min-player-placeholder glbminpl_cover_max mob-audio-placeholder"></div>\
		<div class="global-audio-player-footer"><div class="glbminpl_song_txt">'+artist_name+'&nbsp;-&nbsp;'+track_title+'</div>\
		<div class="glbminpl_album_name">'+track_album+'</div>\
			<div class="glbminpl_timeline"><div class="track_timeline glbmnpl">\
				<div class="track_playhead glbmnpl"></div>\
				<div class="mobmus-seekbar glbmnpl"></div>\
				<div class="mobmus-buffbar glbmnpl"></div>\
					</div><div class="music_track_time"><span class="music_track_seek"><span>00:00</span></span>&nbsp;/&nbsp;<span id="glbminpl_track_time">'+_track_info.time+'</span></div></div>\
		<div class="glbminpl_btns">\
		<div class="glyphicon glyphicon-backward glbminpl_btn_back"></div>\
		<div class="glyphicon glyphicon-play glbminpl_btn_play_pause '+ (__j(mobmusic).hasClass('paused') ? '' : 'playing') +'"></div>\
		<div class="glyphicon glyphicon-forward glbminpl_btn_next"></div>\
		</div>\
		<div class="glbminpl_add_col"><a class="ic ic-pls menu-link" id="global_min_player_add_song" data-func="menuAdd" onclick="addTrack(\'pm_sec_track_'+track_id+'\');" role="menuitem">&nbsp;</a></div>\
		</div></div>');
		timeline = __j('#global_min_player-max').find('.track_timeline')[0]; // timeline 
		playhead = __j('#global_min_player-max').find('.track_playhead')[0];
 		 /*
		if(!_this.find('.track_timeline').length)
		_this.closest('li').append('<div class="track_timeline">\
				<div class="track_playhead"></div>\
				<div class="mobmus-seekbar"></div>\
				<div class="mobmus-buffbar"></div>\
					</div>');
					
					*/
					
		setTimeout(function(){
			 
			var m_play_btn = __j('.glbminpl_btn_play_pause'),
				m_back_btn = __j('.glbminpl_btn_back'),
				m_next_btn = __j('.glbminpl_btn_next');
			
			m_play_btn.on(hasTouchStartEvent ? 'touchend' : 'click', function(e){
				
				if(__j(this).hasClass('playing')){
				mobmusic.pause();	
				__j(this).removeClass('playing');
				__j('.m_portal_track_pause').removeClass('m_portal_track_pause');
			}else{
				__j(this).addClass('playing');
				mobmusic.play();
			}
			});
			
			m_back_btn.on(hasTouchStartEvent ? 'touchend' : 'click', function(e){
				e.stopPropagation();
				prevTrack(this);
				
			});
			m_next_btn.on(hasTouchStartEvent ? 'touchend' : 'click', function(e){ 
				e.stopPropagation();
				nextTrack(this);
				
			});
			
			
		},100);
		

		
		timelineClickable(__j('.track_timeline')[0]);
			
 

		
		

		// makes playhead draggable
		playHeadDragable(__j('.track_playhead')[0]);
	} 
	
	
});

function prevTrack(btn){
	
	
	btn = __j(btn) || false;


	if(current_track_index <= 0){
		if(btn) btn.addClass('disabled');
		
		return;
	}
	
	__j('.glbminpl_btn_next').removeClass('disabled');
	if(!__j('.music_content').length) not_play_next_rewind_button = (current_track_index-1);
	__j(tracks_db[current_track_index-1]).trigger('click');
 
}
function nextTrack(btn){
	btn = __j(btn) || false; 

	if((current_track_index+1) >= Object.keys(tracks_db).length){
		if(btn) btn.addClass('disabled');
		return;
	}
	
	__j('.glbminpl_btn_back').removeClass('disabled');
	if(!__j('.music_content').length) not_play_next_rewind_button = (current_track_index+1);
	__j(tracks_db[current_track_index+1]).trigger('click');
	

	
}

function playNextTrack(cur_song_index){
	
	
	nextTrack();
	//not_play_next_rewind_button = (current_track_index+1);
	//__j(tracks_db[current_track_index+1]).trigger('click');
	
	//mobmusic.load();
	//mobmusic.play();
	
}


//create playlists
function doNewCollection(form, ev, update){
	ev.preventDefault();
	
	var redBord = function (el, color)
	{
		!color ? el.css('border', '1px solid red')
			.focus() : el.css('color', 'red');
		removeAjaxLoad();
	}
	var r_redBord = function (el)
	{
		el.removeAttr('style');
	};
	ajaxLoading();
	var sendForm = js_subForm(form);
	sendForm.done(function (data)
	{  
		var d = validateJson(data);
		removeAjaxLoad();
		
		r_redBord(__j('#mus_colNam'));
		
	   if ( d['a'] == 'empty')
		{
			redBord(__j('#mus_colNam'), 0);
			return;
		} else if (d['a'] == 'error'){
			
			alert('An error occured at creating the playlist, please retry.');
			return;
		} else {
  
			__j('#mus_colNam').before('<a style="display:none;" id="go_to_new_pl" href="/mmusic/collection/'+d.id+'" hrefattr="true"></a>');
			up_href();
			__j('#go_to_new_pl').trigger("click");
			
		}
		
		
		
		
	});
	
}
function faddTrackToMyCollection(t, e)
{
	
	var track_id = __j(t).closest('.track').find('.js-track_play').attr('id').split('_')[1];
		addTrack('pm_sec_track_'+track_id,false,t);
}
function nobilMusicPlayOutsideTrack(el, evt, a)
{
	if (evt) evt.preventDefault();

	 
	
	
	
	
	
}

function nobilMusicSearch(k){
	
	
	var search_in_music = __j('<a href="/mmusic/search/'+k+'/tk/1533594571044" hrefattr="true"></a>');
	
	__j('body').prepend(search_in_music);
	search_in_music.trigger('click');
	search_in_music.remove();	
	
}
var mus_search_tracks_timeout;

// search tracks
__j(document).off('keyup.searchMusTracks').on('keyup.searchMusTracks', '#musicSearchField', function(e){
	clearTimeout(mus_search_tracks_timeout);
	var mus_cancel_search = __j('#mus_search_clear');

	var $this = __j(this);
	
	if( $.trim($this.val()) )
	mus_search_tracks_timeout = setTimeout(function(){
		
		mus_cancel_search.show().parent().addClass('ui_search_loading');
		__j('#mus-search-a').removeAttr('href').attr('href','/mmusic/search/'+$this.val()+'/tk/'+ new Date().getTime()).trigger('click');
 
	},900);
	else{
		
		
		mus_cancel_search.hide().parent().removeClass('ui_search_loading');
		
	}
});
__j(document).off('keydown.searchMusTracks keypress.searchMusTracks').on('keydown.searchMusTracks keypress.searchMusTracks', '#musicSearchField', function(e){
	
	
	clearTimeout(mus_search_tracks_timeout);
	
});

function closeGlobalAudioPlayer(e){
			e.preventDefault();
			e.stopPropagation();
			
			
			is_mobile_popup = false;
			global_max_player = false;
			__j('#background_track_play').slideDown(500,function(){
			__j('#global_min_player-max').addClass('hidden');
			__j('#background_track_play').removeClass('open');
			__j('body').removeClass('noscroll');
			createUrl('', '', default_url);
			});
			

}

// hide mini player
__j(document).off(hasTouchStartEvent ? 'touchend.hideGlobalMiniPlayer' : 'click.hideGlobalMiniPlayer').on(hasTouchStartEvent ? 'touchend.hideGlobalMiniPlayer' : 'click.hideGlobalMiniPlayer', '.glbminpl_hide', function(e){

closeGlobalAudioPlayer(e);
			 
});

// close menu by click on body
__j(document).on('click.mobmuscloseactmenu', 'body', function(e){//.off(hasTouchStartEvent ? 'touchend.mobmuscloseactmenu' : 'click.mobmuscloseactmenu').on(hasTouchStartEvent ? 'touchend.mobmuscloseactmenu' : 'click.mobmuscloseactmenu', 'body', function(e){
	__j('.music_track_menu').remove();
});

// play on track data -> play track
__j(document).off('click.play-audio').on('click.play-audio', '.music_track_data', function(e){ 
	e.preventDefault();
	e.stopImmediatePropagation();
	__j(this).closest('.music_track_i').find('.pButton').trigger('click');
});
if(typeof decodeUrlEncode != 'function'){
window.decodeUrlEncode = function (string){
	string = decodeURIComponent(string);
return string.replace(/\+/g, ' ');


}}
if(typeof urlencode != 'function'){
window.urlencode = function(str) {
  str = (str + '').toString();

  // Tilde should be allowed unescaped in future versions of PHP (as reflected below), but if you want to reflect current
  // PHP behavior, you would need to add ".replace(/~/g, '%7E');" to the following.
  return encodeURIComponent(str)
    .replace(/!/g, '%21')
    .replace(/'/g, '%27')
    .replace(/\(/g, '%28')
    .replace(/\)/g, '%29')
    .replace(/\*/g, '%2A')
    .replace(/%20/g, '+');
}
}


if(typeof js_subForm != 'function'){
window.js_subForm = function(f)
{
	var hform = $(f);
	var s = $.ajax(
	{
		url: hform.attr('action'),
		type: hform.attr('method'),
		data: hform.serialize()
	});
	s.fail(function (a, b)
	{
		return displayErr(b.status);
	});
	return s;
}
}
 if(typeof createUrl != 'function'){
window.createUrl = function(state, title, url) {
    history.pushState(state, title, url)
}
}
var hasClbk, activeEl,_g_scrollTop,is_anchor,is_mobile_popup;

var mus_globalAjax = new(function() {

    function colorateContent(target) {

        var themeIcChanger = '<div id="hook_Block_ThemesControlRB" class="hookBlock">' +
            '<div class="covers_control_anim">' +
            '<a href="/themes?nav=themes" class="covers_control_cnt_w al" hrefattr="true">' +
            '<div class="covers_control_ic"></div><div class="covers_control_cnt">' + lang.change_theme + '</div></a>' +
            '</div></div>';
        var t = document.getElementById(target),
            $t = $(t);
        if (location.pathname.substring(1) === 'themes')
            t.classList.add('covers-front');
        else
            t.classList.remove('covers-front');


        if ($t.find('#hook_Block_ThemesControlRB').length == 0 && window.location.pathname.substring(1) !== 'themes') {
            $t.prepend(themeIcChanger);
            up_href();
        }
    }

    // get profile theme
    function getTheme(){

    //if(stop_theme_ch) return false;

    var th_header_image = $('#th_v_bod'), th_body_col = $('#st_left_right_theme');
       /// th_header_image.removeAttr('src');
      ///  th_body_col.html('');
    var sd = jAjax('/profile', 'post', 'cmd=gTheme&view_as=json&type=pos');
    sd.done(function(data){
    
    if(data !== '0' && data !== '' && typeof data == 'string'){
    var dj = validateJson(data);

if(theme_last_uid !== dj.uid) {
th_header_image.attr('src',dj.header_photo);

th_body_col.replaceWith('<style id="st_left_right_theme">.cover_t_c_repeat_l, .cover_t_c_repeat_r {   background-image: url('+dj.body+'?v='+Math.random()+');}body {    background-image: url('+dj.body+'?v='+Math.random()+');}</style>');
theme_last_uid = dj.uid;

}

    } else if(data === '0'){
th_header_image.removeAttr('src');
th_body_col.html('');
    }


    });

    }

    function highlightPages() {


        // add active class to the active element
     /*   __j('.mctc_navMenu,.lf_men').filter('.__active').removeClass('__active');
        var nav = typeof window.location.href.split('nav=')[1] != 'undefined' ? window.location.href.split('nav=')[1].split('&')[0] : '';
        if (nav){
			var active_a = $('.mctc_navMenu a[data-navact="' + nav + '"],.lf_men._'+nav);
            active_a.addClass('__active').parent().addClass('__active');
	    if(active_a.closest('ul').hasClass('mctc_navMenuDDL'))
		__j('#mctc_navMenuDropdownSec_otherSections > .mctc_navMenuDropdownSecLabel').addClass('__active');
       } else if (!nav && window.location.href === _st.host + '/' || window.location.pathname === '/profile')
            __j('.mctc_navMenu a:first').addClass('__active').parent().addClass('__active');

		if(!nav && window.location.href === _st.host+'/') __j('._feed').addClass('__active');
        ///else $('.mctc_navMenu a:first').addClass('__active');
*/
    }

    function g_closeReq() {
        oLoadingBox.parentNode && document.body.removeChild(oLoadingBox);
        bIsLoading = false;
        // highlightPages();
    }

    function g_abortReq() {
        if (!bIsLoading) {
            return;
        }
        oReq.abort();
        g_closeReq();
    }

    function g_ajaxError() {
        alert("Unknown error.");
    }

    function g_ajaxLoad() {
        var vMsg, nStatus = this.status;
        switch (nStatus) {
            case 200:
			 

			vMsg = JSON.parse(this.responseText);

                var pageTitle = oPageInfo.title != '' ? oPageInfo.title + (vMsg.page != '' ? ' - ' + vMsg.page : '') : '';
				var w_html = __j('html'), w_body = __j('body');
                document.title = pageTitle != '' ? pageTitle : document.title; //oPageInfo.title = vMsg.page;
				
                if(!escape_filter_box) 
					document.getElementById(sTargetId).innerHTML = vMsg.content;
				else 
					document.getElementById('search_ajax_new_results').innerHTML = vMsg.content;
				
                if (bUpdateURL) {
                    if (bUpdateURL != 255) history.pushState(oPageInfo, pageTitle, oPageInfo.url);
                    bUpdateURL = false;
                    g_init();
                }
				if(w_html.find('#index_wall_n').length) {
					
					    w_html.find('#mainContent').addClass('__wall'); 
						//w_html.scrollTop(__j('.feed-top-nav').offset().top-__j('.toolbar').height());
						__j(window).scrollTop(__j('#main_ff_share').outerHeight());
		}else {
		w_html.find('#mainContent').removeClass('__wall');
		__j(window).scrollTop(0);
		}
                //w_html.find('[rel="flocv"]').replaceWith('<script rel="flocv" type="text/javascript" src="'+_THEME+'/js/_system.js"></script>');

				 
				// close popups
				//__j('.pviewer_close_btn').trigger('click');
				//__j('.POPUP_PHOTO_VIEWER').remove();
				
 
				
				w_html.find('#mainContent').css('left','');
				// empty shortcut menu
                __j('.hook_Block_ShortcutMenu').empty();

		// profile theme
		//getTheme();
	
				// remove bugged tipsy
				__j('.tipsy').remove();
				
			
			

                // callback
                runCallback();
				
				if(_g_scrollTop) __j(window).scrollTop(_g_scrollTop); 

                //colorateContent(sTargetId);
				_isWall = false;
				escape_filter_box = false;
				_g_scrollTop = false;
                break;
            default:
                vMsg = nStatus + ": " + (oHTTPStatus[nStatus] || "Unknown");
                switch (Math.floor(nStatus / 100)) {
                    /*
                    case 1:
                        // Informational 1xx
                        console.log("Information code " + vMsg);
                        break;
                    case 2:
                        // Successful 2xx
                        console.log("Successful code " + vMsg);
                        break;
                    case 3:
                        // Redirection 3xx
                        console.log("Redirection code " + vMsg);
                        break;
                    */
                    case 4:
                        /* Client Error 4xx */
                        alert("Client Error #" + vMsg);
                        break;
                    case 5:
                        /* Server Error 5xx */
                        alert("Server Error #" + vMsg);
                        break;
                    default:
                        /* Unknown status */
                        g_ajaxError();
                }
        }
        g_closeReq();
    }

    function g_filterURL(sURL, sViewMode) {

        return sURL.replace(rSearch, "") + ("?" + sURL.replace(rHost, "&").replace(rView, sViewMode ? "&" + sViewKey + "=" + sViewMode : "").slice(1)).replace(rEndQstMark, "");
    }
    function flURL(url, param, value) {
        var a = document.createElement('a'),
            regex = /[?&]([^=]+)=([^&]*)/g;
        var match, str = [];
        a.href = url;
        value = value || "";
        while (match = regex.exec(a.search))
            if (encodeURIComponent(param) != match[1]) str.push(match[1] + "=" + match[2]);
        str.push(encodeURIComponent(param) + "=" + encodeURIComponent(value));
        a.search = (a.search.substring(0, 1) == "?" ? "" : "?") + str.join("&");
        return a.href.replace(' ','');
    }
    function gXMLobject() {
        oReq = false;
        if (window.XMLHttpRequest) {
            try {
                oReq = new XMLHttpRequest()
            } catch (e) {
                oReq = false
            }
        } else {
            if (window.ActiveXObject) {
                try {
                    oReq = new ActiveXObject("Msxml2.XMLHTTP")
                } catch (e) {
                    try {
                        oReq = new ActiveXObject("Microsoft.XMLHTTP")
                    } catch (e) {
                        oReq = false
                    }
                }
            }
        }
        return oReq;
    }
    function g_getPage(sPage) {
        if (bIsLoading || is_anchor) {
            return;
        }
		
		/*
		// show loading 
		if(!escape_filter_box) {
					document.getElementById(sTargetId).innerHTML = '<div class="global-page-loading"><div class="div-loader-global-page"></div></div>';
				hideLeftMenu();
				closeSearchSugg();
				
		}
		 
				*/
				
        //oReq = new XMLHttpRequest();
	oReq = gXMLobject();
        bIsLoading = true;
        oReq.onload = g_ajaxLoad;
        oReq.onerror = g_ajaxError;
        if (sPage) {
            oPageInfo.url = sPage;//g_filterURL(sPage, null);
        }
       oReq.open("get", g_filterURL(oPageInfo.url, "json") + "&global-ajax&ajax=1&token=" + (new Date()).getTime(), true);


		oReq.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");

        oReq.send();
        oLoadingBox.parentNode || document.body.appendChild(oLoadingBox);
		

		
    }

    function g_requestPage(sURL) {
        if (history.pushState) {
            bUpdateURL = true;
            g_getPage(sURL);
        } else {
            /* Ajax navigation is not supported */
            location.assign(sURL);
        }
    }

    function hasCallback(l) {
        hasClbk = l.getAttribute('data-clbk');
    }

    function runCallback() {
        if (hasClbk) {  
            window[hasClbk](arguments);
            hasClbk = false;
        }
    }

    function g_processLink(element) {
		
				  __j('.unv_mob_popup').each(function(){
					  
					  var mob_popup_id = __j(this).attr('rel');
					  __j('.mhb_back[rel="'+mob_popup_id+'"]').trigger('click');
				  });
		
        activeEl = element;
		if(__j(element).hasClass('reloadwall')) _isWall = true;
		if(__j(element).data('scrolltop')) _g_scrollTop = __j(element).data('scrolltop');
		
        g_requestPage(element.href || $(element).data('dhref'));
        return false;
        /*if (this.getAttribute('hrefattr') === "true") {
            g_requestPage(this.href);
            return false;
        }
        return true;*/
    }

    function g_init() {
        oPageInfo.title = document.title;
        highlightPages();
 

	    __j(document).off('click.globalAjaxMus').on('click.globalAjaxMus', '[hrefattr]', function(e){  
		
		if( __j(this).hasClass('anchor') ) {
			
			is_anchor = true; return;
		
		}else{ 
		
		is_anchor = false;
                e.preventDefault();
				e.stopImmediatePropagation();
				var $this = __j(this);
				
				
 
				if($this.hasClass('closejbox')) __j('#nohook_modal_close').trigger('click'); 
				
                if (this.getAttribute('data-clbk') !== "") hasCallback(this);

				if(  $this.hasClass('search-filter-box') || $this.attr('href').indexOf('/search?filterbox=1') > -1  ) escape_filter_box = 1;
				
                if (window.location.href === this.href && !__j(this).hasClass('reloadwall') && !$(this).hasClass('hrefimportant'))
                   return runCallback();
                else
                    g_processLink(this);

		}
            });

  
    }

    var

    /* customizable constants */
        sTargetId = "mmusic_container",
        sViewKey = "view_as",
        sAjaxClass = "ajax-nav",
		escape_filter_box, // for search page

        /* not customizable constants */
        rSearch = /\?.*$/,
        rHost = /^[^\?]*\?*&*/,
        rView = new RegExp("&" + sViewKey + "\\=[^&]*|&*$", "i"),
        rEndQstMark = /\?$/,
		_isWall,
        oLoadingBox = document.createElement("div"),
        oCover = document.createElement("div"),
        oLoadingImg = new Image(),
        oPageInfo = {
            title: null,
            url: location.href
        },
        oHTTPStatus = /* http://www.iana.org/assignments/http-status-codes/http-status-codes.xml */ {
            100: "Continue",
            101: "Switching Protocols",
            102: "Processing",
            200: "OK",
            201: "Created",
            202: "Accepted",
            203: "Non-Authoritative Information",
            204: "No Content",
            205: "Reset Content",
            206: "Partial Content",
            207: "Multi-Status",
            208: "Already Reported",
            226: "IM Used",
            300: "Multiple Choices",
            301: "Moved Permanently",
            302: "Found",
            303: "See Other",
            304: "Not Modified",
            305: "Use Proxy",
            306: "Reserved",
            307: "Temporary Redirect",
            308: "Permanent Redirect",
            400: "Bad Request",
            401: "Unauthorized",
            402: "Payment Required",
            403: "Forbidden",
            404: "Not Found",
            405: "Method Not Allowed",
            406: "Not Acceptable",
            407: "Proxy Authentication Required",
            408: "Request Timeout",
            409: "Conflict",
            410: "Gone",
            411: "Length Required",
            412: "Precondition Failed",
            413: "Request Entity Too Large",
            414: "Request-URI Too Long",
            415: "Unsupported Media Type",
            416: "Requested Range Not Satisfiable",
            417: "Expectation Failed",
            422: "Unprocessable Entity",
            423: "Locked",
            424: "Failed Dependency",
            425: "Unassigned",
            426: "Upgrade Required",
            427: "Unassigned",
            428: "Precondition Required",
            429: "Too Many Requests",
            430: "Unassigned",
            431: "Request Header Fields Too Large",
            500: "Internal Server Error",
            501: "Not Implemented",
            502: "Bad Gateway",
            503: "Service Unavailable",
            504: "Gateway Timeout",
            505: "HTTP Version Not Supported",
            506: "Variant Also Negotiates (Experimental)",
            507: "Insufficient Storage",
            508: "Loop Detected",
            509: "Unassigned",
            510: "Not Extended",
            511: "Network Authentication Required"
        };
    var theme_last_uid;
    var oReq, bIsLoading = false,
        bUpdateURL = false;

    oLoadingBox.id = "ajax-loader";
    oCover.onclick = g_abortReq;
    //oLoadingImg.src = "";//"data:image/gif;base64,R0lGODlhEAAQAPIAAP///wAAAMLCwkJCQgAAAGJiYoKCgpKSkiH/C05FVFNDQVBFMi4wAwEAAAAh/hpDcmVhdGVkIHdpdGggYWpheGxvYWQuaW5mbwAh+QQJCgAAACwAAAAAEAAQAAADMwi63P4wyklrE2MIOggZnAdOmGYJRbExwroUmcG2LmDEwnHQLVsYOd2mBzkYDAdKa+dIAAAh+QQJCgAAACwAAAAAEAAQAAADNAi63P5OjCEgG4QMu7DmikRxQlFUYDEZIGBMRVsaqHwctXXf7WEYB4Ag1xjihkMZsiUkKhIAIfkECQoAAAAsAAAAABAAEAAAAzYIujIjK8pByJDMlFYvBoVjHA70GU7xSUJhmKtwHPAKzLO9HMaoKwJZ7Rf8AYPDDzKpZBqfvwQAIfkECQoAAAAsAAAAABAAEAAAAzMIumIlK8oyhpHsnFZfhYumCYUhDAQxRIdhHBGqRoKw0R8DYlJd8z0fMDgsGo/IpHI5TAAAIfkECQoAAAAsAAAAABAAEAAAAzIIunInK0rnZBTwGPNMgQwmdsNgXGJUlIWEuR5oWUIpz8pAEAMe6TwfwyYsGo/IpFKSAAAh+QQJCgAAACwAAAAAEAAQAAADMwi6IMKQORfjdOe82p4wGccc4CEuQradylesojEMBgsUc2G7sDX3lQGBMLAJibufbSlKAAAh+QQJCgAAACwAAAAAEAAQAAADMgi63P7wCRHZnFVdmgHu2nFwlWCI3WGc3TSWhUFGxTAUkGCbtgENBMJAEJsxgMLWzpEAACH5BAkKAAAALAAAAAAQABAAAAMyCLrc/jDKSatlQtScKdceCAjDII7HcQ4EMTCpyrCuUBjCYRgHVtqlAiB1YhiCnlsRkAAAOwAAAAAAAAAAAA==";
    oCover.appendChild(oLoadingImg);
    oLoadingBox.appendChild(oCover);
    up_href = function() {
        return g_init()
    };
	

    window.onpopstate = function(oEvent) { 

     /*   bUpdateURL = 255;
        oPageInfo.title = typeof oEvent.state.title != 'undefined' ? (oEvent.state.title != null ? oEvent.state.title : '') : '';
        oPageInfo.url = oEvent.state.url;alert(oEvent.state.url);
        g_getPage();*/
		
		if(!is_mobile_popup){
		oPageInfo.title = '';
        bUpdateURL = 255;
        //   oPageInfo.title = oEvent.state.title;
        oPageInfo.url = window.location.href;
        g_getPage(oPageInfo.url);
		}

    };

    // for themes page
    window.onload = function() {
        //colorateContent(sTargetId);
    }
    window.addEventListener ? addEventListener("load", g_init, false) : window.attachEvent ? attachEvent("onload", g_init) : (onload = g_init);

    // Public methods
    this.open = g_requestPage;
    this.stop = g_abortReq;
    this.rebuildLinks = g_init;

})();
 
