<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Ekskul
 *
 * Model untuk data ekstrakurikuler sekolah.
 *
 * @property string $judul
 * @property string $isi
 * @property string $gambar
 * @property string $kategori
 * @property string|null $gambar_tambahan
 * @property string|null $gambar_cadangan
 * @property int $admin_id
 */

class Ekskul extends Model
{
    use HasFactory;
    protected $table = 'ekskuls';

    protected $fillable = [
        'judul',
        'isi',
        'gambar',
        'kategori',
        'gambar_tambahan',
        'gambar_cadangan',
        'admin_id',
    ];

    // Relasi ke admin yang menginputkan ekstrakurikuler.
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
                'gambar_cadangan',
            ];

            foreach ($files as $field) {
                if ($record->$field && Storage::disk('public')->exists($record->$field)) {
                    Storage::disk('public')->delete($record->$field);
                }
            }
        });
    }
}
