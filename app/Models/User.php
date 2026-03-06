<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Aspirasi;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    // relationship with aspirasi records submitted by the user (student)
    public function aspirasis()
    {
        return $this->hasMany(Aspirasi::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    use HasRoles;

    protected $fillable = [
        'name',
        'nis',  
        'kelas',
        'email',
        'password',
        'foto'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

}
