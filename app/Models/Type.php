<?php

namespace App\Models;

use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use Searchable;

    protected $fillable = ['name', 'is_active'];

    protected $searchable = [
        'name'
    ];
}
