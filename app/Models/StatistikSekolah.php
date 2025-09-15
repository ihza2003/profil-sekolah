<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
