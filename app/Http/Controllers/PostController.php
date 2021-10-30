<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Post;
use finfo;
use GuzzleHttp\Psr7\UploadedFile;
use App\Models\Media;
use App\Models\Tag;
class PostController extends Controller
{
    public function upload(Request $request)
    {
        if(is_dir(public_path('storage\users\\'.$request->id.'\temp')) == false)
            mkdir(public_path('storage/users/'.$request->id.'/temp'));
        if($request->type == "images" && is_dir(public_path('storage\users\\'.$request->id.'\temp\images')) == false) 
            mkdir(public_path('storage/users/'.$request->id.'/temp/images'));
        else if(is_dir(public_path('storage\users\\'.$request->id.'\temp\files')) == false){
            mkdir(public_path('storage/users/'.$request->id.'/temp/files'));
        }
        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        if($request->type == "images")
            $file->move(public_path('storage\users\\'.$request->id.'\temp\images'),$fileName);
        else 
            $file->move(public_path('storage\users\\'.$request->id.'\temp\files'),$fileName);
        return response()->json(['success'=>$fileName]);
    }
    public function deleteFiles(Request $request)
    {
        $filename =  $request->data;
        $path=public_path('storage\users\\'.$request->id);
        if($request->type == 'images')
            File::delete($path.'\temp\images\\'.$filename); 
        else 
            File::delete($path.'\temp\files\\'.$filename);
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
                if(is_dir(public_path('storage\users\\'.Auth::user()->id.'\temp\images')) == true) {
                    $imagespaths = public_path('storage\users\\'.Auth::user()->id.'\temp\images\*');
                    $images = glob($imagespaths);
                    if(count($images) == 0) {
                        $flag = true;
                    }
                } else {
                    $flag = true;
                }
            }
            if($r->type == 'files') {
                if(is_dir(public_path('storage\users\\'.Auth::user()->id.'\temp\files')) == true) {
                    $imagespaths = public_path('storage\users\\'.Auth::user()->id.'\temp\files\*');
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
            $images = glob(public_path('storage\users\\'.Auth::user()->id.'\temp\images\*'));
            $length = strlen(public_path('storage\users\\'.Auth::user()->id.'\temp\images'));
            foreach($images as $image) {
                $imageName = substr($image,$length);
                $file_path = public_path('storage\users\\'.Auth::user()->id.'\temp\images\\').$imageName;
                $finfo = new finfo(FILEINFO_MIME_TYPE);
                $img =  new UploadedFile(
                            $imageName,
                            filesize($file_path),
                            0,
                            $file_path,
                            $finfo->file($file_path),         
                    );
                if(is_dir(public_path('storage\users\\'.Auth::user()->id.'\posts\\'.$postId)) == false){
                    mkdir(public_path('storage\users\\'.Auth::user()->id.'\posts\\'.$postId));
                }
                if(is_dir(public_path('storage\users\\'.Auth::user()->id.'\posts\\'.$postId.'\images')) == false){
                    mkdir(public_path('storage\users\\'.Auth::user()->id.'\posts\\'.$postId.'\images'));
                }
                
                copy($img->getClientFilename(),public_path('storage\users\\'.Auth::user()->id.'\posts\\'.$postId.'\images\\'.$imageName));
                $imageUpload = new Media();
                $imageUpload->media = public_path('storage\users\\'.Auth::user()->id.'\posts\\'.$postId.'\images\\'.$imageName);
                $imageUpload->post_id = $postId;
                $imageUpload->save();
                $pa=public_path('storage\users\\'.Auth::user()->id);
                if (file_exists($pa)) {
                    File::delete($pa.'\temp\images\\'.$imageName); 
                }
            }

        }

        if($r->type == "files") { 
            $files = glob(public_path('storage\users\\'.Auth::user()->id.'\temp\files\*'));
            $length = strlen(public_path('storage\users\\'.Auth::user()->id.'\temp\files'));
            foreach($files as $file) {
                $fileName = substr($file,$length);
                $file_path = public_path('storage\users\\'.Auth::user()->id.'\temp\files\\').$fileName;
                $finfo = new finfo(FILEINFO_MIME_TYPE);
                $f =  new UploadedFile(
                            $fileName,
                            filesize($file_path),
                            0,
                            $file_path,
                            $finfo->file($file_path),         
                    );
                if(is_dir(public_path('storage\users\\'.Auth::user()->id.'\posts\\'.$postId)) == false){
                    mkdir(public_path('storage\users\\'.Auth::user()->id.'\posts\\'.$postId));
                }
                if(is_dir(public_path('storage\users\\'.Auth::user()->id.'\posts\\'.$postId.'\files')) == false){
                    mkdir(public_path('storage\users\\'.Auth::user()->id.'\posts\\'.$postId.'\files'));
                }
                
                copy($f->getClientFilename(),public_path('storage\users\\'.Auth::user()->id.'\posts\\'.$postId.'\files\\'.$fileName));
                $fileUpload = new Media();
                $fileUpload->media = public_path('storage\users\\'.Auth::user()->id.'\posts\\'.$postId.'\files\\'.$fileName);
                $fileUpload->post_id = $postId;
                $fileUpload->save();
                $pa=public_path('storage\users\\'.Auth::user()->id);
                if (file_exists($pa)) {
                    File::delete($pa.'\temp\files\\'.$fileName); 
                }
            }

        }
 
       

        return \response()->json(['success'=>true]);
    }
}
