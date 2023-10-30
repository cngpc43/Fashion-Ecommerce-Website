<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Collection extends Model
{
    use HasFactory;
    protected $fillable = [
        'img',
        'intro',
        'name',
        'description',
        'img',
        'button-label'
    ];
    public function product(): BelongsToMany
    {
        return $this->BelongsToMany(Product::class,'collectionId','id');
    }
}
