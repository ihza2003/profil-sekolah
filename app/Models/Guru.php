<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Guru extends Model
{
    use HasFactory;
    protected $table = 'guru';

    protected $fillable = ['nama', 'nip', 'foto', 'email', 'riwayat_pendidikan', 'admin_id'];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function mapel()
    {
        return $this->belongsToMany(Mapel::class);
    }

    protected static function booted()
    {
        static::deleting(function ($record) {
            $files = [
                'foto',
            ];

            foreach ($files as $field) {
                if ($record->$field && Storage::disk('public')->exists($record->$field)) {
                    Storage::disk('public')->delete($record->$field);
                }
            }
        });
    }
}
