<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    // Allow any field to be inserted
    // protected $guarded = [];

    protected $fillable = [
        'name',
        'surname',
        'address',
    ];
}
