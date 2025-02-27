<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $connection = 'mysql';
    protected $table = 'customer';

    protected $primaryKey = 'id';
    protected $fillable = ['username','name','surname','email','password','usertype'];

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
    ];

    public function blogs()
    {
        return $this ->hasMany(BlogPost::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($user) {
            foreach ($user->blogs as $post) {
                if ($post->image && file_exists(public_path('images/' . $post->image))) {
                    unlink(public_path('images/' . $post->image));
                }
                $post->delete();
            }
        });
    }
}
