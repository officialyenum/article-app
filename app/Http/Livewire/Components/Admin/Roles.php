<?php

namespace App\Http\Livewire\Components\Admin;

use App\Models\Role;
use Livewire\Component;
use Livewire\WithPagination;

class Roles extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';


    protected $roles;
    public $name, $search, $role_id;
    public $error;

    public function render()
    {
        return view('livewire.components.admin.roles',[
            'roles' => Role::where('name', 'like', '%'.$this->search.'%')
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
        $this->role_id = '';
    }

    public function store()
    {
        //set form validation rules
        $this->validate([
            'name' => 'required|min:3'
        ]);

        $role = Role::create([
            'name' => $this->name
        ]);

        if($role){
            //flash success message
            $this->dispatchBrowserEvent('toast-success', ['message' => 'You Successfully Created a Role']);
            //if user successfully created redirect to login page
            return redirect(route('admin.roles'));
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
        $role = Role::findOrFail($id);
        if ($role) {
            $this->role_id =  $role->id;
            $this->name = $role->name;
        }else{
            redirect()->to('/admin/roles');
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

        $role = Role::find($this->role_id);
        $role->update([
            'name' => $this->name
        ]);
        $this->dispatchBrowserEvent('toast-success', ['message' => 'You Successfully Updated a Role']);
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
        $this->dispatchBrowserEvent('toast-error', ['message' => 'You Cannot Delete role, Contact IT ;']);
        // Role::find($this->role_id)->delete();
        // session()->flash('message', 'Role Deleted Successfully.');
    }
}
