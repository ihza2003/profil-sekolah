<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Program extends Model
{
    use HasFactory;
    protected $table = 'programs-unggulan';

    protected $fillable = [
        'judul',
        'isi',
        'gambar',
        'kategori',
        'gambar_tambahan',
        'gambar_cadangan',
        'video',
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
                'gambar',
                'gambar_tambahan',
                'gambar_cadangan',
            ];

            foreach ($files as $field) {
                if ($record->$field && Storage::disk('public')->exists($record->$field)) {
                    Storage::disk('public')->delete($record->$field);
                }
            }
        });
    }
}
