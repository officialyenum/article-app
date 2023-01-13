<?php

namespace App\Http\Livewire\Components\Admin;

use App\Models\Comment;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class Comments extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';


    protected $comments;
    public $content, $search, $comment_id;
    public $error;

    public function render()
    {
        return view('livewire.components.admin.comments',[
            'comments' => Comment::where('content', 'like', '%'.$this->search.'%')
                            ->orderBy('id','DESC')->paginate(5),
        ]);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields(){
        $this->content = '';
        $this->comment_id = '';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        $comment = Comment::findOrFail($id);
        if ($comment) {
            $this->comment_id =  $comment->id;
            $this->content = $comment->content;
        }else{
            redirect()->to('/admin/comments');
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
            'content' => 'required|min:3'
        ]);

        $comment = Comment::find($this->comment_id);
        $comment->update([
            'content' => $this->content
        ]);

        $this->resetInputFields();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('toast-success', ['message' => 'You Successfully Updated a Comment.']);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete()
    {
        Comment::find($this->comment_id)->delete();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('toast-success', ['message' => 'You Successfully Deleted a Comment.']);
    }
}
