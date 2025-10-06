<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Prestasi
 *
 * Model untuk data prestasi sekolah.
 *
 * @property string $judul
 * @property string $isi
 * @property string $gambar
 * @property string|null $gambar_tambahan
 * @property int $admin_id
 */

class Prestasi extends Model
{
    use HasFactory;
    protected $table = 'prestasi';

    protected $fillable = [
        'judul',
        'isi',
        'gambar',
        'gambar_tambahan',
        'admin_id',
    ];

    /**
     * Relasi ke admin yang menginputkan prestasi.
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
                'gambar',
                'gambar_tambahan',
            ];

            foreach ($files as $field) {
                if ($record->$field && Storage::disk('public')->exists($record->$field)) {
                    Storage::disk('public')->delete($record->$field);
                }
            }
        });
    }
}
