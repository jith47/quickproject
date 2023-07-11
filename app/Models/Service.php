<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    public function details()
    {
        return $this->belongsTo('\App\Models\ServiceDetail', 'id', 'service_id');
    }

    public function tech()
    {
        return $this->hasMany('\App\Models\ServiceTechnician','service_id', 'id');
    }

    public function creator()
    {
        return $this->hasOne('\App\Models\User','id', 'created_by');
    }

    public function consumer()
    {
        return $this->hasOne('\App\Models\User','id', 'service_for');
    }
}
