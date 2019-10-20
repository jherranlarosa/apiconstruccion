<?php

namespace App\Model\Inventory;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $productId
 * @property string $name
 * @property string $description
 * @property boolean $status
 * @property string $created_at
 * @property string $updated_at
 * @property Product $product
 */
class ProductImage extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'product_image';

    /**
     * @var array
     */
    protected $fillable = ['productId', 'url', 'name', 'status', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Product', 'productId');
    }
}
