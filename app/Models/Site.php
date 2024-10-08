<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    // Add the domain field to the fillable array
    protected $fillable = ['domain'];
    
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function pages()
    {
        return $this->hasMany(Page::class);
    }
}
