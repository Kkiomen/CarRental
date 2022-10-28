<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'brand_id',
        'name',
        'imageUrl',
        'enginePower',
        'engineCapacity',
        'numberDoors',
        'airbags',
        'fuel',
        'gearbox',
        'yearOfProduction',
        'abs',
        'electricWindows',
        'electricMirrors',
        'heatedMirrors',
        'centralLocking'
    ];

    public function brand()
    {
        return $this->belongsTo(CarBrand::class);
    }
}
