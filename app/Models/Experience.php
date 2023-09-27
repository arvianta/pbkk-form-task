<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'employment_type',
        'company_name',
        'location',
        'location_type',
        'description',
        'start_date',
        'end_date',
        'documentation',
        'rating',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
