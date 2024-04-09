<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'team_id',
        'type_id',
        'service_id',
        'folio',
        'quantity_services',
        'dap',
        'deadlines',
        'address',
        'state',
        'payment_state',
        'state_phytosanitary',
        'observation',
        'img_1',
        'img_2',
        'img_3',
        'img_4',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }

    public function getImage($target)
    {
        try {
            return Storage::disk('images_task')->exists("{$this->folio}/{$target}");
        } catch (\Throwable $th) {
            return false;
        }
    }

}
