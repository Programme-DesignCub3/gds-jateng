<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Submission;
use App\Enums\CompetitionList;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'instagram_account',
        'school_name',
        'area',
        'address',
        'phone_no',
        'is_school_account',
        'competition',
        'position',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];



    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'competition' => CompetitionList::class,
        'is_school_account' => 'boolean'
    ];


    /**
     * Get the submission associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function submission(): HasOne
    {
        return $this->hasOne(Submission::class);
    }
}
