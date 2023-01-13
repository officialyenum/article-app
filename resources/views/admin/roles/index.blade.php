@extends('layouts.admin')

@section('content')
    <div>
        <livewire:components.admin.roles />
    </div>
@endsection

@section('scripts')
    <script>
        window.addEventListener('close-modal', event => {
            $("#createRoleModal").modal('hide');
            $("#updateRoleModal").modal('hide');
            $("#deleteRoleModal").modal('hide')
        })
    </script>
@endsection
