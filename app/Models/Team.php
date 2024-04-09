<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'team_users', 'team_id', 'user_id')->withPivot('team_id','user_id');
    }

    public function countUsers()
    {
        return count($this->users);
    }
}
