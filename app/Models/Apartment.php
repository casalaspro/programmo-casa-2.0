<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// i add the Eloquent features for soft deletes
use Illuminate\Database\Eloquent\SoftDeletes;

class Apartment extends Model
{
    use HasFactory;
    protected $fillable=['title_apartment',
    'rooms',
    'beds',
    'bathrooms',
    'sqr_meters',
    'img_apartment',
    'description',
    'latitude',
    'longitude',
    'complete_address',
    'user_id'];

    // i add it on my model
    use SoftDeletes;

    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    //     'date_of_birth'
    // ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    //collego la tabella sponsorship 
    public function sponsorships(){
        return $this->belongsToMany(Sponsorship::class);
    }

    //collego la tabella services
    public function services(){
        return $this->belongsToMany(Service::class);
    }

    public function views(){
        return $this->hasMany(View::class);
    }
    
    public function messages(){
        return $this->hasMany(Message::class);
    }
}
