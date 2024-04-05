<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    protected $guarded = false;
    use HasFactory;
    use SoftDeletes;
    public function getTitleAttribute($value)
    {
        return ucfirst($value);
    }
    public function category(){
        return $this->hasMany(Category::class);
    }
}
