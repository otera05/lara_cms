<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $primaryKey = 'article_id';

    protected $fillable = ['title', 'body'];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
}
