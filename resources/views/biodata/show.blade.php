@extends('layout-cv')

@section('content')

<style>
    .cv-paper {
        max-width: 900px;
        margin: auto;
        display: grid;
        grid-template-columns: 32% 68%;
        background: white;
        min-height: 1050px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, .12);
        overflow: hidden;
    }

    .cv-sidebar {
        background: #17324f;
        color: white;
        padding: 35px 25px;
    }

    .cv-photo {
        width: 155px;
        height: 155px;
        border-radius: 50%;
        object-fit: cover;
        border: 5px solid white;
        display: block;
        margin: 0 auto 30px;
    }

    .cv-sidebar h5 {
        font-size: 17px;
        border-bottom: 2px solid #65b5dd;
        padding-bottom: 10px;
        margin-top: 30px;
        margin-bottom: 15px;
        font-weight: bold;
        text-transform: uppercase;
    }

    .cv-sidebar p {
        font-size: 13px;
        line-height: 1.8;
        overflow-wrap: anywhere;
    }

    .cv-main {
        padding: 55px 45px;
        color: #263447;
        min-width: 0;
    }

    .cv-name {
        font-size: 36px;
        font-weight: 800;
        color: #17324f;
        text-transform: uppercase;
        line-height: 1.2;
        overflow-wrap: anywhere;
    }

    .cv-subtitle {
        color: #5687a7;
        font-size: 16px;
        letter-spacing: 3px;
        margin-top: 10px;
    }

    .cv-section {
        margin-top: 45px;
    }

    .cv-section h4 {
        font-size: 19px;
        font-weight: bold;
        color: #17324f;
        border-bottom: 2px solid #17324f;
        padding-bottom: 10px;
        margin-bottom: 20px;
        text-transform: uppercase;
    }

    .cv-section p {
        line-height: 1.9;
        font-size: 14px;
        white-space: pre-line;
        overflow-wrap: anywhere;
    }

    .cv-education {
        border-left: 3px solid #5687a7;
        padding-left: 20px;
    }

    .cv-actions {
        max-width: 900px;
        margin: 0 auto 25px;
    }

    @media (max-width: 650px) {
        .cv-paper {
            grid-template-columns: 1fr;
        }

        .cv-main {
            padding: 35px 25px;
        }

        .cv-name {
            font-size: 28px;
        }
    }

    @media print {
        @page {
            size: A4;
            margin: 0;
        }

        body {
            background: white !important;
        }

        .navbar,
        .cv-actions {
            display: none !important;
        }

        main.container {
            padding: 0 !important;
            margin: 0 !important;
            max-width: none !important;
        }

        .cv-paper {
            width: 100%;
            max-width: none;
            min-height: 297mm;
            box-shadow: none;
            grid-template-columns: 32% 68%;
            print-color-adjust: exact;
            -webkit-print-color-adjust: exact;
        }
    }
</style>

<div class="cv-actions d-flex gap-2 flex-wrap">
    <a href="{{ route('biodata.index') }}"
        class="btn btn-secondary">
        Kembali
    </a>

    <a href="{{ route('biodata.edit', $biodata->id) }}"
        class="btn btn-warning">
        Edit CV
    </a>

    <button onclick="window.print()" class="btn btn-primary">
        Cetak / Simpan PDF
    </button>
</div>

<div class="cv-paper">

    <!-- SIDEBAR KIRI -->
    <aside class="cv-sidebar">

        @if($biodata->foto)
        <img src="{{ asset('storage/'.$biodata->foto) }}"
            class="cv-photo" alt="Foto Profil">
        @else
        <div class="text-center mb-4">
            Foto belum tersedia
        </div>
        @endif

        <h5>Kontak</h5>

        <p>
            <strong>Email</strong><br>
            {{ $biodata->email }}
        </p>

        <p>
            <strong>Telepon</strong><br>
            {{ $biodata->no_hp }}
        </p>

        <p>
            <strong>Alamat</strong><br>
            {{ $biodata->alamat }}
        </p>

        <h5>Informasi Pribadi</h5>

        <p>
            <strong>NIM</strong><br>
            {{ $biodata->nim }}
        </p>

        <p>
            <strong>Status</strong><br>
            Mahasiswa
        </p>

        <h5>Keahlian</h5>

        <p>• Kerja Sama Tim</p>
        <p>• Bertanggung Jawab</p>
        <p>• Konsisten</p>
        <p>• Komunikasi</p>

    </aside>

    <!-- BAGIAN KANAN -->
    <div class="cv-main">

        <div>
            <h1 class="cv-name">
                {{ $biodata->nama }}
            </h1>

            <div class="cv-subtitle">
                MAHASISWA TEKNIK INFORMATIKA
            </div>
        </div>

        <section class="cv-section">
            <h4>Profil Saya</h4>

            <p>{{ $biodata->deskripsi }}</p>
        </section>

        <section class="cv-section">
            <h4>Riwayat Pendidikan</h4>

            <div class="cv-education">
                <h6 class="fw-bold">
                    {{ $biodata->pendidikan }}
                </h6>
                <p>Riwayat pendidikan saat ini</p>
            </div>
        </section>

        <section class="cv-section">
            <h4>Pengalaman Organisasi</h4>

            <p>{{ $biodata->pengalaman ?: 'Belum ada pengalaman organisasi.' }}</p>
        </section>

        <section class="cv-section">
            <h4>Tujuan Karier</h4>

            <p>{{ $biodata->tujuan_karier ?: 'Belum ada tujuan karier.' }}</p>
        </section>

    </div>
</div>

@endsection