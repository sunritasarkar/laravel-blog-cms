<?php

namespace App\Models;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [

        'title',

        'slug',

        'category_id',

        'short_description',

        'content',

        'image',

        'published_at',

    ];
    public function category()
{
    return $this->belongsTo(Category::class);
}
}