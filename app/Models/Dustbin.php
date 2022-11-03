<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dustbin extends Model
{
    protected $fillable =['driver_id','dus_number','dus_address','status'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'dustbin_user')->withPivot('status')->withTimestamps();
    }

//    public function driver(){
//        return $this->belongsTo('\App\Models\User');
//    }
}
