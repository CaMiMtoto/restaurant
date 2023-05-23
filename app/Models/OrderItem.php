<?php

namespace App\Models;

use Database\Factories\OrderItemFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\OrderItem
 *
 * @property int $id
 * @property int $order_id
 * @property int $item_id
 * @property int $qty
 * @property string $price
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @method static OrderItemFactory factory($count = null, $state = [])
 * @method static Builder|OrderItem newModelQuery()
 * @method static Builder|OrderItem newQuery()
 * @method static Builder|OrderItem query()
 * @method static Builder|OrderItem whereCreatedAt($value)
 * @method static Builder|OrderItem whereId($value)
 * @method static Builder|OrderItem whereItemId($value)
 * @method static Builder|OrderItem whereOrderId($value)
 * @method static Builder|OrderItem wherePrice($value)
 * @method static Builder|OrderItem whereQty($value)
 * @method static Builder|OrderItem whereUpdatedAt($value)
 *
 * @mixin Eloquent
 */
class OrderItem extends Model
{
    use HasFactory;

    protected $appends = ['total'];

    public function getTotalAttribute(): float|int
    {
        return $this->qty * $this->price;
    }

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }
}
