<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Post;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function download($id)
    {
        $media = Media::find($id);
        $post_id = $media->post_id;
        $userId = Post::find($post_id)->user_id;
        $file_path = public_path('users/'.$userId.'/posts/'.$post_id.'/files/'.$media->media);
        return response()->download( $file_path);
    }
}
