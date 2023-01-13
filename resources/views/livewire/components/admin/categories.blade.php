<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        @include('livewire.components.admin.modals.categories')
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
            <h1 class="h2">Categories</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <input
                        type="text"
                        class="form-control float-end mx-2"
                        value="{{ old('search') }}"
                        placeholder="Search"
                        wire:model="search"/>
                </div>
                <button type="button" class="btn btn-sm btn-outline-success" data-bs-target="#createCategoryModal" data-bs-toggle="modal">
                    Create Category
                </button>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-sm table-striped table-bordered">
                <thead class="bg-dark text-white">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Posts Count</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                        <td>{{ $category->id}}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->posts->count() }}</td>
                        <td>
                            <div class="btn-group me-2">
                                <button type="button" data-bs-toggle="modal" data-bs-target="#updateCategoryModal" class="btn btn-sm btn-outline-info" wire:click="edit({{ $category->id }})">Edit</button>
                                <button type="button"  data-bs-toggle="modal" data-bs-target="#deleteCategoryModal" class="btn btn-sm btn-outline-danger" wire:click="edit({{ $category->id }})">Delete</button>
                            </div>
                        </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $categories->links() }}
        </div>
    </main>
</div>

