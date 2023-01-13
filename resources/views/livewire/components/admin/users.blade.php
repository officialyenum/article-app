<div>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        @include('livewire.components.admin.modals.users')
        @if (Session::has('success'))
            <p class="alert alert-success my-2">
                <strong>{{ Session::get('success') }}</strong>
            </p>
        @endif
        @if ($error)
            <p class="alert alert-danger my-2">
                <strong>{{ $error }}</strong>
            </p>
        @endif
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Users</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <input
                        type="text"
                        class="form-control float-end mx-2"
                        value="{{ old('search') }}"
                        placeholder="Search"
                        wire:model="search"/>
                </div>
                <button type="button" class="btn btn-sm btn-outline-success" data-bs-target="#createUserModal" data-bs-toggle="modal">
                    Create User
                </button>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-sm table-striped table-bordered">
                <thead class="bg-dark text-white">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Avatar</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                        <td>{{ $user->id}}</td>
                        <td>
                            <img src="{{ $user->avatar->url ?? "#" }}" class="rounded-circle shadow-4" style="width: 50px;height: 50px" alt="{{$user->avatar->title ?? "..."}}">
                        </td>
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->last_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role->name }}</td>
                        <td>
                            <div class="btn-group me-2">
                                <button type="button" data-bs-toggle="modal" data-bs-target="#updateUserModal" class="btn btn-sm btn-outline-info" wire:click="edit({{ $user->id }})">Edit</button>
                                <button type="button"  data-bs-toggle="modal" data-bs-target="#deleteUserModal" class="btn btn-sm btn-outline-danger" wire:click="edit({{ $user->id }})">Delete</button>
                            </div>
                        </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $users->links() }}
        </div>
    </main>
</div>
