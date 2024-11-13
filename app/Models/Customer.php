<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Customer extends Model
{
    use HasFactory;
    use Searchable;

    protected $guarded = [];

    public function toSearchableArray()
    {
        return ['id' => (string) $this->id] + $this->toArray();
    }
}
