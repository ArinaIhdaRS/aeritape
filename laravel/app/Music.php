<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    protected $table = 'musics';
    protected $fillable = ['id_album','title','track','duration','mv','mv_url','mp3','created_at'];

    public function albums(){
    	return $this->belongsTo('App\Album', 'id_album');
    }
}
