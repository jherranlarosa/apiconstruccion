<?php

namespace App\Model\Inventory;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $productId
 * @property string $name
 * @property integer $userId
 * @property string $description
 * @property boolean $status
 * @property string $created_at
 * @property string $updated_at
 * @property Product $product
 * @property User $user
 */
class ProductComentary extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'product_comentary';

    /**
     * @var array
     */
    protected $fillable = ['productId', 'name', 'userId', 'description', 'status', 'created_at', 'updated_at'];

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
    public function user()
    {
        return $this->belongsTo('App\User', 'userId');
    }
}
