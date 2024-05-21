<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $table = 'property';

    protected $fillable = ['name','price','status','address',
                            'description','sqft','bath',
                            'garage','floor', 'bed',]; 
    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
