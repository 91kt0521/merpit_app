<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SecondaryCategory extends Model
{
    use HasFactory;

    // 多対1
    public function primaryCategory() {
        return $this->belongsTo(PrimaryCategory::class);
    }
}
