<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Belong;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\User;
use App\Models\Product;
use App\Models\ProductDetail;
use Illuminate\Support\Facades\DB;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'userId',
    ];
    public function belongs()
    {
        return $this->hasMany(Belong::class, 'cartID');
    }

    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class, 'userId');
    }
    public static function CartDetail()
    {
        $response = DB::table('carts')
            ->join('belongs', 'carts.id', '=', 'belongs.cartID')
            ->join('product_details', 'belongs.detailID', '=', 'product_details.productDetailId')
            ->join('products', 'product_details.productId', '=', 'products.productId')
            ->select('carts.id', 'belongs.detailID', 'belongs.quantity', 'product_details.img as image', 'product_details.size', 'product_details.color', 'product_details.stock', 'products.name', 'products.price')
            ->get();

        $response->map(function ($item) {
            $item->image = json_decode($item->image)[0] ?? null;
            return $item;
        });

        return $response;
    }
}
