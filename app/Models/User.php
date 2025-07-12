<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Notifications\ResetPasswordNotificationCustom;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Notifications\ResetPassword;
use App\Notifications\ResetPasswordBrevo;
use App\Notifications\ResetPasswordResend;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstname',
        'middlename',
        'lastname',
        'email',
        'password',
        'registration_code',
        'about',
        'profile_image',
        'facebook',
        'instagram',
        'tiktok',
        'twitter',
        'youtube',
        'vibrant_username',
        'expired_at',
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

    public function sendPasswordResetNotification($token)
    {
        // $this->notify(new ResetPasswordNotificationCustom($token));
        //  $this->notify(new ResetPasswordBrevo($token));
        $this->notify(new ResetPasswordResend($token));
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'tag_user_tbl');
    }

}
