<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VehiclesFactory extends Factory
{
    protected $model = Vehicle::class;

    /**
     * Define the model's default state.
     *
     *
     * @return array
     */
    public function definition()
    {
        return [
            'customer_name' => $this->fake->name,
            'vin' => $this->numerify('########'),
            'year' => $this->numerify('########'),
            'make' => $this->randomElement(['suzuki', 'mercedes', 'honda', 'toyota', 'bmw']),
            'model' => $this->randomElement(['cultus', 'alto', 'civic', 'city', 'm5', 'm6', 'supra', 'corolla', 'benz', 'maybach', 'g-wagon']),
            'vehicle_type' => $this->randomElement(['sedan', 'hatchback', 'off-road']),
            'color' => $this->randomElement(['white', 'black', 'golden', 'silver', 'red', 'green', 'yellow']),
            'weight' => $this->numberBetween(1000, 10000),
            'value' => $this->numberBetween(1000, 100000),
            'auction' => $this->randomElement(['yes', 'no']),
            'buyer_id' => App\Models\Customer::all()->random()->id,
            'hat_number' => $this->numberBetween(1, 10000),
            'shipper_name' => $this->fake->name,
            'status' => App\Models\VehicleStatus::all()->random()->id,
            'shipment_id' => App\Models\Shipemnt::all()->random()->id,
        ];
    }
}
