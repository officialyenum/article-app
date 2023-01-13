<?php

namespace App\Http\Livewire\Components\Admin;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class Categories extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';


    protected $categories;
    public $name, $search, $category_id;
    public $error;

    public function render()
    {
        return view('livewire.components.admin.categories',[
            'categories' => Category::where('name', 'like', '%'.$this->search.'%')
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
        $this->category_id = '';
    }

    public function store()
    {
        //set form validation rules
        $this->validate([
            'name' => 'required|min:3'
        ]);

        $category = Category::create([
            'name' => $this->name,
            'slug' => Str::slug($this->name)
        ]);

        if($category){
            //flash success message
            $this->dispatchBrowserEvent('toast-success', ['message' => 'You Successfully Created a Category.']);
            //if user successfully created redirect to login page
            return redirect(route('admin.categories'));
        }
        // else return error
        return $this->error = "Something went wrong";

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
        $category = Category::findOrFail($id);
        if ($category) {
            $this->category_id =  $category->id;
            $this->name = $category->name;
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

        $category = Category::find($this->category_id);
        $category->update([
            'name' => $this->name,
            'slug' => Str::slug($this->name)
        ]);

        $this->dispatchBrowserEvent('toast-success', ['message' => 'You Successfully Updated a Category.']);

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
        Category::find($this->category_id)->delete();
        $this->dispatchBrowserEvent('toast-success', ['message' => 'You Successfully Deleted a Category.']);
        $this->dispatchBrowserEvent('close-modal');
    }
}

