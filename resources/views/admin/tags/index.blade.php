@extends('layouts.admin')

@section('content')
    <div>
        <livewire:components.admin.tags />
    </div>
@endsection

@section('scripts')
    <script>
        window.addEventListener('close-modal', event => {
            $("#createTagModal").modal('hide');
            $("#updateTagModal").modal('hide');
            $("#deleteTagModal").modal('hide')
        })
    </script>
@endsection
