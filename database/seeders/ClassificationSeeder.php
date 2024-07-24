<?php

namespace Database\Seeders;

use App\Models\Classification;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Classification::insert([
        //     [
        //         'code' => 'KU.00.1.1',
        //         'type' => 'Rencana Kerja Anggaran',
        //         'description' => 'Rencana dan penyusunan anggaran-anggaran',
        //     ],
        //     [
        //         'code' => 'KU.00.1.2',
        //         'type' => 'Usulan Penetapan Target Penerimaan Negara',
        //         'description' => 'Rencana dan penyusunan anggaran-anggaran',
        //     ],
        //     [
        //         'code' => 'KU.00.1.3',
        //         'type' => 'Penyusunan RAPB',
        //         'description' => 'Rencana dan penyusunan anggaran-anggaran',
        //     ],
        //     [
        //         'code' => 'KU.00.2.1',
        //         'type' => 'Pembahasan/penelaahan anggaran',
        //         'description' => 'Penyusunan Anggaran',
        //     ],
        //     [
        //         'code' => 'KU.00.2.1',
        //         'type' => 'Pembahasan/penelaahan anggaran',
        //         'description' => 'Penyusunan Anggaran',
        //     ],
        //     [
        //         'code' => 'KU.00.2.1',
        //         'type' => 'Pembahasan/penelaahan anggaran',
        //         'description' => 'Penyusunan Anggaran',
        //     ],
            
        // ]);
        Classification::create([
            'code' => 'KU.00.1.1',
            'type' => 'Rencana Kerja Anggaran',
            'description' => 'Rencana dan penyusunan anggaran-anggaran',
        ]);
    }
}
