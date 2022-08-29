<?php

namespace Domain\User\Models;

use Database\Factories\UserFactory;
use Domain\DiscountCode\Models\DiscountCode;
use Domain\Order\Models\Order;
use Domain\Webinar\Models\Webinar;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable , HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'phone',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function newFactory()
    {
        return UserFactory::new();
    }


    public function isAdmin(): bool
    {
        return $this->hasRole('Admin');
    }

    public function webinars()
    {
      return $this->hasManyThrough(Webinar::class , Order::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function discountCodes()
    {
        return $this->hasMany(DiscountCode::class);
    }

    public function setAdmin()
    {
        $this->email === config('permission.admin_email')
            ? $this->assignRole('Admin')
            : $this->assignRole('User');
    }

}
