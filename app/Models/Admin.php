<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'admins';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'admin_type_id',
        'account_password',
        'status'
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

    public function getAuthPassword()
    {
      return $this->account_password;
    }

    /**
     * One to one relation between admin and admintype table
     *
     * @return BelongsTo
     */
    public function adminType() : BelongsTo
    {
        return $this->belongsTo(AdminType::class);
    }

    /**
     * Laravel Scope Example
     *
     * @param [type] $query
     * @return object
     */
    public function scopeAllAdmin($query) : object
    {
        return $query->select('name', 'email', 'status');
    }

    /**
     * Specify active inactive status based one 0, 1 value
     *
     * @param [type] $attribute
     * @return string
     */
    public function getStatusAttribute($attribute) : string
    {
        return [
            '0' => 'Inactive',
            '1' => 'Active',
        ][$attribute];
    }
}
