<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Story extends Model
{
    use HasFactory;

    protected $table = 'stories';

    protected $fillable = [
        'title', 
        'excerpt', 
        'slug', 
        'body', 
        'image', 
        'user_id'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($story) {
            $story->slug = Str::slug($story->title);
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
