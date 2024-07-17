<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    use HasFactory;

    protected $fillable=['ip_number', 'id_apartment'];

    public function apartment(){
        return $this->belongsTo(Apartment::class);
    }
}
