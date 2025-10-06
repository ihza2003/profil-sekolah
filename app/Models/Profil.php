<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Profil
 *
 * Model untuk data profil sekolah.
 *
 * @property string $nama
 * @property string $alamat
 * @property string $telepon
 * @property string $email
 * @property string $logo
 * @property string $tagline
 * @property string $nsm
 * @property string $npsn
 * @property string $embed_maps
 * @property int $admin_id
 */


class Profil extends Model
{
    use HasFactory;
    protected $table = 'profil';

    protected $fillable = [
        'nama',
        'alamat',
        'telepon',
        'email',
        'logo',
        'tagline',
        'nsm',
        'npsn',
        'embed_maps',
        'admin_id',
    ];


    /**
     * Relasi ke admin yang menginputkan profil sekolah.
     */
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    /**
     *mengecek dan Menghapus file terkait profil dari storage.
     */

    protected static function booted()
    {
        static::deleting(function ($record) {
            $files = [
                'logo',
            ];

            foreach ($files as $field) {
                if ($record->$field && Storage::disk('public')->exists($record->$field)) {
                    Storage::disk('public')->delete($record->$field);
                }
            }
        });
    }
}
