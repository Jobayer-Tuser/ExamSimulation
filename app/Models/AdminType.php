<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminType extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function admins()
    {
        return $this->hasMany(Admin::class);
    }

    public function scopeAllType($query)
    {
        return $query->select('id','name');
    }
}
