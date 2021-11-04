<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Post;
use finfo;
use GuzzleHttp\Psr7\UploadedFile;
use App\Models\Media;
use App\Models\Reaction;
use App\Models\Tag;
use App\Models\View;

class PostController extends Controller
{
    public function upload(Request $request)
    {
        if(is_dir(public_path('users/'. $request->id .'/temp')) == false)
            mkdir(public_path("users/". $request->id ."/temp"));
        if($request->type == "images" && is_dir(public_path("users/". $request->id ."/temp/images")) == false) 
            mkdir(public_path('users/'. $request->id .'/temp/images'));
        else if(is_dir(public_path("users/". $request->id ."/temp/files")) == false){
            mkdir(public_path("users/". $request->id ."/temp/files"));
        }
        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        if($request->type == "images")
            $file->move(public_path('users/'.$request->id.'/temp/images'),$fileName);
        else 
            $file->move(public_path('users/'.$request->id.'/temp/files'),$fileName);
        return response()->json(['success'=>$fileName]);
    }
    public function deleteFiles(Request $request)
    {
        $filename =  $request->data;
        $path=public_path('users/'.$request->id);
        if($request->type == 'images')
            File::delete($path.'/temp/images/'.$filename); 
        else 
            File::delete($path.'/temp/files/'.$filename);
        return $filename;  
    }

    public function store (Request $r) {
        $images = [];
        $Validator = Validator::make($r->all(),[
            'text' => 'required',
            'tags' => 'required'
        ]);

        if($r->type != "text") {
            $flag = false;
            if($r->type == 'images') {
                if(is_dir(public_path('users/'.Auth::user()->id.'/temp/images')) == true) {
                    $imagespaths = public_path('users/'.Auth::user()->id.'/temp/images/*');
                    $images = glob($imagespaths);
                    if(count($images) == 0) {
                        $flag = true;
                    }
                } else {
                    $flag = true;
                }
            }
            if($r->type == 'files') {
                if(is_dir(public_path('users/'.Auth::user()->id.'/temp/files')) == true) {
                    $imagespaths = public_path('users/'.Auth::user()->id.'/temp/files/*');
                    $images = glob($imagespaths);
                    if(count($images) == 0) 
                        $flag = true;
                } else {
                    $flag = true;
                }
            }
            if($Validator->fails() && $flag == true) {
                return response()->json(['errors' => [$Validator->errors(),'media' => "not found media"]]);
            } else if ($Validator->fails()) {
                return response()->json(['errors' => [$Validator->errors()]]);
            } else if($flag == true){
                return response()->json(['errors' => ['media' => "not found media"]]);
            }
        } else {
            if ($Validator->fails()) {
                return response()->json(['errors' => [$Validator->errors()]]);
            }
        }

        $post = new Post(); 
        $url = '/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/';   
        $content = nl2br(preg_replace($url, '<a href="$0" target="_blank" title="$0">$0</a>', $r->text));
        $post->user_id = Auth::user()->id;
        $post->content = $content;
        $post->type = $r->type;
        $post->save();
        $postId = $post->id;

        foreach($r->tags as $tag) {
            $record = Tag::where('name',$tag)->first();
            if($record) {
                $post->tags()->attach($record->id);
            } else {
                $newtag = new Tag();
                $newtag->name = $tag;
                $newtag->save();
                $post->tags()->attach($newtag->id);
            }
        }



        if($r->type == "images") { 
            $images = glob(public_path('users/'.Auth::user()->id.'/temp/images/*'));
            $length = strlen(public_path('users/'.Auth::user()->id.'/temp/images/'));
            foreach($images as $image) {
                $imageName = substr($image,$length);
                $file_path = public_path('users/'.Auth::user()->id.'/temp/images/').$imageName;
                $finfo = new finfo(FILEINFO_MIME_TYPE);
                $img =  new UploadedFile(
                            $imageName,
                            filesize($file_path),
                            0,
                            $file_path,
                            $finfo->file($file_path),         
                    );
                if(is_dir(public_path('users/'.Auth::user()->id.'/posts/'.$postId)) == false){
                    File::makeDirectory(public_path('users/'.Auth::user()->id.'/posts/'.$postId));
                }
                if(is_dir(public_path('users/'.Auth::user()->id.'/posts/'.$postId.'/images')) == false){
                    File::makeDirectory(public_path('users/'.Auth::user()->id.'/posts/'.$postId.'/images'));
                }
                
                File::copy($img->getClientFilename(),public_path('users/'.Auth::user()->id.'/posts/'.$postId.'/images/'.$imageName));
                $imageUpload = new Media();
                $imageUpload->media = $imageName;
                $imageUpload->post_id = $postId;
                $imageUpload->save();
                $pa=public_path('users/'.Auth::user()->id);
                if (file_exists($pa)) {
                    File::delete($pa.'/temp/images/'.$imageName); 
                }
            }

        }

        if($r->type == "files") { 
            $files = glob(public_path('users/'.Auth::user()->id.'/temp/files/*'));
            $length = strlen(public_path('users/'.Auth::user()->id.'/temp/files/'));
            foreach($files as $file) {
                $fileName = substr($file,$length);
                $file_path = public_path('users/'.Auth::user()->id.'/temp/files/').$fileName;
                $finfo = new finfo(FILEINFO_MIME_TYPE);
                $f =  new UploadedFile(
                            $fileName,
                            filesize($file_path),
                            0,
                            $file_path,
                            $finfo->file($file_path),         
                    );
                if(is_dir(public_path('users/'.Auth::user()->id.'/posts/'.$postId)) == false){
                    File::makeDirectory(public_path('users/'.Auth::user()->id.'/posts/'.$postId));
                }
                if(is_dir(public_path('users/'.Auth::user()->id.'/posts/'.$postId.'/files')) == false){
                    File::makeDirectory(public_path('users/'.Auth::user()->id.'/posts/'.$postId.'/files'));
                }
                
                File::copy($f->getClientFilename(),public_path('users/'.Auth::user()->id.'/posts/'.$postId.'/files/'.$fileName));
                $fileUpload = new Media();
                $fileUpload->media = $fileName;
                $fileUpload->post_id = $postId;
                $fileUpload->save();
                $pa=public_path('users/'.Auth::user()->id);
                if (file_exists($pa)) {
                    File::delete($pa.'/temp/files/'.$fileName); 
                }
            }

        }
        
        $tags = Tag::all();
        $posts = Post::where('id',$postId)->get();
        $view = view('Common.Posts-comments',compact('posts'))->render();
        $viewtags = view('Common.tags',compact('tags'))->render();

        return response()->json(['html' => $view,'tagshtml' => $viewtags]);

    }



