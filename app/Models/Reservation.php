<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $guarded =[
        'id'
    ];
    protected $fillable =[
        'user_id','shop_id', 'date', 'time', 'number', 'created_at', 'updated_at','datetime'
    ];

    use HasFactory;
    public function shop() {
        return $this->belongsTo('App\Models\Shop');
    }
    public function user() {
        return $this->belongsTo('App\Models\User');
    }
}
