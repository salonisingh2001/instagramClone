<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    protected $guarded = [];
    
    public function profileImage()
    {
        $imagePath = ($this->image) ? $this->image : 'profile\JaYtjDGIe5EazCNpz2JX1JtAIsKT6ifm7H5ZolTD.png';

        return '/storage/' . $imagePath;
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
    public function followers()
    {
        return $this->belongsToMany(User::class);
    }
    
}


