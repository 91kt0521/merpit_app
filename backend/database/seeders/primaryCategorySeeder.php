<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PrimaryCategory;
use Carbon\Factory;

class PrimaryCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PrimaryCategory::factory()->create([
            'id' => 1,
            'name' => 'レディース',
            'sort_no' => 1,
        ]);

        PrimaryCategory::factory()->create([
            'id' => 2,
            'name' => 'メンズ',
            'sort_no' => 2,
        ]);

        PrimaryCategory::factory()->create([
            'id' => 3,
            'name' => 'ベビー・キッズ',
            'sort_no' => 3,
        ]);

        PrimaryCategory::factory()->create([
            'id' => 4,
            'name' => 'その他',
            'sort_no' => 4,
        ]);
    }
}
