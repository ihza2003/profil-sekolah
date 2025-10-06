<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class InformasiPpdb
 *
 * Model untuk data informasi PPDB.
 *
 * @property string $banner_ppdb
 * @property string|null $gelombang
 * @property int $tahun
 * @property string|null $jam_operasional_hari
 * @property string|null $jam_operasional_jam
 * @property \Illuminate\Support\Carbon $tanggal_mulai
 * @property \Illuminate\Support\Carbon $tanggal_selesai
 * @property \Illuminate\Support\Carbon|null $tanggal_pengumuman
 * @property \Illuminate\Support\Carbon|null $tanggal_daftar_ulang_mulai
 * @property \Illuminate\Support\Carbon|null $tanggal_daftar_ulang_selesai
 * @property array $syarat_pendaftaran
 * @property array $prosedur_pendaftaran
 * @property string $kontak_wa
 * @property bool $status_aktif
 * @property int $admin_id
 */

class InformasiPpdb extends Model
{
    use HasFactory;
    protected $table = 'informasi_ppdbs';

    protected $fillable = [
        'banner_ppdb',
        'gelombang',
        'tahun',
        'jam_operasional_hari',
        'jam_operasional_jam',
        'tanggal_mulai',
        'tanggal_selesai',
        'tanggal_pengumuman',
        'tanggal_daftar_ulang_mulai',
        'tanggal_daftar_ulang_selesai',
        'syarat_pendaftaran',
        'prosedur_pendaftaran',
        'kontak_wa',
        'status_aktif',
        'admin_id',
    ];

    // Tipe casting (json & boolean)
    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
        'tanggal_pengumuman' => 'date',
        'tanggal_daftar_ulang_mulai' => 'date',
        'tanggal_daftar_ulang_selesai' => 'date',
        'syarat_pendaftaran' => 'array',
        'prosedur_pendaftaran' => 'array',
        'status_aktif' => 'boolean',
    ];

    // Relasi ke tabel admin (informasi dikelola oleh satu admin)
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    // Relasi ke tabel form_ppdb (satu informasi bisa memiliki banyak form ppdb)
    public function formPpdb()
    {
        return $this->hasMany(FormPPDB::class);
    }

    /**
     * Mengecek dan menghapus file jika ada di storage.
     */
    protected static function booted()
    {
        static::deleting(function ($record) {
            $files = [
                'banner_ppdb',
            ];

            foreach ($files as $field) {
                if ($record->$field && Storage::disk('public')->exists($record->$field)) {
                    Storage::disk('public')->delete($record->$field);
                }
            }
        });
    }
}
