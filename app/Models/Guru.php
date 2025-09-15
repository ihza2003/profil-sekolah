<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Guru extends Model
{
    use HasFactory;
    protected $table = 'guru';

    protected $fillable = ['nama', 'nip', 'foto', 'email', 'riwayat-pendidikan', 'admin_id'];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function mapel()
    {
        return $this->belongsToMany(Mapel::class);
    }
}
