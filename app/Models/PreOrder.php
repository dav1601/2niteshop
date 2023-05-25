<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PreOrder
 *
 * @property int $id
 * @property string $name_cus
 * @property string $phone
 * @property int $products_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $status 0: Chưa xử Lý , 1:Đã xử lý
 * @property int $status_product 0: Hàng chưa có 1: Hàng đã về tới shop
 * @property int $deposit 0: Chưa cọc , 1:Đã cọc , 2:Rút cọc
 * @property string|null $delivery_time Thời gian nhận hàng
 * @property int $delivery_status 0:Chưa lấy hàng , 1: Đã lấy hàng , 2:Huỷ
 * @property int|null $price
 * @property string|null $price_deposit
 * @property string|null $arrived_time
 * @method static \Database\Factories\PreOrderFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|PreOrder newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PreOrder newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PreOrder query()
 * @mixin \Eloquent
 */
class PreOrder extends Model
{
    use HasFactory;
    protected $table = 'pre_order';
    protected $fillable = [
        'name_cus',
        'phone',
        'products_id',
        'status',
        'status_product',
        'arrived_time',
        'deposit',
        'delivery_time',
        'delivery_status',
        'price',
        'price_deposit',
    ];
}
