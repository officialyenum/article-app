@extends('layouts.admin')

@section('content')
    <div>
        <livewire:components.admin.categories />
    </div>
@endsection

@section('scripts')
    <script>
        window.addEventListener('close-modal', event => {
            $("#createCategoryModal").modal('hide');
            $("#updateCategoryModal").modal('hide');
            $("#deleteCategoryModal").modal('hide')
        })
    </script>
@endsection
