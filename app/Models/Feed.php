<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Feed extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'upload_img'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}