<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Sambutan
 *
 * Model untuk data sambutan kepala sekolah.
 *
 * @property string $isi_sambutan
 * @property string $nama_kepala_sekolah
 * @property string $foto_kepala_sekolah
 * @property int $admin_id
 */

class Sambutan extends Model
{
    use HasFactory;

    protected $table = 'sambutans';

    protected $fillable = ['isi_sambutan', 'nama_kepala_sekolah', 'foto_kepala_sekolah', 'admin_id'];

    /**
     * Relasi ke admin (satu sambutan dikelola oleh satu admin).
     */
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    /**
     *mengecek dan Menghapus file terkait sambutan dari storage.
     */
    protected static function booted()
    {
        static::deleting(function ($record) {
            $files = [
                'foto_kepala_sekolah',
            ];

            foreach ($files as $field) {
                if ($record->$field && Storage::disk('public')->exists($record->$field)) {
                    Storage::disk('public')->delete($record->$field);
                }
            }
        });
    }
}
