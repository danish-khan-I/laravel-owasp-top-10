<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MapsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'title' => $this->faker->country(),
            'src' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d18889615.127721287!2d-113.74026268304802!3d54.69446974595338!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4b0d03d337cc6ad9%3A0x9968b72aa2438fa5!2sCanada!5e0!3m2!1sen!2sin!4v1648296592100!5m2!1sen!2sin',
        ];
    }
}
