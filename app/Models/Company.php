<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'logo',
        'website',
    ];

    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class);
    }

    public function getLogoAttribute($value): string
    {
        if(str_starts_with($value, 'http')) {
            return $value;
        }

        return $value ? asset('storage/companies/' . $value) : 'https://via.placeholder.com/300';
    }
}
