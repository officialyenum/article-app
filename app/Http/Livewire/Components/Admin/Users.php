<?php

namespace App\Http\Livewire\Components\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Repositories\MediaRepo;
use Illuminate\Support\Facades\Hash;

class Users extends Component
{
    use WithPagination;
    use WithFileUploads;

    protected $paginationTheme = 'bootstrap';

    protected $users;
    public $first_name, $last_name, $email, $password, $role_id, $user_id, $avatar, $newAvatar;
    public $updateMode = false;
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
        return view('livewire.components.admin.users', [
            'users' => User::where('first_name', 'like', '%'.$this->search.'%')
                            ->orWhere('last_name', 'like', '%'.$this->search.'%')
                            ->orWhere('email', 'like', '%'.$this->search.'%')
                            ->orderBy('id','DESC')->paginate(5),
        ]);
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields(){
        $this->first_name = '';
        $this->last_name = '';
        $this->email = '';
        $this->password = '';
        $this->role_id = '';
        $this->avatar = '';
        $this->newAvatar = '';
    }

    public function store()
    {
        //set form validation rules
        $this->validate([
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'avatar' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:1024',
        ]);

        //hash password
        $hashPass = Hash::make($this->password);
        $user = new User();
        $user->first_name = $this->first_name;
        $user->last_name = $this->last_name;
        $user->email = $this->email;
        $user->password = $hashPass;
        $user->save();

        if($this->avatar){
            //Save Avatar Media
            $this->mediaRepo->storeAvatar($user, $this->avatar, 'image','user avatar', 'blog_app');
            $this->dispatchBrowserEvent('toast-success', ['message' => "Avatar Uploaded Successfully."]);
        }


        if($user){
            //flash success message
            $this->dispatchBrowserEvent('toast-success', ['message' => "User Created Successfully."]);
            //if user successfully created redirect to login page
            return redirect(route('admin.users'));
        }else{
            //flash error message
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
        $user = User::findOrFail($id);
        if ($user) {
            $this->user_id =  $user->id;
            $this->first_name = $user->first_name;
            $this->last_name = $user->last_name;
            $this->newAvatar = $user->avatar->url ?? "";
        }else{
            redirect()->to('/admin/users');
        }
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function cancel()
    {
        $this->updateMode = false;
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
            'first_name' => 'min:3',
            'last_name' => 'min:3',
            'avatar' => 'image|mimes:jpg,png,jpeg,gif,svg|max:1024'
        ]);

        $user = User::find($this->user_id);
        $user->first_name = $this->first_name;
        $user->last_name = $this->last_name;

        $user->save();
        //Save Media
        if($this->avatar){
            $this->mediaRepo->storeAvatar($user, $this->avatar, 'image','user avatar', 'blog_app');
            $this->dispatchBrowserEvent('toast-success', ['message' => "Avatar Uploaded Successfully."]);
        }

        //flash success message
        $this->dispatchBrowserEvent('toast-success', ['message' => "User Updated Successfully."]);

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
        User::find($this->user_id)->delete();
        session()->flash('message', 'User Deleted Successfully.');
    }
}
