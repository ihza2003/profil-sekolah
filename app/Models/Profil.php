<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Profil extends Model
{
    protected $table = 'profil';

    protected $fillable = [
        'nama',
        'alamat',
        'telepon',
        'email',
        'logo',
        'embed_maps',
        'admin_id',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    protected static function booted()
    {
        static::deleting(function ($record) {
            $files = [
                'logo',
            ];

            foreach ($files as $field) {
                if ($record->$field && Storage::disk('public')->exists($record->$field)) {
                    Storage::disk('public')->delete($record->$field);
                }
            }
        });
    }
}
