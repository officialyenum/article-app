<?php

namespace App\Http\Livewire\Components\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Header extends Component
{
    public function render()
    {
        return view('livewire.components.admin.header');
    }

    public function userLogout()
    {
        Auth::logout();

        $this->dispatchBrowserEvent('toast-success', ['message' => 'You are logged out Successfully!!']);
        return redirect(route('login'));
    }
}
