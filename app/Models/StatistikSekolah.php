<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class StatistikSekolah
 *
 * Model untuk data statistik sekolah.
 *
 * @property string $tahun_ajaran
 * @property int $jumlah_guru
 * @property int $jumlah_kelas
 * @property int $jumlah_siswa
 * @property int $admin_id
 */

class StatistikSekolah extends Model
{
    use HasFactory;
    protected $table = 'statistik_sekolah';

    protected $fillable = [
        'tahun_ajaran',
        'jumlah_guru',
        'jumlah_kelas',
        'jumlah_siswa',
        'admin_id',
    ];


    /**
     * Relasi ke admin yang menginputkan statistik sekolah.
     */
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
