<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Query\Builder;
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

    // protected function size(): Attribute
    // {

    //     return Attribute::make(

    //         get: fn($value) => json_decode($value, true),

    //         set: fn($value) => json_encode($value),

    //     );

    // }
    // public function product(): BelongsToMany
    // {
    //     return $this->BelongsToMany(Product::class, 'productId', 'productId');
    // }
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'productId');
    }
    // public function belongs()
    // {
    //     return $this->hasMany(Belong::class, 'detailID');
    // }
    public function carts()
    {
        return $this->belongsToMany(Cart::class, 'belongs', 'detailID', 'cartID');
    }
    // protected function color(): Attribute
    // {

    //     return Attribute::make(

    //         get: fn($value) => json_decode($value, true),

    //         set: fn($value) => json_encode($value),

    //     );

    // }
    // protected function spec(): Attribute
    // {

    //     return Attribute::make(

    //         get: fn($value) => json_decode($value, true),

    //         set: fn($value) => json_encode($value),

    //     );

    // }
    public function scopeStock($query)
    {
        return $query->where('stock', '>', 0);
    }
    public static function GetProductDetailByProductId($productId)
    {
        $response = DB::table('product_details')
            ->join('products', 'product_details.productId', '=', 'products.productId')
            ->select('product_details.color', 'products.productId', 'product_details.img', 'product_details.size', 'product_details.stock', 'products.name', 'products.price', 'products.description')
            ->distinct()->where('products.productId', $productId)
            ->get();
        return $response;
    }
    public static function GetProductDetailByCollection($collection)
    {
        $subquery = DB::table('product_details')
            ->select('productId', 'color', DB::raw('MIN(size) as min_size'))
            ->groupBy('productId', 'color');

        $response = DB::table('product_details')
            ->join('products', 'product_details.productId', '=', 'products.productId')
            ->join('collections', 'products.collectionId', '=', 'collections.id')
            ->joinSub($subquery, 'sub', function ($join) {
                $join->on('product_details.productId', '=', 'sub.productId')
                    ->on('product_details.color', '=', 'sub.color')
                    ->on('product_details.size', '=', 'sub.min_size');
            })
            ->select('products.productId', 'product_details.color', 'product_details.img', 'product_details.size', 'product_details.stock', 'products.name', 'products.price', 'products.description', 'collections.name as collectionName')
            ->where('collections.name', $collection)
            ->get();
        return $response;
    }
    public static function GetNewArrival($category)
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
            ->where('categories.parent', $category)
            ->orderBy('products.created_at', 'desc')
            ->groupBy('products.productId', 'products.name', 'products.price', 'product_details.color')
            ->take(8)->get();

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
    // public static function GetByCategory($category)
    // {
    //     $response = DB::table('product_details')
    //         ->join('products', 'product_details.productId', '=', 'products.productId')
    //         ->join('categories', 'products.categoryId', '=', 'categories.id')
    //         ->select(
    //             'products.productId',
    //             'products.name',
    //             'products.price',
    //             'product_details.color',
    //             DB::raw('GROUP_CONCAT(DISTINCT product_details.img) as images')
    //         )
    //         ->where('categories.name', $category)
    //         ->groupBy('products.productId', 'products.name', 'products.price', 'product_details.color')
    //         ->get();

    //     $grouped = [];
    //     foreach ($response as $item) {
    //         $images = str_replace(['["', '"]'], '', $item->images);
    //         $images = explode('","', $images);
    //         $grouped[] = [
    //             'productId' => $item->productId,
    //             'name' => $item->name,
    //             'price' => $item->price,
    //             'color' => $item->color,
    //             'img' => $images,
    //         ];
    //     }

    //     return $grouped;
    // }
    public static function GetByCategory($category)
    {
        $subQuery = DB::table('product_details')
            ->select('product_details.color', DB::raw('MIN(product_details.productDetailId) as productDetailId'))
            ->groupBy('product_details.color');

        $response = DB::table(DB::raw("({$subQuery->toSql()}) as sub"))
            ->mergeBindings($subQuery) // you need to merge bindings
            ->join('product_details', 'sub.productDetailId', '=', 'product_details.productDetailId')
            ->join('products', 'product_details.productId', '=', 'products.productId')
            ->join('categories', 'products.categoryId', '=', 'categories.id')
            ->select(
                'products.productId',
                'products.name',
                'products.price',
                'sub.color',
                'sub.productDetailId',
                DB::raw('GROUP_CONCAT(DISTINCT product_details.img) as images')
            )
            ->where('categories.name', $category)
            ->groupBy('products.productId', 'products.name', 'products.price', 'sub.color', 'sub.productDetailId')
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
                'productDetailId' => $item->productDetailId,
                'img' => $images,
            ];
        }

        return $grouped;
    }
    public static function GetInfoByDetailID($detailId)
    {
        $response = DB::table('product_details')
            ->join('products', 'product_details.productId', '=', 'products.productId')
            ->select(
                'products.productId',
                'products.name',
                'products.price as price',
                'product_details.color',
                'product_details.size',
                'product_details.stock',
                DB::raw('GROUP_CONCAT(DISTINCT product_details.img) as img')
            )
            ->where('product_details.productDetailId', $detailId)
            ->groupBy('products.productId', 'products.name', 'products.price', 'product_details.color', 'product_details.size', 'product_details.stock')
            ->first();



        return $response;
    }
    public static function GetDetailByID($id)
    {
        $response = DB::table('product_details')
            ->join('products', 'product_details.productId', '=', 'products.productId')
            ->select(
                'products.productId',
                'products.name',
                'products.description',
                'product_details.productDetailId',
                'product_details.stock',
                'product_details.color',
                'product_details.size',
                'products.price',
                DB::raw('GROUP_CONCAT(DISTINCT product_details.img) as images')
            )
            ->where('product_details.productId', $id)
            ->groupBy('products.productId', 'products.name', 'products.description', 'product_details.productDetailId', 'product_details.stock', 'product_details.color', 'product_details.size', 'products.price')
            ->get();

        $grouped = [];
        foreach ($response as $item) {
            $images = str_replace(['["', '"]'], '', $item->images);
            $images = explode('","', $images);
            $grouped[] = [
                'productId' => $item->productId,
                'productDetailId' => $item->productDetailId,
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

    public static function GetAllProductDetail($view, $sort, $selectedCategories = null)
    {
        $subQuery = DB::table('product_details')
            ->select('product_details.color', DB::raw('MIN(product_details.productDetailId) as productDetailId'))
            ->groupBy('product_details.color');

        $response = DB::table(DB::raw("({$subQuery->toSql()}) as sub"))
            ->mergeBindings($subQuery)
            ->join('product_details', 'sub.productDetailId', '=', 'product_details.productDetailId')
            ->join('products', 'product_details.productId', '=', 'products.productId')
            ->join('categories', 'products.categoryId', '=', 'categories.id')
            ->select(
                'products.productId',
                'products.name',
                'products.price',
                'sub.color',
                'sub.productDetailId',
                DB::raw('GROUP_CONCAT(DISTINCT product_details.img) as images')
            )
            ->groupBy('products.name', 'products.price', 'sub.color', 'products.productId', 'sub.productDetailId')
            ->where('categories.parent', $view);

        if ($selectedCategories) {
            $response->whereIn('categories.name', $selectedCategories);
        }

        if ($sort === 'price_asc') {
            $response->orderBy('products.price');
        } elseif ($sort === 'price_desc') {
            $response->orderBy('products.price', 'desc');
        }

        $response = $response->get();

        $grouped = [];
        foreach ($response as $item) {
            $images = str_replace(['["', '"]'], '', $item->images);
            $images = explode('","', $images);
            $grouped[] = [
                'productId' => $item->productId,
                'name' => $item->name,
                'price' => $item->price,
                'color' => $item->color,
                'productDetailId' => $item->productDetailId,
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
