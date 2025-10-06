<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Pengaturan Website
 *
 * Model untuk data pengaturan website.
 *
 * @property string $foto_loading
 * @property year $tahun_footer
 * @property int $admin_id
 */

class PengaturanWebsite extends Model
{

    use HasFactory;

    protected $table = 'pengaturan_website';

    // Kolom yang bisa diisi massal
    protected $fillable = [
        'foto_landing',
        'tahun_footer',
        'admin_id',
    ];


    // Relasi ke admin yang mengatur website.
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    protected static function booted()
    {
        static::deleting(function ($record) {
            $files = [
                'foto_landing',
            ];

            foreach ($files as $field) {
                if ($record->$field && Storage::disk('public')->exists($record->$field)) {
                    Storage::disk('public')->delete($record->$field);
                }
            }
        });
    }
}
