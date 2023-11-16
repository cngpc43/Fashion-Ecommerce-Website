<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

use App\Models\User;
use App\Models\InvoiceDetail;
class Invoice extends Model
{
    use HasFactory;

    protected $fillable=[
        'customerId',
        'products',
        'total',
        'salePercent'
    ];
    protected function products(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true),
            set: fn ($value) => json_encode($value),
        );
    } 
    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class,'id','customerId');
    }
    public function invoicedetail(): HasOne
    {
        return $this->HasOne(InvoiceDetail::class,'invoiceId','id');
    }
}
