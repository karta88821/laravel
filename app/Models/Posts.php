<?php

namespace App\Models;

use App\Models\Comments;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content'
    ];

    /*
    public function comments() {
        return $this->hasMany(Comments::class, 'id');
    }
    */
}
