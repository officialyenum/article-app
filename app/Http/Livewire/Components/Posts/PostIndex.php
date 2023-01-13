<?php

namespace App\Http\Livewire\Components\Posts;

use App\Models\Tag;
use App\Models\Post;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Repositories\MediaRepo;

class PostIndex extends Component
{
    use WithPagination;
    use WithFileUploads;

    protected $paginationTheme = 'bootstrap';

    protected $posts, $tags, $categories;
    public $title, $body, $category_id, $image, $newImage, $post_id;
    public $tag_ids = [];
    public $new_tag_ids = [];
    public $error;

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
        return view('livewire.components.posts.post-index',[
            'tags' => Tag::all(),
            'categories' => Category::all(),
            'posts' => Post::where('title', 'like', '%'.$search.'%')
                ->orWhere('body', 'like', '%'.$search.'%')
                ->whereHas('category', function($q) use($search) {
                    $q->where('name',$search);
                })
                ->whereHas('tags', function($q) use($search) {
                    $q->where('name',$search);
                })
                ->orderBy('id','DESC')->paginate(5),
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
        $this->tag_ids = [];
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
            $this->dispatchBrowserEvent('toast-success', ['message' => 'You Successfully Created a Post.']);
            //if user successfully created redirect to login page
            return redirect(route('posts.index'));
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
        $post = Post::findOrFail($id);
        if ($post) {
            $this->post_id =  $post->id;
            $this->title = $post->title;
            $this->body = $post->body;
            $this->category_id = $post->category_id;
            $this->tag_ids = $post->tags->pluck('id')->toArray();
            $this->new_tag_ids = $this->tag_ids;
            $this->newImage = $post->image;
        }else{
            redirect()->to('/posts');
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
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:1024',
        ]);


        $post = Post::find($this->post_id);
        if($post->user_id !== auth()->user()->id){
            // else return error
            $this->dispatchBrowserEvent('toast-error', ['message' => 'You are not authorized to modify this post']);
            $this->dispatchBrowserEvent('close-modal');
            return;
        }
        $post->title = $this->title;
        $post->slug = Str::slug($this->title);
        $post->body = $this->body;
        $post->category_id = $this->category_id;
        if($this->image){
            $image_name  =  $this->image->getClientOriginalName();
            $this->image->storeAs('public/photos',$image_name);
            $post->image =$this->image_name;
        }


        if ($this->new_tag_ids) {
            $post->tags()->sync($this->new_tag_ids);
        }

        $this->resetInputFields();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('toast-success', ['message' => 'Post Updated Successfully.']);
    }
}
