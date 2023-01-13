<?php
namespace App\Repositories;

use App\Models\Media;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class MediaRepo {

    public function storePost($post, $image, $desc, $folder = null){
        //delete old image
        if($post->media){
            $post->media->deleteImage();
            $post->media->delete();
        }
        $path = $image->storeOnCloudinary($folder);
        $post->media()->create([
            'title' => $path->getFileName(),
            'slug' => Str::slug($path->getFileName()),
            'url' => $path->getSecurePath(),
            'path' => $path->getSecurePath(),
            'description' => $desc,
            'size' => $path->getSize(),
            'mimeType' => $path->getFileType(),
            'user_id' => Auth::id(),
        ]);
        return $post->media;
    }

    public function storeAvatar($user, $image, $desc, $folder = null){
        //delete old image
        if($user->avatar){
            $user->avatar->deleteImage();
            $user->avatar->delete();
        }
        $path = $image->storeOnCloudinary($folder);
        $user->avatar()->create([
            'title' => $path->getFileName(),
            'slug' => Str::slug($path->getFileName()),
            'url' => $path->getSecurePath(),
            'path' => $path->getSecurePath(),
            'description' => $desc,
            'size' => $path->getSize(),
            'mimeType' => $path->getFileType(),
            'user_id' => Auth::id(),
        ]);
        return $user->avatar;
    }

    public function delete($id){
        if($media = Media::find($id)){
            $media->delete();
            return true;
        }
    }

    #TODO: API ACTIONS
}
