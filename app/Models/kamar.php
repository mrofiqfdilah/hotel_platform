<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;

    protected $table = 'kamar';
    protected $guarded = ['id'];

    // Definisikan relasi "belongsTo" antara Kamar dan Hotel
    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'hotel_id');
    }
}

