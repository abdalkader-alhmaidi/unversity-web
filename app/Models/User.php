<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Project;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
  

 //Relations
 public function category()
 {
     return $this->belongsTo('App\Models\Category');
 }

 public function bookings()
 {
     return $this->hasMany('App\Models\Booking');
 }
 public function lectures(){
    return $this->hasMany('App\Models\Lecture');
 }
 public function matrials()
 {
     return $this->belongsToMany('App\Models\Matrial');
 }
 public function role()
 {
     return $this->belongsTo('App\Models\Role','role_id','name');
 }
 public function projects()
 {
     return $this->belongsToMany(Project::class)->withPivot('path');
 }
 public function marks(){
    return $this->hasMany('App\Models\Mark','user_id','id_student');

 }


















    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'category_id',
        'id_student',
        'photo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
