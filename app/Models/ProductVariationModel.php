<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariationModel extends Model
{
    use HasFactory;
    protected $table = "product_variation";
    protected $fillable = [
        'product_id','name','description','price','quantity','image','status'
    ];

    public function product(){
        return $this->hasOne(ProductModel::class, 'id','product_id');
    }
}
