<?php

namespace App\Models;

use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use Searchable;

    protected $fillable = ['name', 'price'];

    protected $searchable = [
        'name'
    ];
}
