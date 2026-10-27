
@extends('layout-cv')

@section('content')
<div class="card shadow-sm">
    <div class="card-body p-4">
        <h3 class="fw-bold mb-4">Tambah Biodata</h3>

        <form action="{{ route('biodata.store') }}"
              method="POST" enctype="multipart/form-data">
            @include('biodata.form')
        </form>
    </div>
</div>
@endsection
