<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Love extends Model
{
    use HasFactory;
    protected $table = 'loves';
    protected $fillable = ['love'];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}
