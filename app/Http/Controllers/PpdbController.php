<?php

namespace App\Http\Controllers;

use App\Models\FormPPDB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\InformasiPpdb;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;


class PpdbController extends Controller
{
    // Menampilkan halaman informasi PPDB
    public function show_informasiPPDB()
    {
        $informasi_ppdb = InformasiPpdb::with('admin')->where('status_aktif', true)->first();
        return view('pages.ppdb.Ppdb', compact('informasi_ppdb'));
    }

    // Menampilkan halaman form PPDB
    public function formPPDB()
    {
        $informasi_ppdb = InformasiPpdb::with('admin')->where('status_aktif', true)->first();
        if (!$informasi_ppdb) {
            return view('pages.ppdb.Ppdb', compact('informasi_ppdb'));
        }
        return view('pages.ppdb.form_ppdb', compact('informasi_ppdb'));
    }

    // Menyimpan data user saat mengisi form PPDB
    public function store(Request $request)
    {
        $infoAktif = InformasiPpdb::where('status_aktif', true)->first();
        if (!$infoAktif) {
            return back()->with('error', 'Pendaftaran tidak tersedia saat ini.');
        }
        // Validasi
        $validator = Validator::make(
            $request->all(),
            [
                'no_pendaftaran' => 'nullable|string',
                'email' => 'required|email',
                'nama' => 'required|string',
                // 'nik' => 'required|string|size:16|unique:form_ppdb,nik',
                'nik' => [
                    'required',
                    'string',
                    'size:16',
                    Rule::unique('form_ppdb', 'nik')
                        ->where(fn($query) => $query->where('informasi_ppdb_id', $infoAktif->id)
                            ->where('status_verifikasi', '!=', 'ditolak')),
                ],
                'nisn' => 'required|string',
                'tempat_lahir' => 'required|string',
                'tanggal_lahir' => 'required|date',
                'jenis_kelamin' => 'required|string',
                'jenis_tinggal' => 'required|string',
                'alamat' => 'required|string',
                'hobby' => 'required|string',
                'cita' => 'required|string',
                'anak_keberapa' => 'required|integer',
                'berapa_saudara' => 'required|integer',
                'tinggi_badan' => 'required|integer',
                'berat_badan' => 'required|integer',
                'kebutuhan_khusus' => 'required|string',
                'jarak_sekolah' => 'required|string',
                'asal_sekolah' => 'required|string',
                'NPSN_AsalSekolah' => 'required|string',
                'alamat_asal_sekolah' => 'required|string',
                'SKHUN' => 'nullable|string',
                'no_un' => 'nullable|string',
                'tahun_kelulusan' => 'required|integer',
                'hp_siswa' => 'nullable|string',
                'no_kk' => 'nullable|string',
                'nik_ayah' => 'required|string|size:16',
                'nama_ayah' => 'required|string',
                'tempat_lahir_ayah' => 'required|string',
                'tgl_lahir_ayah' => 'required|date',
                'pendidikan_ayah' => 'required|string',
                'pekerjaan_ayah' => 'required|string',
                'penghasilan_ayah' => 'nullable|string',
                'hp_ayah' => 'required|string',
                'nik_ibu' => 'required|string|size:16',
                'nama_ibu' => 'required|string',
                'tempat_lahir_ibu' => 'required|string',
                'tgl_lahir_ibu' => 'required|date',
                'pendidikan_ibu' => 'required|string',
                'pekerjaan_ibu' => 'required|string',
                'penghasilan_ibu' => 'nullable|string',
                'hp_ibu' => 'required|string',
                'alamat_ortu' => 'required|string',
                'status_keluarga' => 'required|string',
                'nilai_kls4_smt1' => 'required|numeric',
                'nilai_kls4_smt2' => 'required|numeric',
                'nilai_kls5_smt1' => 'required|numeric',
                'nilai_kls5_smt2' => 'required|numeric',
                'nilai_kls6_smt1' => 'required|numeric',
                'nilai_kls6_smt2' => 'required|numeric',
                'nilai_ujian_sekolah' => 'required|numeric',
                'foto_3x4' => 'required|mimes:jpg,jpeg,png|max:10240',
                'skl' => 'nullable|mimes:pdf,jpg,jpeg,png|max:10240',
                'ijazah' => 'nullable|mimes:pdf,jpg,jpeg,png|max:10240',
                'kk' => 'required|mimes:pdf,jpg,jpeg,png|max:10240',
                'kia' => 'nullable|mimes:pdf,jpg,jpeg,png|max:1024',
                'kip' => 'nullable|mimes:pdf,jpg,jpeg,png|max:10240',
                'kis' => 'nullable|mimes:pdf,jpg,jpeg,png|max:10240',
            ],
            [
                'nik.unique' => 'NIK sudah pernah digunakan pada tahun ajaran ini.'
            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $uploadPath = 'dokumenppdb';

        // Foto 3x4
        $foto_3x4Name = 'foto3x4-' . Str::slug($request->nama) . '-' . now()->format('YmdHis') . '.' . $request->file('foto_3x4')->getClientOriginalExtension();
        $foto_3x4 = $request->file('foto_3x4')->storeAs($uploadPath, $foto_3x4Name, 'public');

        // SKL
        $sklName = $request->file('skl') ? 'skl-' . Str::slug($request->nama) . '-' . now()->format('YmdHis') . '.' . $request->file('skl')->getClientOriginalExtension() : null;
        $skl = $request->file('skl')?->storeAs($uploadPath, $sklName, 'public');

        // Ijazah
        $ijazahName = $request->file('ijazah') ? 'ijazah-' . Str::slug($request->nama) . '-' . now()->format('YmdHis') . '.' . $request->file('ijazah')->getClientOriginalExtension() : null;
        $ijazah = $request->file('ijazah')?->storeAs($uploadPath, $ijazahName, 'public');

        // Kartu Keluarga
        $kkName = 'kk-' . Str::slug($request->nama) . '-' . now()->format('YmdHis') . '.' . $request->file('kk')->getClientOriginalExtension();
        $kk = $request->file('kk')->storeAs($uploadPath, $kkName, 'public');

        // KIA
        $kiaName = $request->file('kia') ? 'kia-' . Str::slug($request->nama) . '-' . now()->format('YmdHis') . '.' . $request->file('kia')->getClientOriginalExtension() : null;
        $kia = $request->file('kia')?->storeAs($uploadPath, $kiaName, 'public');

        // KIP
        $kipName = $request->file('kip') ? 'kip-' . Str::slug($request->nama) . '-' . now()->format('YmdHis') . '.' . $request->file('kip')->getClientOriginalExtension() : null;
        $kip = $request->file('kip')?->storeAs($uploadPath, $kipName, 'public');

        // KIS
        $kisName = $request->file('kis') ? 'kis-' . Str::slug($request->nama) . '-' . now()->format('YmdHis') . '.' . $request->file('kis')->getClientOriginalExtension() : null;
        $kis = $request->file('kis')?->storeAs($uploadPath, $kisName, 'public');



        $noPendaftaran = 'PPDB-MASAMUJAYA-' . now()->format('YmdHis') . '-' . Str::random(5);

        FormPPDB::create([
            'no_pendaftaran' => $noPendaftaran,
            'informasi_ppdb_id' => $infoAktif->id,
            'email' => $request->email,
            'nama' => $request->nama,
            'nik' => $request->nik,
            'nisn' => $request->nisn,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'jenis_tinggal' => $request->jenis_tinggal,
            'alamat' => $request->alamat,
            'hobby' => $request->hobby,
            'cita' => $request->cita,
            'anak_keberapa' => $request->anak_keberapa,
            'berapa_saudara' => $request->berapa_saudara,
            'tinggi_badan' => $request->tinggi_badan,
            'berat_badan' => $request->berat_badan,
            'kebutuhan_khusus' => $request->kebutuhan_khusus,
            'jarak_sekolah' => $request->jarak_sekolah,
            'asal_sekolah' => $request->asal_sekolah,
            'NPSN_AsalSekolah' => $request->NPSN_AsalSekolah,
            'alamat_asal_sekolah' => $request->alamat_asal_sekolah,
            'SKHUN' => $request->SKHUN,
            'no_un' => $request->no_un,
            'tahun_kelulusan' => $request->tahun_kelulusan,
            'hp_siswa' => $request->hp_siswa,
            'no_kk' => $request->no_kk,
            'nik_ayah' => $request->nik_ayah,
            'nama_ayah' => $request->nama_ayah,
            'tempat_lahir_ayah' => $request->tempat_lahir_ayah,
            'tgl_lahir_ayah' => $request->tgl_lahir_ayah,
            'pendidikan_ayah' => $request->pendidikan_ayah,
            'pekerjaan_ayah' => $request->pekerjaan_ayah,
            'penghasilan_ayah' => $request->penghasilan_ayah,
            'hp_ayah' => $request->hp_ayah,
            'nik_ibu' => $request->nik_ibu,
            'nama_ibu' => $request->nama_ibu,
            'tempat_lahir_ibu' => $request->tempat_lahir_ibu,
            'tgl_lahir_ibu' => $request->tgl_lahir_ibu,
            'pendidikan_ibu' => $request->pendidikan_ibu,
            'pekerjaan_ibu' => $request->pekerjaan_ibu,
            'penghasilan_ibu' => $request->penghasilan_ibu,
            'hp_ibu' => $request->hp_ibu,
            'alamat_ortu' => $request->alamat_ortu,
            'status_keluarga' => $request->status_keluarga,
            'nilai_kls4_smt1' => $request->nilai_kls4_smt1,
            'nilai_kls4_smt2' => $request->nilai_kls4_smt2,
            'nilai_kls5_smt1' => $request->nilai_kls5_smt1,
            'nilai_kls5_smt2' => $request->nilai_kls5_smt2,
            'nilai_kls6_smt1' => $request->nilai_kls6_smt1,
            'nilai_kls6_smt2' => $request->nilai_kls6_smt2,
            'nilai_ujian_sekolah' => $request->nilai_ujian_sekolah,
            'foto_3x4' => $foto_3x4,
            'skl' => $skl,
            'ijazah' => $ijazah,
            'kk' => $kk,
            'kia' => $kia,
            'kip' => $kip,
            'kis' => $kis,
        ]);

        return redirect()->route('ppdb.form')
            ->with('success', 'Pendaftaran berhasil. Nomor Anda: ' . $noPendaftaran . ' ,Silahkan Copy no pendaftaran anda')
            ->with('no_pendaftaran', $noPendaftaran);
    }

    // Download bukti pendaftaran dalam format PDF
    public function downloadBukti($no_pendaftaran)
    {
        $data = FormPPDB::where('no_pendaftaran', $no_pendaftaran)->firstOrFail();

        $pdf = Pdf::loadView('pages.ppdb.bukti-pendaftaran', compact('data'));
        return $pdf->download('bukti-pendaftaran-' . $no_pendaftaran . '.pdf');
    }

    // Menampilkan halaman cek status pendaftaran
    public function cekStatusForm()
    {
        $informasi_ppdb = InformasiPpdb::with('admin')->where('status_aktif', true)->first();
        return view('pages.ppdb.cek-status', compact('informasi_ppdb'));
    }

    // Memproses pengecekan status pendaftaran berdasarkan nomor pendaftaran
    public function cekStatusSubmit(Request $request)
    {
        $request->validate([
            'no_pendaftaran' => 'required|string'
        ], [
            'no_pendaftaran.required' => 'Nomor Pendaftaran tidak boleh kosong.'
        ]);



        $data = FormPPDB::where('no_pendaftaran', $request->no_pendaftaran)->first();

        if (!$data) {
            return back()->withErrors(['no_pendaftaran' => 'Nomor pendaftaran tidak ditemukan']);
        }

        return view('pages.ppdb.hasil-status', compact('data'));
    }
}
