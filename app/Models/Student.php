<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    use HasFactory;
    protected $table = 'students';
    protected $fillable = ['name', 'mobile','love'];

    public function mobileRelation(): HasOne
    {
        return $this->hasOne(Mobile::class);
    }    

    public function love(): HasMany
    {
        return $this->hasMany(Love::class);
    }
}
