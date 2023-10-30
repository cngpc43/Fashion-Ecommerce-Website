<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'img',
        'name'
    ];
    public function product(): BelongsToMany
    {
        return $this->BelongsToMany(Product::class,'categoryId','id');
    }
}
