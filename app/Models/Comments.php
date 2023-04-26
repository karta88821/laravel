<?php

namespace App\Models;

use App\Models\Posts;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;

    protected $fillable = [
        'messages',
        'post_id'
    ];

    /*
    public function post() {
        return $this->belongsTo(Posts::class, 'id');
    }
    */
}
