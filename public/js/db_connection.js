var mysql = require('mysql');

var con = mysql.createConnection({
	host: "localhost",
	user: "root",
	password: "170897",
	database: "mixtape"
});

con.connect(function(err){
	if (err) throw err;
	con.query("SELECT title, artist, mp3, duration FROM musics JOIN albums on albums.id = musics.id_album WHERE id_album = '1' ORDER BY track", 
		function(err, playlist){
			if (err) throw err;
			console.log(playlist);
		});
});