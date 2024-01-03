<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Like;
use App\Models\Video;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class VideoController extends Controller
{

    public function index()
    {
        $videos = Video::all();

        return view('posts.all-posts', ['videos' => $videos]);
    }public function like(): JsonResponse {
        $videoID = request()->id;
        $video = Video::find($videoID);
        $user = auth()->user();
    
        if ($video->isLikeByLoggedInUser()) {
            // Dislike
            $like = Like::where([
                'user_id' => $user->id,
                'video_id' => $videoID
            ])->first();
    
            if ($like) {
                $like->delete();
            }
    
            $count = $video->likes->count();
    
            return response()->json([
                'count' => $count,
                'color' => 'text-danger'
            ], 200);
        } else {
            // Like
            $like = new Like();
            $like->user_id = $user->id;
            $like->video_id = $videoID;
            $like->save();
    
            $count = $video->likes->count();
    
            return response()->json([
                'count' => $count,
                'color' => 'text-dark'
            ], 200);
        }
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
