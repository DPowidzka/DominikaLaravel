<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
   protected $fillable = [
       'name',
       'customer_id',
       'deadline',
       'date_start',
       'date_end',
       'status',
       'priority',
       'budget',
       'description',
   ];

   use HasFactory;
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
