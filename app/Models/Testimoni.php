<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Testimoni extends Model
{

    use HasFactory;
    protected $table = 'testimonis';

    protected $fillable = [
        'foto',
        'nama',
        'posisi',
        'status',
        'isi',
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
                'foto',
                'video',
            ];

            foreach ($files as $field) {
                if ($record->$field && Storage::disk('public')->exists($record->$field)) {
                    Storage::disk('public')->delete($record->$field);
                }
            }
        });
    }
}
