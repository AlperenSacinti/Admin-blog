<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $fillable = [
        'name',
        'user_id',
        'city',
        'title',
        'blog',
        'image'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($blog) {
            if ($blog->image && file_exists(public_path('images/' . $blog->image))) {
                unlink(public_path('images/' . $blog->image));
            }
        });
    }
}
