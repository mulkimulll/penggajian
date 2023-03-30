<?php

use Illuminate\Database\Seeder;
use App\Jabatan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        Jabatan::create([
            'nama' => 'Security'
        ]);
 
        Jabatan::create([
            'nama' => 'Bidan'
        ]);
 
        Jabatan::create([
            'nama' => 'Helper'
        ]);
    }
}
