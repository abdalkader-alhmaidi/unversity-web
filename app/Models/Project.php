<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Project extends Model
{
    use HasFactory;
    protected $fillable =['matrial_id','title','content','date','user_id'];
    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('path');
    }

}
