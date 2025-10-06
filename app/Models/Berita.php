<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Berita
 *
 * Model untuk data berita sekolah.
 *
 * @property string $judul
 * @property string $isi
 * @property string $gambar
 * @property string|null $gambar_tambahan
 * @property int $admin_id
 */

class Berita extends Model
{
    use HasFactory;

    protected $table = 'berita';
    protected $fillable = [
        'judul',
        'isi',
        'gambar',
        'gambar_tambahan',
        'admin_id',
    ];

    // Relasi ke admin yang menginputkan berita.
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
