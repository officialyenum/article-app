<?php

namespace App\Http\Livewire\Components\Admin;

use App\Models\Tag;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class Tags extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';


    protected $tags;
    public $name, $search, $tag_id;
    public $error;

    public function render()
    {
        return view('livewire.components.admin.tags',[
            'tags' => Tag::where('name', 'like', '%'.$this->search.'%')
                            ->orderBy('id','DESC')->paginate(5),
        ]);
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields(){
        $this->name = '';
        $this->tag_id = '';
    }

    public function store()
    {
        //set form validation rules
        $this->validate([
            'name' => 'required|min:3'
        ]);

        $tag = Tag::create([
            'name' => $this->name,
            'slug' => Str::slug($this->name)
        ]);

        if($tag){
            //flash success message
            $this->dispatchBrowserEvent('toast-success', ['message' => 'You Successfully Created Tag']);

            //if user successfully created redirect to login page
            return redirect(route('admin.categories'));
        }else{
            $this->dispatchBrowserEvent('toast-error', ['message' => "Something went wrong"]);
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
        $tag = Tag::findOrFail($id);
        if ($tag) {
            $this->tag_id =  $tag->id;
            $this->name = $tag->name;
        }else{
            redirect()->to('/admin/categories');
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
            'name' => 'required|min:3'
        ]);

        $tag = Tag::find($this->tag_id);
        $tag->update([
            'name' => $this->name,
            'slug' => Str::slug($this->name)
        ]);

        $this->dispatchBrowserEvent('toast-success', ['message' => "Tag Updated Successfully."]);

        $this->resetInputFields();
        $this->dispatchBrowserEvent('close-modal');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete()
    {
        Tag::find($this->tag_id)->delete();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('toast-success', ['message' => "Tag Deleted Successfully."]);
    }
}
