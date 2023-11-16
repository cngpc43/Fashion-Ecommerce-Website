<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InvoiceDetail extends Model
{
    use HasFactory;
    protected $primaryKey = 'invoiceId';
    public $incrementing = false;
    protected $fillable=[
        'firstName',
        'lastName',
        'shippingAddress',
        'phone',
        'invoiceId'
    ];
    public function invoice(): BelongsTo
    {
        return $this->BelongsTo(User::class,'id','invoiceId');
    }
}
