<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'service_id',
        'location',
        'about',
    ];

    public function service() {
        return $this->belongsTo(Service::class);
    }
}