<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Kelas
 *
 * Model untuk data kelas di sekolah.
 *
 * @property string $nama
 * @property string $tingkat
 * @property int $admin_id
 */

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';

    protected $fillable = [
        'nama',
        'tingkat',
        'admin_id',
    ];

    /**
     * Relasi many-to-many dengan model Kurikulum.
     */
    public function kurikulums()
    {
        return $this->belongsToMany(Kurikulum::class);
    }

    /**
     * Relasi ke admin yang menginputkan kelas.
     */
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
