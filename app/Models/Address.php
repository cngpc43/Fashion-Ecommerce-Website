<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [

        'id',
        'userId',
        'street',
        'ward',
        'city',
        'state',
        'isDefault',
        'phone',
        'receiver',


    ];
    public static function GetDefaultAddress($userId)
    {
        return Address::where('userId', $userId)->where('isDefault', 1)->first();
    }
    public static function GetAllNonDefaultAddress($userId)
    {
        return Address::where('userId', $userId)->where('isDefault', 0)->get();
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }
}
