<?php

namespace Database\Factories;

use App\Models\ItemCondition;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemConditionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ItemCondition::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 'id' => $this->faker->id,
            // 'name' => $this->faker->name,
            // 'sort_no' => $this->faker->sort_no,
        ];
    }
}
