
@extends('layout-cv')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold">Daftar Biodata</h3>
    <a href="{{ route('biodata.create') }}"
       class="btn btn-primary">
        + Tambah Biodata
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($biodatas as $biodata)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        @if($biodata->foto)
                            <img src="{{ asset('storage/'.$biodata->foto) }}"
                                 width="55" height="55"
                                 class="rounded-circle"
                                 style="object-fit:cover">
                        @else
                            Belum ada
                        @endif
                    </td>
                    <td>{{ $biodata->nama }}</td>
                    <td>{{ $biodata->nim }}</td>
                    <td>{{ $biodata->email }}</td>
                    <td>
                        <a href="{{ route('biodata.show', $biodata->id) }}"
                           class="btn btn-info btn-sm">CV</a>
                        <a href="{{ route('biodata.edit', $biodata->id) }}"
                           class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('biodata.destroy', $biodata->id) }}"
                              method="POST" class="d-inline"
                              onsubmit="return confirm('Yakin hapus biodata?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-4">
                        Belum ada biodata.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
