
if(typeof ga != 'function'){
   window.ga = function(a){
	   
   return $(a);
   };
}

function mmPlay(){
	
	
var music = ga('#mmusic')[0]; // id for audio element
var duration; // Duration of audio clip

var pButton = ga('.pButton')[0]; // play button
var jpButton = ga('.pButton'); // jquery play button


var playhead = ga('.track_playhead')[0]; // playhead
var jplayhead = ga('.track_playhead'); // jquery playhead

var timeline = ga('.track_timeline')[0]; // timeline
var jtimeline = ga('.track_timeline'); // jquerytimeline

// timeline width adjusted for playhead
var timelineWidth = timeline.offsetWidth - playhead.offsetWidth;

// play button event listenter
//pButton.addEventListener("click", play);

// timeupdate event listener
music.addEventListener("timeupdate", timeUpdate, false);

// makes timeline clickable
timeline.addEventListener("click", function(event) {
    moveplayhead(event);
    music.currentTime = duration * clickPercent(event);
}, false);






// makes playhead draggable
playhead.addEventListener('mousedown', mouseDown, false);
/*
jplayhead.off('m.mousedown').on('m.mousedown', function(e){
	
    onplayhead = true;
    window.addEventListener('mousemove', moveplayhead, true);
    music.removeEventListener('timeupdate', timeUpdate, false);
});*/

window.addEventListener('mouseup', mouseUp, false);
// Gets audio file duration
music.addEventListener("canplaythrough", function() {
    duration = music.duration;
}, false);
// Boolean value so that audio position is updated only when the playhead is released
var onplayhead = false;

}



// mouseDown EventListener
function mouseDown() {
    onplayhead = true;
    window.addEventListener('mousemove', moveplayhead, true);
    music.removeEventListener('timeupdate', timeUpdate, false);
}

// mouseUp EventListener
// getting input from all mouse clicks
function mouseUp(event) {
    if (onplayhead == true) {
        moveplayhead(event);
        window.removeEventListener('mousemove', moveplayhead, true);
        // change current time
        music.currentTime = duration * clickPercent(event);
        music.addEventListener('timeupdate', timeUpdate, false);
    }
    onplayhead = false;
}
// mousemove EventListener
// Moves playhead as user drags
function moveplayhead(event) {
    var newMargLeft = event.clientX - getPosition(timeline);

    if (newMargLeft >= 0 && newMargLeft <= timelineWidth) {
        playhead.style.marginLeft = newMargLeft + "px";
    }
    if (newMargLeft < 0) {
        playhead.style.marginLeft = "0px";
    }
    if (newMargLeft > timelineWidth) {
        playhead.style.marginLeft = timelineWidth + "px";
    }
}

// timeUpdate
// Synchronizes playhead position with current point in audio
function timeUpdate() {
    var playPercent = timelineWidth * (music.currentTime / duration);
    playhead.style.marginLeft = playPercent + "px";
    if (music.currentTime == duration) {
        pButton.className = "";
        pButton.className = "play";
    }
}

//Play and Pause
ga('.pButton').on('click', function(e){
	

	
	
	if(ga(this).closest('li').hasClass('__playing')){
		
	// close recent playing track
	ga(this).closest('li').removeClass('__playing');
		 music.pause();
		   
	}else 
	{ 
		ga('.music_track_i.__playing').removeClass('__playing');
		ga('.music_track_i').find('.track_timeline').remove();
		/*
		if(!ga(this).find('.track_timeline').length)
		ga(this).closest('li').append('<div class="track_timeline">\
				<div class="track_playhead"></div>\
					</div>');*/
 
		 music.play();
        // remove pause, add play
         ga(this).closest('li').addClass('__playing');
		 
		
	}
		 
	 
	 
/*
	
    // start music
    if (music.paused) {
        music.play();
        // remove play, add pause
       ga(this).closest('li').addClass('__playing');
    } else { // pause music
        music.pause();
        // remove pause, add play
         ga(this).closest('li').removeClass('__playing');
    }*/
	
});
function play() {
   /* // start music
    if (music.paused) {
        music.play();
        // remove play, add pause
       jpButton.closest('li').addClass('__playing');
    } else { // pause music
        music.pause();
        // remove pause, add play
         jpButton.closest('li').removeClass('__playing');
    }*/
}

// getPosition
// Returns elements left position relative to top-left of viewport
function getPosition(el) {
    return el.getBoundingClientRect().left;
}
// returns click as decimal (.77) of the total timelineWidth
function clickPercent(event) {
    return (event.clientX - getPosition(timeline)) / timelineWidth;

}


