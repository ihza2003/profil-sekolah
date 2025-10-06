<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Akreditasi
 *
 * Model untuk data akreditasi sekolah.
 *
 * @property string $gambar
 * @property int $admin_id
 */

class Akreditasi extends Model
{
    use HasFactory;
    protected $table = 'akreditasis';
    protected $fillable = [
        'gambar',
        'admin_id',
    ];

    /**
     * Relasi ke admin yang menginputkan akreditasi.
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

        static::updating(function ($record) {
            if ($record->isDirty('gambar')) { // field gambar berubah
                $original = $record->getOriginal('gambar');
                if ($original && Storage::disk('public')->exists($original)) {
                    Storage::disk('public')->delete($original);
                }
            }
        });
    }
}
