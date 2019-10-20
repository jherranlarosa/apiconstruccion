<?php

namespace App\Model\Inventory;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $description
 * @property boolean $status
 * @property string $created_at
 * @property string $updated_at
 * @property Product[] $products
 */
class ProductUnit extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'product_unit';

    /**
     * @var array
     */
    protected $fillable = ['name', 'description', 'status', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany('App\Product', 'unitId');
    }
}
