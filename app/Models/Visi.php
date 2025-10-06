<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Visi
 *
 * Model untuk data visi, misi, tujuan, dan sejarah sekolah.
 *
 * @property string $sejarah
 * @property string $visi
 * @property array $misi
 * @property array $tujuan
 * @property int $admin_id
 */

class Visi extends Model
{

    use HasFactory;
    protected $table = 'visi_misi_tujuan';

    protected $fillable = [
        'sejarah',
        'visi',
        'misi',
        'tujuan',
        'admin_id',
    ];

    protected $casts = [
        'misi' => 'array',
        'tujuan' => 'array',
    ];

    /**
     * Relasi ke admin yang menginputkan visi, misi, tujuan, dan sejarah sekolah.
     */
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
