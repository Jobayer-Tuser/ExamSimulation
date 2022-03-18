<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Arr;

class Admin extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'admin_type_id', 'password', 'status'];

    public function adminType() : BelongsTo
    {
        return $this->belongsTo(AdminType::class);
    }

    /**
     * Laravel Scope Example
     *
     * @param [type] $query
     * @return void
     */
    public function scopeAllAdmin($query) : object
    {
        return $query->select('name', 'email', 'status');
    }

    public function getStatusAttribute($attribute) : string
    {
        return [
            '0' => 'Inactive',
            '1' => 'Active',
        ][$attribute];
    }
}
