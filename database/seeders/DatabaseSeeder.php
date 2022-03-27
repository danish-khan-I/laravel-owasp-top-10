<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        \App\Models\User::create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'is_admin' => true,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);
        \App\Models\User::create([
            'name' => 'user',
            'email' => 'user@example.com',
            'is_admin' => false,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);
        // \App\Models\Maps::factory(3)->create();
        \App\Models\Maps::create([
            'title' => 'Canada',
            'src' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d18889615.127721287!2d-113.74026268304802!3d54.69446974595338!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4b0d03d337cc6ad9%3A0x9968b72aa2438fa5!2sCanada!5e0!3m2!1sen!2sin!4v1648296592100!5m2!1sen!2sin'
        ]);
        \App\Models\Maps::create([
            'title' => 'Washington',
            'src' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d198740.83319058313!2d-77.1546611186821!3d38.89367081250043!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89b7c6de5af6e45b%3A0xc2524522d4885d2a!2sWashington%2C%20DC%2C%20USA!5e0!3m2!1sen!2sin!4v1648296883900!5m2!1sen!2sin'
        ]);
        \App\Models\Maps::create([
            'title' => 'Alaska',
            'src' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d16278556.975170445!2d-176.47109311907647!3d60.12893522861131!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x5400df9cc0aec01b%3A0xbcdb5e27a98adb35!2sAlaska%2C%20USA!5e0!3m2!1sen!2sin!4v1648296849900!5m2!1sen!2sin'
        ]);
    }
}
