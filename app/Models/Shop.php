<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Shop extends Model
{
    
    use HasFactory;
    
    protected $guarded =[
        'id'
    ];
    protected $fillable =[
        'name', 'area_id','genre_id', 'detail', 'image', 'created_at', 'updated_at', 'shop_id', 'user_id'
    ];

    public function area() {
        return $this->belongsTo('App\Models\Area');
    }
    public function genre() {
        return $this->belongsTo('App\Models\Genre');
    }
    public function reservations() {
        return $this->hasMany(Reservation::class);
    }
    public function favorites() {
        return $this->hasMany(Favorite::class);
    }
    
}