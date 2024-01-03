<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

        protected $fillable = [
            'title', 
            'description'
        ];
        public function likes(){
            return $this->hasMany(Like::class);
        }
        public function isLikeByLoggedInUser(){
            return $this->likes->where('user_id', auth()->user()->id)->isEmpty() ? false: true;


        }

}
