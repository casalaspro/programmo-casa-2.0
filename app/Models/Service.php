<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    //collego la tabella apartments 
    public function apartments(){
        return $this->belongsToMany(Apartment::class);
    }

    // return $this->belongsToMany(Badge::class)
    //     ->where('rank', 'gold')
    //     ->orderByPivot('created_at', 'desc');

    protected $fillable = [
        'name', 'description'
    ];
}
