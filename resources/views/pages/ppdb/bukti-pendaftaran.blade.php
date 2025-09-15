<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Bukti Pendaftaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        <style>body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        .fw-bold {
            font-weight: bold;
        }

        .text-center {
            text-align: center;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table-borderless td,
        .table-borderless th {
            border: none !important;
        }

        .mb-3 {
            margin-bottom: 1rem;
        }

        .p-3 {
            padding: 1rem;
        }

        .rounded {
            border-radius: 0.25rem;
        }

        .fs-3 {
            font-size: 1.75rem;
        }

        .fs-4 {
            font-size: 1.1rem;
        }

        .mt-3 {
            margin-top: 1rem;
        }

        .foto {
            width: 90px;
            height: 120px;
            object-fit: cover;
            border: 1px solid #000;
        }

        .d-flex {
            display: flex;
        }

        .justify-content-between {
            justify-content: space-between;
        }
    </style>

    </style>
</head>

<body>
    <div class="border p-3 rounded">
        <div class="text-center mb-3">
            <h5 class="fw-bold mb-1 fs-3">BUKTI PENDAFTARAN PPDB</h5>
            <div class="small text-muted">Simpan dan cetak dokumen ini sebagai bukti pendaftaran resmi</div>
        </div>

        <div class="d-flex justify-content-between">
            <table class="table table-borderless ">
                <tbody>
                    <tr>
                        <td class="fw-bold fs-4" width="40%">Nomor Pendaftaran</td>
                        <td>: {{ $data->no_pendaftaran }}</td>
                    </tr>
                    <tr>
                        <td class="fw-bold fs-4">Nama Lengkap</td>
                        <td>: {{ $data->nama }}</td>
                    </tr>
                    <tr>
                        <td class="fw-bold fs-4">NIK</td>
                        <td>: {{ $data->nik }}</td>
                    </tr>
                    <tr>
                        <td class="fw-bold fs-4">NISN</td>
                        <td>: {{ $data->nisn }}</td>
                    </tr>
                    <tr>
                        <td class="fw-bold fs-4">Asal Sekolah</td>
                        <td>: {{ $data->asal_sekolah }}</td>
                    </tr>
                </tbody>
            </table>

            @if($data->foto_3x4)
            <div class="mt-3">
                <img src="{{ public_path('storage/' . $data->foto_3x4) }}" class="foto" alt="Pas Foto">
            </div>
            @endif
        </div>

        <div class="mt-3">
            <div class="fw-bold">Tanggal Cetak:</div>
            <div>{{ \Carbon\Carbon::now()->format('d-m-Y H:i') }}</div>
        </div>
    </div>

</body>

</html>