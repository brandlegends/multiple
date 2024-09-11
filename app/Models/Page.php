<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['site_id', 'author_id', 'title', 'content', 'meta_title', 'meta_description', 'slug', 'parent_id'];

    public function site()
    {
        return $this->belongsTo(Site::class);
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function parent()
    {
        return $this->belongsTo(Page::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Page::class, 'parent_id');
    }
}
