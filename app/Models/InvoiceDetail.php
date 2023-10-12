<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InvoiceDetail extends Model
{
    use HasFactory;

    protected $fillable=[
        'invoiceId',
        'firstName',
        'lastName',
        'shippingAddress',
        'phone'
    ];
    public function invoice(): BelongsTo
    {
        return $this->BelongsTo(User::class,'id','invoiceId');
    }
}
