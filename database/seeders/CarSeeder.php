<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cars = [
            [
                'name' => 'Toyota Camry',
                'brand' => 'Toyota',
                'model' => 'Camry',
                'year' => 2015,
                'car_type' => 'Sedan',
                'daily_rent_price' => 100.00,
                'availability' => true,
                'image' => 'img/car-1.png',
            ],
            [
                'name' => 'Honda Civic',
                'brand' => 'Honda',
                'model' => 'Civic',
                'year' => 2018,
                'car_type' => 'Sedan',
                'daily_rent_price' => 80.00,
                'availability' => true,
                'image' => 'img/car-2.png',
            ],
            [
                'name' => 'Ford Mustang',
                'brand' => 'Ford',
                'model' => 'Mustang',
                'year' => 2020,
                'car_type' => 'Coupe',
                'daily_rent_price' => 150.00,
                'availability' => true,
                'image' => 'img/car-3.png',
            ],
            [
                'name' => 'Nissan Altima',
                'brand' => 'Nissan',
                'model' => 'Altima',
                'year' => 2019,
                'car_type' => 'Sedan',
                'daily_rent_price' => 90.00,
                'availability' => true,
                'image' => 'img/car-4.png',
            ],
            [
                'name' => 'Chevrolet Silverado',
                'brand' => 'Chevrolet',
                'model' => 'Silverado',
                'year' => 2017,
                'car_type' => 'Truck',
                'daily_rent_price' => 120.00,
                'availability' => true,
                'image' => 'img/car-5.png',
            ],
            [
                'name' => 'Hyundai Elantra',
                'brand' => 'Hyundai',
                'model' => 'Elantra',
                'year' => 2016,
                'car_type' => 'Sedan',
                'daily_rent_price' => 70.00,
                'availability' => true,
                'image' => 'img/car-6.png',
            ],
        ];

        foreach ($cars as $car) {
            Car::create($car);
        }
    }
}
