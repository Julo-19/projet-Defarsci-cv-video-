<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{

    public function index()
    {
        $videos = Video::all();

        return view('posts.all-posts', ['videos' => $videos]);
    }

    public function showUploadForm()
    {
        return view('upload');
    }

    public function uploadVideo(Request $request)
    {
        $request->validate([
            'video' => 'required|mimes:mp4,mov,avi|max:5000', // Taille maximale de 10 Mo
        ]);

        $videoPath = $request->file('video')->store('videos', 'public');

        $video = new Video();
        $video->path = $videoPath;
        $video->save();

        return redirect()->route('all-posts.posts', $video->id);
    }

    public function showVideo($id)
    {
        $video = Video::findOrFail($id);

        return view('show-video', compact('video'));
    }


    public function listVideo()
    {
        $post = Video::all();
        return view('posts.all-posts', compact('post'));
    }

    public function store(Request $request)
    {
        $post = new Video();
        $post->video = $request->path;
        $post->save();
    
    }
}
