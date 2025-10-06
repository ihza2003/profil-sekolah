<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Bukti Pendaftaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            color: #000;
        }

        /* Kop Surat */
        .kop-surat {
            width: 100%;
            border-bottom: 2px solid #000;
            padding-bottom: 5px;
            margin-bottom: 10px;
        }

        .kop-logo {
            width: 90px;
            height: auto;
        }

        .kop-text {
            text-align: center;
            line-height: 1.4;
        }

        .kop-text h5 {
            margin: 0;
        }

        .kop-detail {
            font-size: 12px;
            margin-top: 2px;
        }

        /* Judul Dokumen */
        .judul {
            text-align: center;
            margin-bottom: 10px;
        }

        .judul h5 {
            font-size: 16px;
            font-weight: bold;
            margin: 0;
        }

        .judul .small {
            font-size: 12px;
            color: #555;
            margin-top: 5px;
        }

        /* Tabel Data */
        .table-borderless td,
        .table-borderless th {
            border: none !important;
        }

        .fs-5 {
            font-size: 1rem;
        }

        /* Foto */
        .foto {
            width: 90px;
            height: 120px;
            object-fit: cover;
            border: 1px solid #000;
        }

        .mt-3 {
            margin-top: 1rem;
        }

        /* Tanggal Cetak */
        .tanggal-cetak {
            margin-top: 1rem;
        }
    </style>
</head>

<body>
    {{-- Kop Surat --}}
    <table class="kop-surat">
        <tr>
            <td width="15%" align="start" valign="middle">
                <img src="{{ public_path('IMG/logo1.png') }}" alt="Logo" class="kop-logo">
            </td>
            <td width="85%" class="kop-text" valign="middle">
                <h5 style="font-size:14px;">MAJELIS PENDIDIKAN DASAR DAN MENENGAH</h5>
                <h5 style="font-size:14px;">PIMPINAN DAERAH MUHAMMADIYAH KOTA JAYAPURA</h5>
                <h5 style="font-size:16px;">MTs MUHAMMADIYAH JAYAPURA</h5>
                @if($profil)
                <div class="kop-detail">
                    NSM : {{$profil->nsm}} | NPSN : {{$profil->npsn}}<br>
                    {{$profil->alamat}}<br>
                    Telp. {{$profil->telepon}}, Email: {{$profil->email}}
                </div>
                @else
                <div class="kop-detail">
                    NSM : 121291710007 | NPSN : 60729794<br>
                    Kompleks UM Papua, Jl. Abepantai No.25, Awiyo, Kec. Abepura, Kota Jayapura, Papua 99351<br>
                    Telp. 08114833444, Email: masamujaya@gmail.com
                </div>
                @endif
            </td>
            <td width="15%" align="start" valign="middle"></td>
        </tr>
    </table>

    {{-- Judul Dokumen --}}
    <div class="judul">
        <h5>BUKTI PENDAFTARAN PPDB</h5>
        <div class="small">Simpan dan cetak dokumen ini sebagai bukti pendaftaran resmi</div>
    </div>

    {{-- Data Pendaftar --}}
    <div class="d-flex justify-content-between">
        <table class="table table-borderless" style="line-height:1.4;">
            <tbody>
                <tr>
                    <td class="fw-bold fs-5" width="40%">Nomor Pendaftaran</td>
                    <td>: {{ $data->no_pendaftaran }}</td>
                </tr>
                <tr>
                    <td class="fw-bold fs-5">Nama Lengkap</td>
                    <td>: {{ $data->nama }}</td>
                </tr>
                <tr>
                    <td class="fw-bold fs-5">NIK</td>
                    <td>: {{ $data->nik }}</td>
                </tr>
                <tr>
                    <td class="fw-bold fs-5">NISN</td>
                    <td>: {{ $data->nisn }}</td>
                </tr>
                <tr>
                    <td class="fw-bold fs-5">Asal Sekolah</td>
                    <td>: {{ $data->asal_sekolah }}</td>
                </tr>
                <tr>
                    <td class="fw-bold fs-5">Alamat</td>
                    <td>: {{ $data->alamat }}</td>
                </tr>
            </tbody>
        </table>

        @if($data->foto_3x4)
        <div class="mt-3">
            <img src="{{ public_path('storage/' . $data->foto_3x4) }}" class="foto" alt="Pas Foto">
        </div>
        @endif
    </div>

    {{-- Tanggal Cetak --}}
    <div class="tanggal-cetak">
        <div class="fw-bold">Tanggal Cetak:</div>
        <div>{{ \Carbon\Carbon::now()->format('d-m-Y H:i') }}</div>
    </div>
</body>

</html>