<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\RegContact;

class RegContactType extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    //Relacion uno a muchos con la tabla de contactos.
    //Un tipo de contacto puede estar en muchos contactos.
    public function regContact(){
        return $this->belongsTo(RegContact::class);
    }
}
