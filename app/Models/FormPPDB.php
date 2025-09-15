<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FormPPDB extends Model
{
    use HasFactory;

    protected $table = 'form_ppdb';

    protected $fillable = [
        'no_pendaftaran',
        'informasi_ppdb_id',
        'email',
        'nama',
        'nik',
        'nisn',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'jenis_tinggal',
        'alamat',

        // Data Periodik
        'hobby',
        'cita',
        'anak_keberapa',
        'berapa_saudara',
        'tinggi_badan',
        'berat_badan',
        'kebutuhan_khusus',
        'jarak_sekolah',

        // Asal Sekolah
        'asal_sekolah',
        'NPSN_AsalSekolah',
        'alamat_asal_sekolah',
        'SKHUN',
        'no_un',
        'tahun_kelulusan',
        'hp_siswa',

        // Data Ayah
        'no_kk',
        'nik_ayah',
        'nama_ayah',
        'tempat_lahir_ayah',
        'tgl_lahir_ayah',
        'pendidikan_ayah',
        'pekerjaan_ayah',
        'penghasilan_ayah',
        'hp_ayah',

        // Data Ibu
        'nik_ibu',
        'nama_ibu',
        'tempat_lahir_ibu',
        'tgl_lahir_ibu',
        'pendidikan_ibu',
        'pekerjaan_ibu',
        'penghasilan_ibu',
        'hp_ibu',

        // Alamat Orang Tua dan Status
        'alamat_ortu',
        'status_keluarga',

        // Nilai Raport dan Ujian
        'nilai_kls4_smt1',
        'nilai_kls4_smt2',
        'nilai_kls5_smt1',
        'nilai_kls5_smt2',
        'nilai_kls6_smt1',
        'nilai_kls6_smt2',
        'nilai_ujian_sekolah',

        // Dokumen
        'foto_3x4',
        'skl',
        'ijazah',
        'kk',
        'kia',
        'kip',
        'kis',

        // Status
        'status_verifikasi',
        'status_kelulusan',

        'admin_id'
    ];

    /**
     * Relasi ke Informasi PPDB
     */
    public function informasiPpdb()
    {
        return $this->belongsTo(InformasiPpdb::class);
    }

    /**
     * Relasi ke Admin (opsional)
     */
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    protected static function booted()
    {
        static::deleting(function ($record) {
            $files = [
                'foto_3x4',
                'skl',
                'ijazah',
                'kk',
                'kia',
                'kip',
                'kis',
            ];

            foreach ($files as $field) {
                if ($record->$field && Storage::disk('public')->exists($record->$field)) {
                    Storage::disk('public')->delete($record->$field);
                }
            }
        });
    }
}
