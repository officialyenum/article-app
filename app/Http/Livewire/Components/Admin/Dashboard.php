<?php

namespace App\Http\Livewire\Components\Admin;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use Livewire\Component;

class Dashboard extends Component
{
    public $userCount;
    public $postCount;
    public $commentCount;
    public $roleCount;

    public function mount()
    {
        $this->userCount = User::count();
        $this->postCount = Post::count();
        $this->commentCount = Comment::count();
        $this->roleCount = Role::count();
    }

    public function render()
    {
        return view('livewire.components.admin.dashboard');
    }
}
