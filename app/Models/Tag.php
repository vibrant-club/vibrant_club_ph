<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $table = 'tags_tbl';

    protected $fillable = ['name'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'tag_user_tbl');
    }
}
