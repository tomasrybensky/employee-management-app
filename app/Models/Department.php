<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    use HasFactory;

    const ID = 'id';
    const NAME = 'name';

    protected $fillable = [
        self::NAME,
    ];

    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class);
    }
}
