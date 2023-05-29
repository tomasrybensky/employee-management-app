<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Designation extends Model
{
    use HasFactory;

    const ID = 'id';
    const NAME = 'mame';

    protected $fillable = [
        self::NAME,
    ];

    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class);
    }
}
