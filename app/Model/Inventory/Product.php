<?php

namespace App\Model\Inventory;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $unitId
 * @property int $categoryId
 * @property string $name
 * @property string $description
 * @property boolean $status
 * @property string $created_at
 * @property string $updated_at
 * @property ProductCategory $productCategory
 * @property ProductUnit $productUnit
 * @property ProductComentary[] $productComentaries
 * @property ProductImage[] $productImages
 * @property SaleDetail[] $saleDetails
 */
class Product extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'product';

    /**
     * @var array
     */
    protected $fillable = ['unitId', 'categoryId', 'name', 'description','status', 'created_at','updated_at','stock','priceRial','priceSale','codeBar'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productCategory()
    {
        return $this->belongsTo('App\Model\Inventory\ProductCategory', 'categoryId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productUnit()
    {
        return $this->belongsTo('App\Model\Inventory\ProductUnit', 'unitId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productComentaries()
    {
        return $this->hasMany('App\Model\Inventory\ProductComentary', 'productId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productImages()
    {
        return $this->hasMany('App\Model\Inventory\ProductImage', 'productId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function saleDetails()
    {
        return $this->hasMany('App\SaleDetail', 'productId');
    }
}
