<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Medsos
 *
 * Model untuk data media sosial sekolah.
 *
 * @property string|null $youtube
 * @property string|null $facebook
 * @property string|null $instagram
 * @property string|null $twitter
 * @property string|null $tiktok
 * @property int $admin_id
 */

class Medsos extends Model
{
    use HasFactory;

    protected $fillable = [
        'youtube',
        'facebook',
        'instagram',
        'twitter',
        'tiktok',
        'admin_id',
    ];

    /**
     * Relasi ke admin yang menginputkan media sosial.
     */
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
