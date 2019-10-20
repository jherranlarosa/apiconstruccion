<?php

namespace App\Model\Sale;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property integer $userSellerId
 * @property integer $userClientId
 * @property int $masterStatusId
 * @property string $total_amount
 * @property boolean $statusc
 * @property string $created_at
 * @property string $updated_at
 * @property MasterStatus $masterStatus
 * @property User $user
 * @property User $user
 * @property SaleDetail[] $saleDetails
 */
class Sale extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'sale';

    /**
     * @var array
     */
    protected $fillable = ['userSellerId', 'userClientId', 'masterStatusId', 'net_amount', 'igv_amount', 'total_amount', 'status', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function masterStatus()
    {
        return $this->belongsTo('App\MasterStatus', 'masterStatusId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userClient()
    {
        return $this->belongsTo('App\User', 'userClientId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userSeller()
    {
        return $this->belongsTo('App\User', 'userSellerId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function saleDetails()
    {
        return $this->hasMany('App\Sale\SaleDetail', 'saleId');
    }
}
