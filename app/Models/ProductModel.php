<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;
    protected $table = "product";
    protected $fillable = [
        'category_id','name','description','image'
    ];

    public function productVariation(){
        return $this->hasMany(ProductVariationModel::class, 'product_id','id');
    }
}
