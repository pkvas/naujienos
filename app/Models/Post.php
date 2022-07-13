<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'title',
        'slug',
        'content',
        'author_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id')->withDefault('Vardenis Pavardenis');
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Categories::class, 'category_post', "post_id", "category_id");
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
