<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Music;
use App\Album;


class AeriController extends Controller
{
    public function index()
    {
        $album = Album::orderBy('release', 'DESC')->first();
        $s = Music::orderBy('track', 'ASC')->where('id_album', $album->id);
        return view('welcome', compact('album', 's'));
    }

    public function album()
    {
        $album = Album::orderBy('release', 'DESC')->get();
        return view('album', compact('album'));
    }

    public function artist()
    {
        return view('artist');
    }

    public function listenapi($id)
    {
        $singles = Music::where('id_album', $id)->get();
        $songs = [];
        foreach ($singles as $sing) {
            $songs[] = [
                'title' => $sing->title,
                'artist' => $sing->albums->artist,
                'mp3' => $sing->mp3,
                'duration' => $sing->duration
            ]; 
        }
        return response()->json($songs);
    }

    public function listen($id){
        $play = Album::find($id);
        return view('play', compact('play'));
    }

    public function about()
    {
        return view('about');
    }
}
