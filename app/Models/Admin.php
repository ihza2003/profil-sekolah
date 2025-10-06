<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Admin;

/**
 * Class Admin
 *
 * Model untuk data admin yang mengelola konten sekolah.
 *
 * @property string $name
 * @property string $email
 * @property string $password
 */

class Admin extends Authenticatable implements FilamentUser
{
    use HasFactory, Notifiable;

    protected $table = 'admins';

    protected $fillable = ['name', 'email', 'password'];

    protected $hidden = [
        'password',
        'remember_token',
    ];


    /**
     * Tentukan apakah admin dapat mengakses panel Filament.
     */
    public function canAccessPanel(\Filament\Panel $panel): bool
    {
        return true;
    }

    // Relasi one-to-many dengan model Berita
    public function berita()
    {
        return $this->hasMany(Berita::class);
    }

    // Relasi one-to-many dengan model Prestasi
    public function prestasi()
    {
        return $this->hasMany(Prestasi::class);
    }

    // Relasi one-to-many dengan model Ekstrakurikuler
    public function ekskul()
    {
        return $this->hasMany(Ekskul::class);
    }

    // Relasi one-to-many dengan model Galeri
    public function galeri()
    {
        return $this->hasMany(Galeri::class);
    }

    // Relasi one-to-many dengan model Program
    public function program()
    {
        return $this->hasMany(Program::class);
    }

    // Relasi one-to-one dengan model Visi
    public function visi()
    {
        return $this->hasOne(Visi::class); // karena 1 admin hanya pegang 1 data visi
    }

    // Relasi one-to-one dengan model StrukturOrganisasi
    public function struktur()
    {
        return $this->hasOne(StrukturOrganisasi::class);
    }

    // Relasi one-to-one dengan model Akreditasi
    public function akreditasi()
    {
        return $this->hasOne(Akreditasi::class);
    }

    // Relasi one-to-many dengan model media sosial
    public function medsos()
    {
        return $this->hasOne(Medsos::class);
    }

    // Relasi one-to-many dengan model profil
    public function profil()
    {
        return $this->hasOne(Profil::class);
    }

    // Relasi one-to-many dengan model testimoni
    public function testimoni()
    {
        return $this->hasMany(Testimoni::class);
    }

    // Relasi one-to-many dengan model guru
    public function gurus()
    {
        return $this->hasMany(Guru::class);
    }

    // Relasi one-to-many dengan model mata pelajaran
    public function mapel()
    {
        return $this->hasMany(Mapel::class);
    }

    // Relasi one-to-many dengan model kurikulum
    public function kurikulum()
    {
        return $this->hasMany(Kurikulum::class);
    }

    // Relasi one-to-many dengan model informasi ppdb
    public function informasiPpdbs()
    {
        return $this->hasMany(InformasiPpdb::class);
    }

    // Relasi one-to-many dengan model fasilitas
    public function fasilitas()
    {
        return $this->hasMany(Fasilitas::class);
    }

    // Relasi one-to-many dengan model kelas
    public function kelas()
    {
        return $this->hasMany(Kelas::class);
    }

    // Relasi one-to-one dengan model sambutan
    public function sambutan()
    {
        return $this->hasOne(Sambutan::class);
    }

    // Relasi one-to-one dengan model statistik sekolah
    public function statistik()
    {
        return $this->hasOne(StatistikSekolah::class);
    }

    public function pengaturanWebsite()
    {
        return $this->hasOne(PengaturanWebsite::class);
    }
}
