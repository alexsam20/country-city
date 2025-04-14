<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Region extends Model
{
    use HasFactory;

    protected $table = 'regions';

    protected $fillable = [
        'name',
        'translations',
        'flag',
        'wikiDataId',
    ];

    public function subregions(): HasMany
    {
        return $this->hasMany(Subregion::class);
    }

    public function countries(): HasMany
    {
        return $this->hasMany(Country::class);
    }
}
