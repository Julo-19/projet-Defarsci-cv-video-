<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Video;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class homeController extends Controller
{
    public function index(){
        
        if(Auth::id())
        {
            $usertype = Auth()->user()->usertype;
            

            if($usertype == 'user'){

                $videos = Video::all();

                return view('posts.all-posts', ['videos' => $videos]);
            }


            else if($usertype == 'admin'){

                return view('admin.admin');
            }

            else{

                redirect()->back();
            }
        }
    }
}
