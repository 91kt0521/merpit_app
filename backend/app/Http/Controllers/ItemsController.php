<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    public function showBuyItemForm(Item $item) {
        if (!$item->isStateSelling) {
            // HTTPステータスコード404(Not Found)を返す
            abort(404);
        }

        return view('items.item_buy_form')
            ->with('item', $item);
    }

    public function showItems(Request $request) {

        $query = Item::query();

        // カテゴリで絞り込む
        if ($request->filled('category')) {
            // カテゴリ：1の形式を分解しそれぞれ変数に代入
            list($categoryType, $categoryId) = explode(':', $request->input('category'));

            // カテゴリ事に条件を指定
            if ($categoryType == 'primary') {
                // 大カテゴリのIDはitemテーブルに保持していないためリレーションに接続し小カテゴリテーブルから取得する
                $query->whereHas('secondaryCategory', function($query) use ($categoryId){
                    $query->where('primary_category_id', $categoryId);
                });
            } elseif($categoryType == 'secondary') {
                $query->where('secondary_category_id', $categoryId);
            }
        }

        // キーワードで絞り込み
        if ($request->filled('keyword')) {
            $keyword = '%' . $this->escape($request->input('keyword')) . '%';
            $query->where(function ($query) use ($keyword) {
                $query->where('name', 'LIKE', $keyword);
                $query->orWhere('description', 'LIKE', $keyword);
            });
        }

        $items = $query->orderByRaw( "FIELD(state, '" . Item::STATE_SELLING . "', '" . Item::STATE_BOUGHT . "')" )
            ->orderBy('id', 'DESC')
            ->paginate(10);

        return view('items.items')
            ->with('items', $items);
    }

    private function escape(string $value) {
        return str_replace(
            ['\\', '%', '_'],
            ['\\\\', '\\%', '\\_'],
            $value
        );
    }

    public function showItemDetaile(Item $item) {
        return view('items.item_detail')
            ->with('item', $item);
    }
}
