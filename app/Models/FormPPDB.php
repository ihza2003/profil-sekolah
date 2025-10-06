<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class FormPpdb
 *
 * Model untuk data formulir PPDB.
 * 
 * @property string $no_pendaftaran
 * @property int $informasi_ppdb_id
 * @property string $email
 * @property string $nama
 * @property string $nik
 * @property string $nisn
 * @property string $tempat_lahir
 * @property \Illuminate\Support\Carbon $tanggal_lahir
 * @property string $jenis_kelamin
 * @property string $jenis_tinggal
 * @property string $alamat
 *
 * @property string $hobby
 * @property string $cita
 * @property int $anak_keberapa
 * @property int $berapa_saudara
 * @property int $tinggi_badan
 * @property int $berat_badan
 * @property string $kebutuhan_khusus
 * @property string $jarak_sekolah
 *
 * @property string $asal_sekolah
 * @property string $NPSN_AsalSekolah
 * @property string $alamat_asal_sekolah
 * @property string|null $SKHUN
 * @property string|null $no_un
 * @property int $tahun_kelulusan
 * @property string|null $hp_siswa
 *
 * @property string|null $no_kk
 * @property string $nik_ayah
 * @property string $nama_ayah
 * @property string $tempat_lahir_ayah
 * @property \Illuminate\Support\Carbon $tgl_lahir_ayah
 * @property string $pendidikan_ayah
 * @property string $pekerjaan_ayah
 * @property string|null $penghasilan_ayah
 * @property string $hp_ayah
 *
 * @property string $nik_ibu
 * @property string $nama_ibu
 * @property string $tempat_lahir_ibu
 * @property \Illuminate\Support\Carbon $tgl_lahir_ibu
 * @property string $pendidikan_ibu
 * @property string $pekerjaan_ibu
 * @property string|null $penghasilan_ibu
 * @property string $hp_ibu
 *
 * @property string $alamat_ortu
 * @property string $status_keluarga
 *
 * @property float $nilai_kls4_smt1
 * @property float $nilai_kls4_smt2
 * @property float $nilai_kls5_smt1
 * @property float $nilai_kls5_smt2
 * @property float $nilai_kls6_smt1
 * @property float $nilai_kls6_smt2
 * @property float $nilai_ujian_sekolah
 *
 * @property string $foto_3x4
 * @property string|null $skl
 * @property string|null $ijazah
 * @property string $kk
 * @property string|null $kia
 * @property string|null $kip
 * @property string|null $kis
 *
 * @property string $status_verifikasi
 * @property string $status_kelulusan
 * @property int $informasi_ppdb_id
 * @property int|null $admin_id
 */

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
     * Relasi ke admin yang menginputkan data PPDB.
     */
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    /**
     * Mengecek dan menghapus file jika ada di storage.
     */

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
