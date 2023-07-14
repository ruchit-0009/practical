<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCartModel extends Model
{
    use HasFactory;
    protected $table = "user_cart";
    protected $fillable = [
        'employee_id','product_id','product_variation_id'
    ];

    public function employee(){
        return $this->hasOne(User::class, 'id','employee_id');
    }
    public function product(){
        return $this->hasOne(ProductModel::class, 'id','product_id');
    }
    public function productVariation(){
        return $this->hasOne(ProductVariationModel::class, 'id','product_variation_id');
    }
}
