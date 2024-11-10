<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'date',
        'to',
        'subject',
    ];

    public function bills()
    {
        return $this->hasMany(Bill::class);
    }
}
