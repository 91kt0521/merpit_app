<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ItemCondition;
use Carbon\Factory;

class ItemConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ItemCondition::factory()->create([
            'id' => 1,
            'name' => '新品、未使用',
            'sort_no' => 1,
        ]);

        ItemCondition::factory()->create([
            'id' => 2,
            'name' => '未使用に近い',
            'sort_no' => 2,
        ]);

        ItemCondition::factory()->create([
            'id' => 3,
            'name' => '目立った傷や汚れなし',
            'sort_no' => 3,
        ]);

        ItemCondition::factory()->create([
            'id' => 4,
            'name' => 'やや傷や汚れあり',
            'sort_no' => 4,
        ]);

        ItemCondition::factory()->create([
            'id' => 5,
            'name' => '傷や汚れあり',
            'sort_no' => 5,
        ]);

        ItemCondition::factory()->create([
            'id' => 6,
            'name' => '全体的に状態が悪い',
            'sort_no' => 6,
        ]);
    }
}
