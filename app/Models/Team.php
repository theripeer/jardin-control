<?php

namespace App\Models;

use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use Searchable;

    protected $fillable = ['name'];

    protected $searchable = [
        'name',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'team_users', 'team_id', 'user_id')->withPivot('team_id','user_id');
    }

    public function countUsers()
    {
        return count($this->users);
    }
}
