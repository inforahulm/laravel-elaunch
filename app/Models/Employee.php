<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = "employees";

    protected $fillable = [
        'name', 'author','user_id','image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'employee_id');
    }

    public function getImageAttribute($image)
    {
    if ($image) {
        return asset('storage/images/'. $image);
    }else {
        return asset('storage/images/default.jpg');
    }
    }
}
