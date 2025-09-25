<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InformasiPpdb extends Model
{
    use HasFactory;

    // Nama tabel (opsional, bisa dihapus jika sudah sesuai konvensi)
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

    // Relasi ke tabel Admin
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function formPpdb()
    {
        return $this->hasMany(FormPPDB::class);
    }

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
