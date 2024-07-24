<?php

namespace Database\Seeders;

use App\Models\Config;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Config::insert([
            [
                'code' => 'default_password',
                'value' => 'admin',
            ],
            [
                'code' => 'page_size',
                'value' => '15',
            ],
            [
                'code' => 'app_name',
                'value' => 'Aplikasi Tata Persuratan',
            ],
            [
                'code' => 'institution_name',
                'value' => 'UIN Raden Intan Lampung',
            ],
            [
                'code' => 'institution_address',
                'value' => 'Jl. Endro Suratmin',
            ],
            [
                'code' => 'institution_phone',
                'value' => '081367631999',
            ],
            [
                'code' => 'institution_email',
                'value' => 'umum@radenintan.ac.id',
            ],
            [
                'code' => 'language',
                'value' => 'id',
            ],
            [
                'code' => 'pic',
                'value' => 'Reza Octaviany',
            ],
        ]);
    }
}
