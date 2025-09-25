<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sambutan extends Model
{
    use HasFactory;

    protected $table = 'sambutans';

    protected $fillable = ['isi_sambutan', 'nama_kepala_sekolah', 'foto_kepala_sekolah', 'admin_id'];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    protected static function booted()
    {
        static::deleting(function ($record) {
            $files = [
                'foto_kepala_sekolah',
            ];

            foreach ($files as $field) {
                if ($record->$field && Storage::disk('public')->exists($record->$field)) {
                    Storage::disk('public')->delete($record->$field);
                }
            }
        });
    }
}
