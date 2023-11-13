<?php

namespace Database\Factories\Tenant;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;

/**
 * @extends Factory<User>
 */
class ProductFactory extends Factory
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
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'slug' => substr(fake()->unique()->slug(2), 0, 69),
            'created_by' => 1,
            'unit_id' => 1,
            'currency_id' => 1,
            'qty' => rand(1,40),
            'price' => rand(300,5000),
            'product_image' => UploadedFile::fake()->image('product.jpg'),
        ];
    }
}
