
@extends('layout-cv')

@section('content')
<div class="card shadow-sm">
    <div class="card-body p-4">
        <h3 class="fw-bold mb-4">Edit Biodata</h3>

        <form action="{{ route('biodata.update', $biodata->id) }}"
              method="POST" enctype="multipart/form-data">
            @method('PUT')
            @include('biodata.form')
        </form>
    </div>
</div>
@endsection
