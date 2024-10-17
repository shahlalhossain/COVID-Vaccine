<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class VaccineCenter extends Model
{
    use HasFactory;

    /**
     * Get the Vaccine Appointments for the Vaccine Center.
     */
    public function appointments(): HasMany
    {
        return $this->hasMany(VaccineAppointment::class);
    }
}
