<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Testimoni
 *
 * Model untuk data testimoni dari siswa, alumni, atau orang tua.
 *
 * @property string $foto
 * @property string $nama
 * @property string $posisi
 * @property string $status
 * @property string $isi
 * @property string|null $video
 * @property int $admin_id
 */

class Testimoni extends Model
{

    use HasFactory;
    protected $table = 'testimonis';

    protected $fillable = [
        'foto',
        'nama',
        'posisi',
        'status',
        'isi',
        'video',
        'admin_id',
    ];

    /**
     * Relasi ke admin yang menginputkan testimoni.
     */
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    /**
     * Hapus file terkait saat menghapus record testimoni di storage.
     */
    protected static function booted()
    {
        static::deleting(function ($record) {
            $files = [
                'foto',
                'video',
            ];

            foreach ($files as $field) {
                if ($record->$field && Storage::disk('public')->exists($record->$field)) {
                    Storage::disk('public')->delete($record->$field);
                }
            }
        });
    }
}
