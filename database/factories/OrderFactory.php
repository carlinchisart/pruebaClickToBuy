<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $account = Account::inRandomOrder()->get()->random();
        $cantidad = rand(1,15);
        $valor = rand(500,90000);
        $total = $cantidad * $valor;
        return [
            'account_id' => $account->id,
            'producto'   => $this->faker->word,
            'cantidad'   => $cantidad,
            'valor'      => $valor,
            'total'      => $total
        ];
    }
}
