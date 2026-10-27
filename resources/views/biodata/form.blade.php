@csrf

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Nama Lengkap</label>
        <input type="text" name="nama" class="form-control"
            value="{{ old('nama', $biodata->nama ?? '') }}" required>
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">NIM</label>
        <input type="text" name="nim" class="form-control"
            value="{{ old('nim', $biodata->nim ?? '') }}" required>
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control"
            value="{{ old('email', $biodata->email ?? '') }}" required>
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">No HP</label>
        <input type="text" name="no_hp" class="form-control"
            value="{{ old('no_hp', $biodata->no_hp ?? '') }}" required>
    </div>

    <div class="col-12 mb-3">
        <label class="form-label">Alamat</label>
        <textarea name="alamat" class="form-control"
            required>{{ old('alamat', $biodata->alamat ?? '') }}</textarea>
    </div>

    <div class="col-12 mb-3">
        <label class="form-label">Pendidikan</label>
        <input type="text" name="pendidikan" class="form-control"
            value="{{ old('pendidikan', $biodata->pendidikan ?? '') }}" required>
    </div>

    <div class="col-12 mb-3">
        <label class="form-label">Tentang Saya</label>
        <textarea name="deskripsi" class="form-control"
            rows="4" required>{{ old('deskripsi', $biodata->deskripsi ?? '') }}</textarea>
    </div>
    <div class="col-12 mb-3">
        <label class="form-label">Pengalaman Organisasi</label>

        <textarea name="pengalaman"
            class="form-control"
            rows="5"
            placeholder="Masukkan pengalaman organisasi...">{{ old('pengalaman', $biodata->pengalaman ?? '') }}</textarea>
    </div>

    <div class="col-12 mb-3">
        <label class="form-label">Tujuan Karier</label>

        <textarea name="tujuan_karier"
            class="form-control"
            rows="4"
            placeholder="Masukkan tujuan karier...">{{ old('tujuan_karier', $biodata->tujuan_karier ?? '') }}</textarea>
    </div>

    <div class="col-12 mb-3">
        <label class="form-label">Foto Profil</label>
        <input type="file" name="foto" class="form-control"
            accept=".jpg,.jpeg,.png">

        @if(isset($biodata) && $biodata->foto)
        <img src="{{ asset('storage/'.$biodata->foto) }}"
            width="100" class="rounded mt-3">
        <p class="text-muted small mt-1">
            Kosongkan kalau tidak mau mengganti foto.
        </p>
        @endif
    </div>
</div>

@if($errors->any())
<div class="alert alert-danger">
    @foreach($errors->all() as $error)
    <div>{{ $error }}</div>
    @endforeach
</div>
@endif

<button type="submit" class="btn btn-primary">
    Simpan Biodata
</button>
<a href="{{ route('biodata.index') }}"
    class="btn btn-secondary">
    Kembali
</a>