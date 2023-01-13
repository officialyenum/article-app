@extends('layouts.app')

@section('content')
    @livewire('components.users.profile')
@endsection


@section('scripts')
    <script>
        window.addEventListener('close-modal', event => {
            $("#updateCommentModal").modal('hide');
            $("#deleteCommentModal").modal('hide')
        })

        window.addEventListener('toast-success', event => {
            $("#updateCommentModal").modal('hide');
            $("#deleteCommentModal").modal('hide')
        });
        window.addEventListener('toast-error', event => {
            $("#updateCommentModal").modal('hide');
            $("#deleteCommentModal").modal('hide')
        })
    </script>
@endsection
