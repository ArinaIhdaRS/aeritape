<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Music;
use App\Album;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = DB::table('albums')->count();
        $songs = DB::table('musics')->count();
        $singles = DB::table('musics')->join('albums', 'albums.id', '=', 'musics.id_album')->where('albums.type','single' || 'ost')->count();
        $last = DB::table('musics')->latest();
        return view('home', compact('albums', 'songs', 'singles', 'last'));
    }

    public function songs()
    {
        $daftar_song = Music::orderBy('created_at', 'DESC')->paginate(10);
        return view('dashboard.songs', compact('daftar_song'));
    }

    public function songedit(Request $request, $id)
    {  
        $song = Music::findOrFail($id);
        $song->title = $request->input('title');
        $song->track = $request->input('track');
        $song->duration = $request->input('duration');
        if (empty($request->file('mp3')))
        {
            $song->mp3 = $song->mp3;
        }
        else{    
            $destination = "album/$song->albums->type/";
            unlink('album/'.$song->albums->type.'/'.$song->mp3);
            $song = $request->file('mp3'); 
            $song->move($destination, $song->getClientOriginalName());
            $song->mp3 = $song->getClientOriginalName();
        }
        $song->title = $request->input('mv');
        $song->mv_url = $request->input('mv_url');
        $song->save();

        return redirect()->route('songs')->with('success', 'One Track Updated!');
    }

    public function mv()
    {   
        $daftar_song = Music::all()->where('mv', 'Yes');
        return view('dashboard.mv', compact('daftar_song'));
    }

    public function albums()
    {
        $daftar_album = Album::orderBy('created_at', 'DESC')->paginate(10);
        return view('dashboard.albums', compact('daftar_album'));
    }

    public function albumtracks($id)
    {
        $album = Album::find($id);
        $track_list = DB::table('musics')->where('id_album', $id)->orderBy('track', 'ASC')->get();
        return view('dashboard.track', compact('album', 'track_list'));
    }

    public function inserttrack(Request $request, $id)
    {
        if($request->hasFile('mp3'))
        {   
            $album = Album::find($id);
            $songs = new Music();
            $songs->id_album = $id;
            $songs->title = $request->title;
            $songs->track = $request->track;
            $songs->duration = $request->duration;
            $destination = "album/$album->type/";
            $mp3 = $request->file('mp3'); 
            $mp3->move($destination, $mp3->getClientOriginalName());
            $songs->mp3 = $destination.$mp3->getClientOriginalName();
            $songs->mv = $request->mv;
            $songs->mv_url = $request->mv_url;
            $songs->save();
        }
        return redirect()->route('albumedit',$album->id)->with('success', 'One Succesfully Song Added!');
    }

    public function trackeditsave(Request $request, $id)
    {  
        $track = Music::findOrFail($id);
        $track->title = $request->input('title');
        $track->track = $request->input('track');
        $track->duration = $request->input('duration');
        if (empty($request->file('mp3')))
        {
            $track->mp3 = $track->mp3;
        }
        else{    
            $destination = "album/$track->albums->type/";
            unlink('album/'.$track->albums->type.'/'.$track->mp3);
            $track = $request->file('mp3'); 
            $track->move($destination, $track->getClientOriginalName());
            $track->mp3 = $track->getClientOriginalName();
        }
        $track->mv = $request->input('mv');
        $track->mv_url = $request->input('mv_url');
        $track->save();

        return redirect()->route('albumedit', ['id' => $track->id_album])->with('success', 'One Track Updated!');
    }

    public function trackdelete($id)
    {
        $track = Music::findOrFail($id)->leftJoin('albums', 'albums.id', '=', 'musics.id_album')->get();
        unlink("album/".$track->albums('type')."/".$track->mp3);
        $track->delete();
        return redirect()->route('albumtracks')->with('success', 'One Track Deleted!');
    }

    public function albumdelete($id)
    {
        $album = Album::find($id);
        $track_list = Music::all()->where('id_album', $id);
        foreach ($track_list as $track) {
            unlink('album/'.$album->type.'/'.$track->mp3);
        }
        unlink('album/'.$album->type.'/'.$album->cover);
        $album->delete();
        return redirect()->route('albums')->with('success', 'One Album Deleted!');
    }

    public function albumedit($id)
    {
        $album = Album::find($id);
        $track_list = DB::table('musics')->where('id_album', $id)->orderBy('track', 'ASC')->get();
        return view('dashboard.album-edit', compact('album', 'track_list'));
    }

    public function editalbum(Request $request, $id)
    {
        $album = Album::findOrFail($id);  
        $album->album_ke = $request->input('album_ke');
        $album->type = $request->input('type');
        $album->artist = $request->input('artist');
        $album->release = $request->input('release');
        
        if (empty($request->file('cover')))
        {
            $album->cover = $album->cover;
        }
        else{    
            unlink('album/'.$album->type.'/'.$album->cover);
            $destination = "album/$album->type/";
            $cover = $request->file('cover');
            $ext = $cover->getClientOriginalExtension();
            $newName = 'cover'.$request->album_ke.$request->type.'.'.$ext; 
            $cover->move($destination, $newName);
            $album->cover = $newName;
        }
        $album->save();
        return redirect()->route('albums')->with('success', 'One Album Updated!');
    }

    public function addalbum()
    {
        return view('dashboard.album-add');
    }

    public function insertalbum(Request $request)
    {   
        if($request->hasFile('cover'))
        {
            $album = new Album();
            $album->album_ke = $request->album_ke;
            $album->type = $request->type;
            $album->name = $request->name;
            $album->artist = $request->artist;
            $album->release = $request->release;
            $destination = "album/$request->type/";
            $cover = $request->file('cover');
            $ext = $cover->getClientOriginalExtension();
            $newName = 'cover'.$request->album_ke.$request->artist.$request->type.'.'.$ext; 
            $cover->move($destination, $newName);
            $album->cover = $newName;
            $album->save();
        }
        return redirect()->route('addsong',$album->id)->with('success', 'New Single Album Succesfully Created!');
    }

    public function addsong(Request $request, $id)
    {    
        $album = Album::find($id);
        $daftar_song = DB::table('musics')->where('id_album', $id)->orderBy('track', 'ASC')->get();
        return view('dashboard.multiple', compact('album', 'daftar_song'));
    }

    public function insertsongs(Request $request, $id)
    {
        if($request->hasFile('mp3'))
        {   
            $album = Album::find($id);
            $songs = new Music();
            $songs->id_album = $id;
            $songs->title = $request->title;
            $songs->track = $request->track;
            $songs->duration = $request->duration;
            $destination = "album/$album->type/";
            $mp3 = $request->file('mp3'); 
            $mp3->move($destination, $mp3->getClientOriginalName());
            $songs->mp3 = $mp3->getClientOriginalName();
            $songs->mv = $request->mv;
            $songs->mv_url = $request->mv_url;
            $songs->save();
        }
        return redirect()->route('addsong',$id)->with('success', 'One Succesfully Song Added!');
    }

}
