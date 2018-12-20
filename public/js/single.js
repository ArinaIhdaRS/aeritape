/* JS Document */

/******************************

[Table of Contents]

1. Vars and Inits
2. Set Header
3. Init Menu
4. Init Single Player
5. Init Fitvids


******************************/

$(document).ready(function()
{
	"use strict";

	/* 

	1. Vars and Inits

	*/

	var header = $('.header');
	var ctrl = new ScrollMagic.Controller();

	initMenu();
	initAlbumPlayer();
	initMagic();
	initSinglePlayer();
	initFitVids();

	setHeader();

	$(window).on('resize', function()
	{
		setHeader();
	});

	$(document).on('scroll', function()
	{
		setHeader();
	});

	/* 

	2. Set Header

	*/

	function setHeader()
	{
		if($(window).scrollTop() > 91)
		{
			header.addClass('scrolled');
		}
		else
		{
			header.removeClass('scrolled');
		}
	}

	/* 

	3. Init Menu

	*/

	function initMenu()
	{
		if($('.menu').length)
		{
			var hamb = $('.hamburger');
			var menu = $('.menu');
			var menuOverlay = $('.menu_overlay');

			hamb.on('click', function()
			{
				menu.addClass('active');
			});

			menuOverlay.on('click', function()
			{
				menu.removeClass('active');
			});
		}
	}

	// function initAlbumPlayer()
	// {
	// 	if($('#jplayer_1').length)
	// 	{
	// 		// Duration has to be entered manually

			// var mysql = require('mysql');

			// var con = mysql.createConnection({
			// 	host: "localhost",
			// 	user: "root",
			// 	password: "170897",
			// 	database: "mixtape"
			// });

			// var playlist = [];

			// con.connect(function(err){
			// 	if (err) throw err;
			// 	con.query("SELECT title, artist, mp3, duration FROM musics JOIN albums on albums.id = musics.id_album WHERE id_album = '1' ORDER BY track", 
			// 		function(err, playlist){
			// 			if (err) throw err;
			// 			playlist;
			// 		});
			// });

			// playlist.forEach(con.query);

			// var playlist =
			// [
			// 	{
			// 		title:"Love Shot",
			// 		artist:"EXO",
			// 		mp3:"../album/Repackage Album/01. Love Shot.mp3",
			// 		duration:"3.20"
			// 	},
			// 	{
			// 		title:"트라우마 (Trauma)",
			// 		artist:"EXO",
			// 		mp3:"../album/Repackage Album/03. 트라우마 (Trauma).mp3",
			// 		duration:"3.42"
			// 	},
			// 	{
			// 		title:"Wait",
			// 		artist:"EXO",
			// 		mp3:"../album/Repackage Album/04. Wait.mp3",
			// 		duration:"4.08"
			// 	},
				// {
				// 	title:"Sunny",
				// 	artist:"Bensound",
				// 	mp3:"files/bensound-sunny.mp3",
				// 	duration:"2.20"
				// },
				// {
				// 	title:"Better Days",
				// 	artist:"Bensound",
				// 	mp3:"files/bensound-betterdays.mp3",
				// 	duration:"2.33"
				// },
				// {
				// 	title:"Dubstep",
				// 	artist:"Bensound",
				// 	mp3:"files/bensound-dubstep.mp3",
				// 	duration:"2.04"
				// },
				// {
				// 	title:"Sunny",
				// 	artist:"Bensound",
				// 	mp3:"files/bensound-sunny.mp3",
				// 	duration:"2.20"
				// }
			];

	// 		var options =
	// 		{
	// 			playlistOptions:
	// 			{
	// 				autoPlay:false,
	// 				enableRemoveControls:false
	// 			},
	// 			play: function() // To avoid multiple jPlayers playing together.
	// 			{ 
	// 				$(this).jPlayer("pauseOthers");
	// 			},
	// 			solution: 'html',
	// 			supplied: 'oga, mp3',
	// 			useStateClassSkin: true,
	// 			preload: 'metadata',
	// 			volume: 0.2,
	// 			muted: false,
	// 			backgroundColor: '#000000',
	// 			cssSelectorAncestor: '#jp_container_1',
	// 			errorAlerts: false,
	// 			warningAlerts: false
	// 		};

	// 		var cssSel = 
	// 		{
	// 			jPlayer: "#jplayer_1",
	// 			cssSelectorAncestor: "#jp_container_1",
	// 			play: '.jp-play',
	// 			pause: '.jp-pause',
	// 			stop: '.jp-stop',
	// 			seekBar: '.jp-seek-bar',
	// 			playBar: '.jp-play-bar',
	// 			globalVolume: true,
	// 			mute: '.jp-mute',
	// 			unmute: '.jp-unmute',
	// 			volumeBar: '.jp-volume-bar',
	// 			volumeBarValue: '.jp-volume-bar-value',
	// 			volumeMax: '.jp-volume-max',
	// 			playbackRateBar: '.jp-playback-rate-bar',
	// 			playbackRateBarValue: '.jp-playback-rate-bar-value',
	// 			currentTime: '.jp-current-time',
	// 			duration: '.jp-duration',
	// 			title: '.jp-title',
	// 			fullScreen: '.jp-full-screen',
	// 			restoreScreen: '.jp-restore-screen',
	// 			repeat: '.jp-repeat',
	// 			repeatOff: '.jp-repeat-off',
	// 			gui: '.jp-gui',
	// 			noSolution: '.jp-no-solution'
	// 		};

	// 		var myPlaylist = new jPlayerPlaylist(cssSel,playlist,options);
			
			
	// 		setTimeout(function()
	// 		{
	// 			var items = $('.jp-playlist ul li > div');
	// 			for(var x = 0; x < items.length; x++)
	// 			{
	// 				var item = items[x];
	// 				var dur = playlist[x].duration;
	// 				var durationDiv = document.createElement('div');
	// 				durationDiv.className = "song_duration";
	// 				durationDiv.append(dur);
	// 				item.append(durationDiv);
	// 			}
	// 		},200);
	// 	}
	// }

		/* 

	6. Init Magic

	*/

	function initMagic()
	{
		if($('.image_overlay').length)
		{
			var eles = $('.image_overlay');
			eles.each(function()
			{
				var ele = this;

				var projectScene = new ScrollMagic.Scene(
				{
					triggerElement: ele,
			        triggerHook: "onEnter",
			        offset: 400,
			        reverse:false
				})
				.setClassToggle(ele, 'active')
				.addTo(ctrl);
			});
		}
	}


	/* 

	4. Init Single Player

	*/

	function initSinglePlayer()
	{
		if($("#jplayer_1").length)
		{
			$("#jplayer_1").jPlayer({
				ready: function () {
					$(this).jPlayer("setMedia", {
						title:"Better Days",
							artist:"Bensound",
							mp3:"files/bensound-betterdays.mp3"
					});
				},
				play: function() { // To avoid multiple jPlayers playing together.
					$(this).jPlayer("pauseOthers");
				},
				swfPath: "plugins/jPlayer",
				supplied: "mp3",
				cssSelectorAncestor: "#jp_container_1",
				wmode: "window",
				globalVolume: true,
				useStateClassSkin: true,
				autoBlur: false,
				smoothPlayBar: true,
				keyEnabled: true,
				solution: 'html',
				preload: 'metadata',
				volume: 0.2,
				muted: false,
				backgroundColor: '#000000',
				errorAlerts: false,
				warningAlerts: false
			});
		}

		if($("#jplayer_2").length)
		{
			$("#jplayer_2").jPlayer({
				ready: function () {
					$(this).jPlayer("setMedia", {
						title:"Dubstep",
						artist:"Bensound",
						mp3:"files/bensound-dubstep.mp3",
					});
				},
				play: function() { // To avoid multiple jPlayers playing together.
					$(this).jPlayer("pauseOthers");
				},
				swfPath: "plugins/jPlayer",
				supplied: "mp3",
				cssSelectorAncestor: "#jp_container_2",
				wmode: "window",
				globalVolume: true,
				useStateClassSkin: true,
				autoBlur: false,
				smoothPlayBar: true,
				keyEnabled: true,
				solution: 'html',
				preload: 'metadata',
				volume: 0.2,
				muted: false,
				backgroundColor: '#000000',
				errorAlerts: false,
				warningAlerts: false
			});
		}

		if($("#jplayer_3").length)
		{
			$("#jplayer_3").jPlayer({
				ready: function () {
					$(this).jPlayer("setMedia", {
						title:"Sunny",
						artist:"Bensound",
						mp3:"files/bensound-sunny.mp3",
					});
				},
				play: function() { // To avoid multiple jPlayers playing together.
					$(this).jPlayer("pauseOthers");
				},
				swfPath: "plugins/jPlayer",
				supplied: "mp3",
				cssSelectorAncestor: "#jp_container_3",
				wmode: "window",
				globalVolume: true,
				useStateClassSkin: true,
				autoBlur: false,
				smoothPlayBar: true,
				keyEnabled: true,
				solution: 'html',
				preload: 'metadata',
				volume: 0.2,
				muted: false,
				backgroundColor: '#000000',
				errorAlerts: false,
				warningAlerts: false
			});
		}	
	}

	/* 

	5. Init Fitvids
	
	*/

	function initFitVids()
	{
		if($('.video_container').length)
		{
			$('.video_container').fitVids();
		}
	}

});