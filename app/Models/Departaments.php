<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Specialty;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Departaments extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'estatus'
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
