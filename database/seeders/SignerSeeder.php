<?php

namespace Database\Seeders;

use App\Models\Signer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SignerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Signer::create([
            'code' => 'R',
            'name' => 'Rektor',
            'description' => 'UIN Raden Intan Lampung',
        ]);
    }
}
