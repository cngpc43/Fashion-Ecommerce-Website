<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;

class ProductDetail extends Model
{
    use HasFactory;


    protected $fillable = [
        'productDetailId',
        'productId',
        'img',
        'size',
        'color',
        'stock',
    ];

    protected function size(): Attribute
    {

        return Attribute::make(

            get: fn($value) => json_decode($value, true),

            set: fn($value) => json_encode($value),

        );

    }
    protected function color(): Attribute
    {

        return Attribute::make(

            get: fn($value) => json_decode($value, true),

            set: fn($value) => json_encode($value),

        );

    }
    protected function spec(): Attribute
    {

        return Attribute::make(

            get: fn($value) => json_decode($value, true),

            set: fn($value) => json_encode($value),

        );

    }
    public static function GetProductDetailByCollection($collection)
    {
        $response = DB::table('product_details')
            ->join('products', 'product_details.productId', '=', 'products.productId')
            ->join('collections', 'products.collectionId', '=', 'collections.id')
            ->select('product_details.color', 'products.productId', 'product_details.img', 'product_details.size', 'product_details.stock', 'products.name', 'products.price', 'products.description', 'collections.name as collectionName')
            ->distinct()->where('collections.name', $collection)
            ->get();
        return $response;
    }
    public static function GetNewArrival()
    {
        $response = DB::table('product_details')
            ->join('products', 'product_details.productId', '=', 'products.productId')
            ->select('products.productId as id', 'product_details.color', 'product_details.img', 'product_details.size', 'product_details.stock', 'products.name', 'products.price')
            ->whereNotNull('product_details.created_at')
            ->orderBy('products.created_at', 'desc')
            ->take(8)
            ->get();
        return $response;
    }
    public static function GetByCategory($category)
    {
        $response = DB::table('product_details')
            ->join('products', 'product_details.productId', '=', 'products.productId')
            ->join('categories', 'products.categoryId', '=', 'categories.id')
            ->select(
                'products.productId',
                'products.name',
                'products.price',
                'product_details.color',
                DB::raw('GROUP_CONCAT(DISTINCT product_details.img) as images')
            )
            ->where('categories.name', $category)
            ->groupBy('products.productId', 'products.name', 'products.price', 'product_details.color')
            ->get();

        $grouped = [];
        foreach ($response as $item) {
            $images = str_replace(['["', '"]'], '', $item->images);
            $images = explode('","', $images);
            $grouped[] = [
                'productId' => $item->productId,
                'name' => $item->name,
                'price' => $item->price,
                'color' => $item->color,
                'img' => $images,
            ];
        }

        return $grouped;
    }
    public static function GetDetailByID($id)
    {
        $response = DB::table('product_details')
            ->join('products', 'product_details.productId', '=', 'products.productId')
            ->select(
                'products.productId',
                'products.name',
                'products.description',
                'product_details.stock',
                'product_details.color',
                'product_details.size',
                'products.price',
                DB::raw('GROUP_CONCAT(DISTINCT product_details.img) as images')
            )
            ->where('product_details.productId', $id)
            ->groupBy('products.productId', 'products.name', 'products.description', 'product_details.stock', 'product_details.color', 'product_details.size', 'products.price')
            ->get();

        $grouped = [];
        foreach ($response as $item) {
            $images = str_replace(['["', '"]'], '', $item->images);
            $images = explode('","', $images);
            $grouped[] = [
                'productId' => $item->productId,
                'name' => $item->name,
                'description' => $item->description,
                'price' => $item->price,
                'stock' => $item->stock,
                'color' => $item->color,
                'size' => $item->size,
                'img' => $images,
            ];
        }

        return $grouped;
    }

    public static function GetAllProductDetail()
    {
        $response = DB::table('product_details')
            ->join('products', 'product_details.productId', '=', 'products.productId')
            ->join('categories', 'products.categoryId', '=', 'categories.id')
            ->select(
                'products.name',
                'products.price',
                'product_details.color',
                DB::raw('GROUP_CONCAT(DISTINCT product_details.img) as images')
            )
            ->groupBy('products.name', 'products.price', 'product_details.color')
            ->get();

        $grouped = [];
        foreach ($response as $item) {
            $images = str_replace(['["', '"]'], '', $item->images);
            $images = explode('","', $images);
            $grouped[] = [

                'name' => $item->name,
                'price' => $item->price,
                'color' => $item->color,
                'img' => $images,
            ];
        }

        return $grouped;
    }
    public function customer(): BelongsToMany
    {
        return $this->BelongsToMany(Cart::class, 'id', 'id');
    }

}
