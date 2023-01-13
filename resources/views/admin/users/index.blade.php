@extends('layouts.admin')

@section('content')
    <div>
        <livewire:components.admin.users />
    </div>
@endsection

@section('scripts')
    <script>
        window.addEventListener('close-modal', event => {
            $("#createUserModal").modal('hide');
            $("#updateUserModal").modal('hide');
            $("#deleteUserModal").modal('hide')
        })
    </script>
@endsection
