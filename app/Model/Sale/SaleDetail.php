<?php

namespace App\Model\Sale;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $saleId
 * @property int $productId
 * @property boolean $status
 * @property string $created_at
 * @property string $updated_at
 * @property Product $product
 * @property Sale $sale
 */
class SaleDetail extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'sale_detail';

    /**
     * @var array
     */
    protected $fillable = ['saleId', 'productId', 'status', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Product', 'productId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sale()
    {
        return $this->belongsTo('App\Sale', 'saleId');
    }
}
