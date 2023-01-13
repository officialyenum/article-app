@extends('layouts.admin')

@section('content')
    <div>
        <livewire:components.admin.comments />
    </div>
@endsection

@section('scripts')
    <script>
        window.addEventListener('close-modal', event => {
            $("#updateCommentModal").modal('hide');
            $("#deleteCommentModal").modal('hide')
        })
    </script>
@endsection
