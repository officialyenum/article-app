<?php

namespace App\Http\Livewire\Components\Posts;

use App\Models\Comment;
use App\Models\Post;
use App\Notifications\NewCommentAdded;
use Livewire\Component;
use Livewire\WithPagination;

class PostShow extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public Post $post;
    public $content;

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields(){
        $this->content = '';
    }

    public function render()
    {
        return view('livewire.components.posts.post-show',[
            'comments' => Comment::where('post_id',$this->post->id)
                    ->orderBy('id','DESC')->paginate(5)
        ]);
    }

    public function storeComment()
    {
        $this->validate([
            'content' => 'required',
        ]);

        $comment = new Comment();
        $comment->content = $this->content;
        $comment->user_id = auth()->user()->id;
        $comment->post_id = $this->post->id;
        $comment->save();

        if($comment){
            if ($this->post->user->id !== auth()->user()->id) {
                $this->post->user->notify(new NewCommentAdded($this->post));
            }
            //flash success message
            $this->dispatchBrowserEvent('close-modal');
            $this->dispatchBrowserEvent('toast-success', ['message' => 'Comment Posted Successfully']);
        }

        $this->resetInputFields();

    }
}