    public function destroy(Request $request)
    {
        if($request->ajax()) {
            $post = Post::find($request->post_id);
            $post->tags()->detach();
            foreach($post->reactions as $r) {
                $reaction = Reaction::find($r->id);
                $reaction->delete();
            }
            foreach($post->views as $v) {
                $view = View::find($v->id);
                $view->delete();
            }
            foreach($post->media as $m) {
                $media = Media::find($m->id);
                $media->delete();
            }
            foreach($post->comments as $c) {
                foreach($c->reactions as $r) {
                    $reaction = Reaction::find($r->id);
                    $reaction->delete();
                }
                $comment = Comment::find($c->id);
                $comment->delete();
            }
            File::DeleteDirectory(public_path('users/'.Auth::user()->id.'/posts/'.$post->id));
            //File::delete(public_path('users/'.Auth::user()->id.'/posts/'.$post->id));
            $post->delete();
            $tags = Tag::all();
            foreach($tags as $tag) {
                if($tag->posts()->count() == 0)
                {
                    $tag->delete();
                }
            }
            $tags = Tag::all();
            $viewtags = view('Common.tags',compact('tags'))->render();
            return response()->json(['post_id' => $post->id,'tagshtml' => $viewtags]);
        }
        
    }


    public function show(Request $r) {
        $posts = Post::find($r->id);
        return view('Common.showpost',compact('posts'));
    }

    public function edit(Request $r) {

        $post = Post::find($r->post_id);
        $view = view('Common.editpost',compact('post'))->render();
        return response()->json(['html' => $view,'type' => $post->type]);
    }

    public function getfiles(Request $r)
    {
        $fileList = [];
            if($r->type == 'files') {
                $targetDir = public_path("users/".$r->id."/posts/".$r->post_id."/files/") ;
            } else {
                $targetDir = public_path("users/".$r->id."/posts/".$r->post_id."/images/") ;
            }
            $dir = $targetDir;
                //dd($dir);
                if (is_dir($dir)){
                    if ($dh = opendir($dir)){
                        while (($file = readdir($dh)) !== false){
                        if($file != '' && $file != '.' && $file != '..'){
                            $file_path = $targetDir.$file;
                            File::copy($file_path,public_path('users/'.$r->id.'/temp/'.$file));
                            if(!is_dir($file_path)){
                            $size = filesize($file_path);
                            $fileList[] = ['name'=>$file, 'size'=>$size, 'path'=>$file_path];
                            }
                        }
                        }
                        closedir($dh);
                    }
                }
            //dd($fileList);

            return response()->json(['response'=>$fileList]);
    }
}
