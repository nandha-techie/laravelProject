<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageUpload extends Model
{
	protected $table = 'images';

	protected $fillable = [
        'id', 'price', 'categories', 'description', 'big_img', 'small_img','created_at', 'updated_at',
    ];
} 	