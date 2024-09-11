<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Define the fillable fields for mass assignment
    protected $fillable = [
        'site_id', 'title', 'content', 'meta_title', 'meta_description',
        'Author_name', 'Author_email', 'Author_image', 'category_name'
    ];

    // A post belongs to a site
    public function site()
    {
        return $this->belongsTo(Site::class);
    }
}
