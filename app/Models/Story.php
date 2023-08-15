<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    use HasFactory;

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    protected $casts = [
        'loveit' => 'array',
    ];

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }

    public function totalDonations()
    {
        return $this->donations->sum('donation_amount');
    }

}
