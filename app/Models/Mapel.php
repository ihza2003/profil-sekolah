<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Mapel
 *
 * Model untuk data mata pelajaran di sekolah.
 *
 * @property string $nama
 * @property int $admin_id
 * @property string $type
 */

class Mapel extends Model
{
    use HasFactory;

    protected $table = 'mapel';

    protected $fillable = ['nama', 'admin_id', 'type'];

    /**
     * Relasi ke admin yang menginputkan mata pelajaran.
     */
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
    /**
     * Relasi many-to-many dengan model Guru.
     */
    public function gurus()
    {
        return $this->belongsToMany(Guru::class);
    }

    /**
     * Relasi many-to-many dengan model Kurikulum.
     */
    public function kurikulums()
    {
        return $this->belongsToMany(Kurikulum::class);
    }
}
