<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hotel extends Model
{
    use HasFactory;
    protected $table = 'hotel';
    protected $guarded = ['id'];

    public function kamars()
    {
        return $this->hasMany(Kamar::class);
    }
}
