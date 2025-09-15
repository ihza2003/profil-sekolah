<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Medsos extends Model
{
    use HasFactory;

    protected $fillable = [
        'youtube',
        'facebook',
        'instagram',
        'twitter',
        'admin_id',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
