<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $pass = $this->passwordGenerator();
        request()->request->add(['password_without_hash' => $pass]);
        $this->attributes['password'] = Hash::make($pass);
        $this->attributes['created_by'] = session()->get('user_id');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'address',
        'phone_number',
        'password',
    ];

    // public function setPasswordAttribute($value){
    //     $this->attributes['password'] = Hash::make($value);
    // }

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
    ];


    function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }


    public function passwordGenerator()
    {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*_";
        $password = substr(str_shuffle($chars), 0, 16);

        return $password;
    }

    public function sendMail()
    {
        request('password_without_hah');
    }
}
