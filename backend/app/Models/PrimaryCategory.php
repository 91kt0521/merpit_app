<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrimaryCategory extends Model
{
    use HasFactory;
    // 以下の処理でリレーションを定義
    // $category->secondaryCategoriesで大カテゴリに紐づく小カテゴリの一覧を取得
    public function secondaryCategories() {
        return $this->hasMany(SecondaryCategory::class);
    }
}
