<?php

namespace App\Models;

use Livewire\WithFileUploads;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    use HasFactory;
    use WithFileUploads;

    protected $fillable = ['title','slug','body','image','category_id','active','user_id'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class,'post_tags');
    }

    public function hasTag($tagId)
    {
        return in_array($tagId, $this->tags->pluck('id')->toArray());
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function media()
    {
        return $this->morphOne(Media::class, 'mediable');
    }


    public function userPost()
    {
        $userID = Auth::user();
        return $this->post->where('user_id','Like', "%{$userID}%");
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->orderby('id','DESC');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
