<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;
    protected $fillable =[
        'name',
        'race',
        'birth',
        'client_id'
    ];

    //haciendo que la mascota le pertenezca a un cliente
    public function client(){
        return $this->belongsTo(Client::class, 'client_id');
    }
}
