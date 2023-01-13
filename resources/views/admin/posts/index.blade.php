@extends('layouts.admin')

@section('content')
    <div>
        <livewire:components.admin.posts />
    </div>
@endsection

@section('scripts')
    <script>
        window.addEventListener('close-modal', event => {
            $("#createPostModal").modal('hide');
            $("#updatePostModal").modal('hide');
            $("#deletePostModal").modal('hide');
            $("#restorePostModal").modal('hide')
        })
    </script>
@endsection
