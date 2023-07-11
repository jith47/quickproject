<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceTechnician extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->hasOne('\App\Models\User', 'id', 'user_id');
    }

    public function service()
    {
        return $this->belongsTo('\App\Models\Service', 'service_id', 'id');
    }
}
