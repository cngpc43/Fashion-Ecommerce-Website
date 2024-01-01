<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Address;

class Orders extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'userId',
        'status',
        'totalPrice',
        'paymentMethod',
        'totalPrice',

    ];
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class, 'userID');
    }
    public function address()
    {
        return $this->belongsTo(Address::class, 'addressID');
    }
}
