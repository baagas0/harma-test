<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'brand_id',
        'category_id',
        'sku',
        'status',
        'name',
        'price',
        'stock',
        'unit',
        'always_ready_stock',
        'wight',
        'leght',
        'wide',
        'high',
        'minimum_buying',
        'multiple_buying',
        'description',
    ];
    protected $appends = [
        'wight_kg',
        'rupiah_price',
        'stock_status',
    ];

    public function brand()
    {
        return $this->hasOne('App\Brand', 'id', 'brand_id');
    }
    public function category()
    {
        return $this->hasOne('App\Category', 'id', 'category_id');
    }

    public function getRupiahPriceAttribute(){
        return 'Rp. '.number_format($this->price, 2);
    }
    public function getWightKgAttribute(){
        return $this->wight / 1000;
    }
    public function getStockStatusAttribute(){
        if ($this->always_ready_stock == 'true') {
            return 1;
        }else {
            if ($this->stock <= 0) {
                return 0;
            }else {
                return 1;
            }
        }
    }

    public static function getSku(){
        $randomNumber = rand(10000,99999);

        return $randomNumber;
    }
}
