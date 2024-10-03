<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    use HasFactory;

    protected $fillable = ['name','last_name','phone'];
    protected $guarded = ['id']; // All fields except 'id' can be mass assigned.

}
