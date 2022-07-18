<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contents extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'detail', 'image_path', 'video_path', 'delete_flag', 'created_by', 'updated_by'
    ];
}
