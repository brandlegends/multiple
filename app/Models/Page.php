<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    // Define the fillable fields for mass assignment
    protected $fillable = [
        'site_id', 'title', 'content', 'meta_title', 'meta_description',
        'slug', 'parent_id', 'Author_name', 'Author_email', 'Author_image', 'category_name'
    ];

    // A page belongs to a site
    public function site()
    {
        return $this->belongsTo(Site::class);
    }

    // Self-referencing for hierarchical pages
    public function parent()
    {
        return $this->belongsTo(Page::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Page::class, 'parent_id');
    }
}
