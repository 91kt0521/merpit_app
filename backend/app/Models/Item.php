<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    // 出品中
    const STATE_SELLING = 'selling';

    // 購入済み
    const STATE_BOUGHT = 'bought';

    // 多対1
    public function secondaryCategory() {
        return $this->belongsTo(SecondaryCategory::class);
    }

    // 多対1
    public function seller() {
        return $this->belongsTo(User::class, 'seller_id');
    }

    // 多対1
    public function condition() {
        return $this->belongsTo(ItemCondition::class, 'item_condition_id');
    }

    // isStateSellingでメソッドを参照できる
    public function getIsStateSellingAttribute() {
        return $this->state === self::STATE_SELLING;
    }

    public function getIsStateBoughtAttribute() {
        return $this->state === self::STATE_BOUGHT;
    }
}
