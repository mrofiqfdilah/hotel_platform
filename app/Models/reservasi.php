<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservasi extends Model
{
    use HasFactory;
    protected $table = 'reservasi';
    protected $guarded = ['id'];

    public function hotel()
    {
        return $this->belongsTo(hotel::class, 'hotel_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function kamar()
    {
        return $this->belongsTo(kamar::class, 'kamar_id');
    }
  
}
