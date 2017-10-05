<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(ProductionTableSeeder::class);
        $this->call(FilesTableSeeder::class);
        $this->call(UserTableSeeder::class);
    }
}
