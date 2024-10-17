<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'mobile',
        'email',
        'nid',
    ];

    /**
     * Get the Vaccine Notification associated with the User.
     */
    public function vaccineNotification(): HasOne
    {
        return $this->hasOne(VaccineNotification::class);
    }

    /**
     * Get the Vaccine Appointment associated with the User.
     */
    public function vaccineAppointment(): HasOne
    {
        return $this->hasOne(VaccineAppointment::class);
    }
}
