<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeSearch(Builder $query, string $keyword): Builder
    {
        return $query->whereFullText(
            ['name', 'email', 'address', 'phone'],
            "$keyword*",
            ['mode' => 'boolean'],
        );
    }
}
