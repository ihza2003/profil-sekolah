<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Kurikulum
 *
 * Model untuk data kurikulum di sekolah.
 *
 * @property string $nama_kurikulum
 * @property int $admin_id
 */

class Kurikulum extends Model
{
    use HasFactory;

    protected $table = 'kurikulum';

    protected $fillable = ['nama_kurikulum', 'admin_id'];

    // Relasi many-to-many dengan model Mapel 
    public function mapel()
    {
        return $this->belongsToMany(Mapel::class);
    }

    // Relasi many-to-many dengan model Kelas
    public function kelas()
    {
        return $this->belongsToMany(Kelas::class);
    }

    /**
     * Relasi ke admin yang menginputkan kurikulum.
     */
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
