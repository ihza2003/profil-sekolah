<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Guru
 *
 * Model untuk data guru.
 *
 * @property string $nama
 * @property string $nip
 * @property string $foto
 * @property string $email
 * @property string $riwayat_pendidikan
 * @property int $admin_id
 */

class Guru extends Model
{
    use HasFactory;
    protected $table = 'guru';

    protected $fillable = ['nama', 'nip', 'foto', 'email', 'riwayat_pendidikan', 'admin_id'];


    /**
     * Relasi ke admin (satu guru dikelola oleh satu admin).
     */
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    /**
     * Relasi ke mapel (guru bisa mengajar banyak mapel).
     */
    public function mapel()
    {
        return $this->belongsToMany(Mapel::class);
    }

    /**
     *mengecek dan Menghapus file terkait guru dari storage.
     */
    protected static function booted()
    {
        static::deleting(function ($record) {
            $files = [
                'foto',
            ];

            foreach ($files as $field) {
                if ($record->$field && Storage::disk('public')->exists($record->$field)) {
                    Storage::disk('public')->delete($record->$field);
                }
            }
        });
    }
}
