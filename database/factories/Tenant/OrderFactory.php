<?php

namespace Database\Factories\Tenant;

use App\Domain\Enums\EnumStatus;
use App\Models\Tenant\Order;
use App\Models\Tenant\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<User>
 */
class OrderFactory extends Factory
{
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'created_by'=>1,
            'currency_id'=>1,
            'status' => $this->faker->randomElement([EnumStatus::PENDING->value, EnumStatus::COMPLETE->value]),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Order $order) {
            $productCount = $this->faker->numberBetween(1, 5);
            $order->products()->attach(
                Product::factory($productCount)->create()->pluck('id'),
                ['qty' => $this->faker->numberBetween(1, 10), 'total_amount' =>  $this->faker->numberBetween(1, 1000) ]
            );
        });
    }
}
