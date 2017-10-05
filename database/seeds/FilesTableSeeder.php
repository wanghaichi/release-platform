<?php

use Illuminate\Database\Seeder;

class FilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('rp_files')->insert([
            'file_name' =>  'ceshi',
            'file_path' =>  'ceshi',
            'file_extension'    =>  'apk',
            'file_size' =>  "10",
            'file_usage'=>  'androidAPK',
        ]);
    }
}
