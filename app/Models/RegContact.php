<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class RegContact extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    //Relacion uno a muchos con los usuraios (Uno a Muchos Inversa)
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function regContactType(){
        $contactType = RegContactType::find($this->type_id);
        return $contactType;
        //return $this->hasOne('App\Models\RegContactType');
    }
    public function regContact($type_id){
        $contactType = RegContactType::find($type_id);
        return $contactType;
        //return $this->hasOne('App\Models\RegContactType');
    }

}
