<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'vat',
        'email',
        'phone',
        'street',
        'building_number',
        'flat_number',
        'postcode',
        'city',
    ];
    
    use HasFactory;

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}


