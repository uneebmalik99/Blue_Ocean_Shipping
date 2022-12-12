<?php

namespace Database\Factories;

use App\Models\Location;
use App\Models\Shipment;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\VehicleStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

class VehicleFactory extends Factory
{
    protected $model = Vehicle::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $customer = User::where('role_id', '4')->get();
        $user = User::all();
        $vehicle_status = VehicleStatus::all();
        $shipment = Shipment::all();
        $location = Location::all();
        $user = User::all();
        $buyer = [];
        $status = [];
        $shipment_id = [];
        $state = [];
        $added = [];
        foreach ($customer as $buyer_id) {
            $buyer[] = $buyer_id['id'];
        }
        foreach ($vehicle_status as $statuses) {
            $status[] = $statuses['id'];
        }
        foreach ($shipment as $shipments) {
            $shipment_id[] = $shipments['id'];
        }
        foreach ($location as $locations) {
            $state[] = $locations['id'];
        }
        foreach ($user as $users) {
            $added[] = $users['id'];
        }

        return [
            'customer_name' => $this->faker->name,
            'vin' => $this->faker->numberBetween(1000, 10000),
            'year' => $this->faker->numberBetween(1970, 2022),
            'make' => $this->faker->randomElement(['suzuki', 'mercedes', 'honda', 'toyota', 'bmw']),
            'model' => $this->faker->randomElement(['cultus', 'alto', 'civic', 'city', 'm5', 'm6', 'supra', 'corolla', 'benz', 'maybach', 'g-wagon']),
            'vehicle_type' => $this->faker->randomElement(['sedan', 'hatchback', 'off-road']),
            'color' => $this->faker->randomElement(['white', 'black', 'golden', 'silver', 'red', 'green', 'yellow']),
            'weight' => $this->faker->numberBetween(1000, 4000),
            'value' => $this->faker->numberBetween(1000, 100000),
            'auction' => $this->faker->randomElement(['yes', 'no']),
            'buyer_id' => $this->faker->randomElement($buyer),
            'hat_number' => $this->faker->numberBetween(12345, 21456),
            'shipper_name' => $this->faker->name,
            'status' => $this->faker->randomElement($status),
            'title_state' => $this->faker->randomElement($state),
            'shipment_id' => $this->faker->randomElement($shipment_id),
            'added_by_user' => $this->faker->randomElement($added),
            'port' => \App\Models\Location::all()->random()->id,
        ];
    }
}
