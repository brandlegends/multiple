<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['site_id', 'author_id', 'category_id', 'title', 'content', 'meta_title', 'meta_description'];

    public function site()
    {
        return $this->belongsTo(Site::class);
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
