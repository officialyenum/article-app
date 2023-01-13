<?php

namespace App\Http\Livewire\Components\Admin;

use App\Models\Tag;
use App\Models\Post;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Repositories\MediaRepo;

class Posts extends Component
{
    use WithPagination;
    use WithFileUploads;

    protected $paginationTheme = 'bootstrap';

    protected $posts;

    public $title, $body, $category_id, $image, $newImage, $post_id;
    public $tag_ids = [];
    public $new_tag_ids = [];
    public $error;
    //set form validation rules

    public $search = '';
    protected MediaRepo $mediaRepo;

    public function __construct()
    {
        $this->mediaRepo = new MediaRepo();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $search = $this->search;
        return view('livewire.components.admin.posts',[
            'tags' => Tag::all(),
            'categories' => Category::all(),
            'posts' => Post::withTrashed()
                            ->where('title', 'like', '%'.$search.'%')
                            ->orWhere('body', 'like', '%'.$search.'%')
                            ->whereHas('category', function($q) use($search) {
                                $q->where('name',$search);
                            })
                            ->whereHas('tags', function($q) use($search) {
                                $q->where('name',$search);
                            })
                            ->orderBy('id','DESC')->paginate(5)
            ]);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields(){
        $this->title = '';
        $this->body = '';
        $this->category_id = '';
        $this->new_tag_ids = [];
        $this->image = '';
        $this->newImage = '';
    }


    public function store()
    {
        $this->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:1024',
            'category_id' => 'required',
        ]);

        if(!$this->image){
            //flash success message
            $this->dispatchBrowserEvent('toast-message', ['message' => 'Oops! Image Required to create post']);
            return redirect(route('admin.posts'));
        }

        //Save Post
        $post = new Post();
        $post->title = $this->title;
        $post->slug = Str::slug($this->title);
        $post->body = $this->body;
        $post->category_id = $this->category_id;
        $post->user_id = auth()->user()->id;
        $post->save();

        //Save Media
        $this->mediaRepo->storePost($post, $this->image, 'image','post image', 'blog_app');

        if ($this->tag_ids) {
            $post->tags()->attach($this->tag_ids);
        }

        if($post){
            //flash success message
            $this->dispatchBrowserEvent('toast-success', ['message' => 'You Successfully Created a Post']);
            //if user successfully created redirect to login page
            return redirect(route('admin.posts'));
        }

        $this->resetInputFields();
        $this->dispatchBrowserEvent('close-modal');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        $post = Post::withTrashed()->where('id',$id)->firstOrFail();
        if ($post) {
            $this->post_id =  $post->id;
            $this->title = $post->title;
            $this->body = $post->body;
            $this->category_id = $post->category_id;
            $this->tag_ids = $post->tags->pluck('id')->toArray();
            $this->new_tag_ids = $this->tag_ids;
            $this->newImage = $post->media->url ?? "";
        }else{
            redirect()->to('/admin/posts');
        }
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function cancel()
    {
        $this->resetInputFields();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function update()
    {
        //set form validation rules
        $this->validate([
            'title' => 'required|min:3',
            'body' => 'required|min:3',
            'category_id' => 'required',
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:1024',
        ]);


        $post = Post::find($this->post_id);
        $post->title = $this->title;
        $post->slug = Str::slug($this->title);
        $post->body = $this->body;
        $post->category_id = $this->category_id;

        $post->save();
        //Save Media
        if($this->image){
            $this->mediaRepo->storePost($post, $this->image, 'image','post image', 'blog_app');
        }


        if ($this->new_tag_ids) {
            $post->tags()->sync($this->new_tag_ids);
        }

        $this->resetInputFields();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('toast-success', ['message' => 'You Successfully Updated a Post']);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function restore()
    {
        $post = Post::withTrashed()->where('id',$this->post_id)->firstOrFail();
        $post->restore();
        $this->resetInputFields();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('toast-success', ['message' => 'You Successfully Restored a Post']);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete()
    {
        Post::find($this->post_id)->delete();
        $this->resetInputFields();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('toast-success', ['message' => 'You Successfully Deleted a Post']);
    }
}
