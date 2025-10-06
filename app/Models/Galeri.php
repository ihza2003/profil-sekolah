<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Galeri
 *
 * Model untuk data galeri sekolah.
 *
 * @property string $judul
 * @property string $gambar
 * @property int $admin_id
 */

class Galeri extends Model
{
    use HasFactory;
    protected $table = 'galeris';

    protected $fillable = [
        'judul',
        'gambar',
        'admin_id',
    ];

    /**
     * Relasi ke admin yang menginputkan galeri.
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
            ];

            foreach ($files as $field) {
                if ($record->$field && Storage::disk('public')->exists($record->$field)) {
                    Storage::disk('public')->delete($record->$field);
                }
            }
        });
    }
}
