<?php

namespace Database\Seeders;

use App\Enums\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // User::factory()
        //         ->count(8)
        //         ->sequence(
        //             [
        //                 'name' => 'Admin Umum',
        //                 'email' => 'umum@radenintan.ac.id',
        //                 'phone' => '0813676311999',
        //                 'password' => Hash::make('admin'),
        //                 'role' => Role::ADMIN->status(),
        //             ],
        //             [
        //                 'name' => 'Rektor',
        //                 'email' => 'wanjamaluddin@radenintan.ac.id',
        //                 'phone' => '080808080808',
        //                 'password' => Hash::make('staff'),
        //                 'role' => Role::STAFF->status(),
        //             ],
        //             [
        //                 'name' => 'Wakil Rektor 1',
        //                 'email' => 'alamsyah@radenintan.ac.id',
        //                 'phone' => '080808080808',
        //                 'password' => Hash::make('staff'),
        //                 'role' => Role::STAFF->status(),
        //             ],
        //             [
        //                 'name' => 'Wakil Rektor 2',
        //                 'email' => 'safari@radenintan.ac.id',
        //                 'phone' => '080808080808',
        //                 'password' => Hash::make('staff'),
        //                 'role' => Role::STAFF->status(),
        //             ],
        //             [
        //                 'name' => 'Wakil Rektor 3',
        //                 'email' => 'idrus.ruslan@radenintan.ac.id',
        //                 'phone' => '080808080808',
        //                 'password' => Hash::make('staff'),
        //                 'role' => Role::STAFF->status(),
        //             ],
        //             [
        //                 'name' => 'Direktur Pascasarjana',
        //                 'email' => 'ruslan.ruslan@radenintan.ac.id',
        //                 'phone' => '080808080808',
        //                 'password' => Hash::make('staff'),
        //                 'role' => Role::STAFF->status(),
        //             ],
        
        //             [
        //                 'name' => 'dummy admin 1',
        //                 'email' => 'staff1@admin.com',
        //                 'phone' => '111111111111',
        //                 'password' => Hash::make('staff'),
        //                 'role' => Role::STAFF->status(),
        //             ],
        //             [
        //                 'name' => 'dummy admin 2',
        //                 'email' => 'staff2@admin.com',
        //                 'phone' => '222222222222',
        //                 'password' => Hash::make('staff'),
        //                 'role' => Role::STAFF->status(),
        //             ],
        //         )
        //         ->create();


        User::factory()->create([
                'name' => 'Admin Umum',
                'email' => 'umum@radenintan.ac.id',
                'phone' => '0813676311999',
                'password' => Hash::make('admin'),
                'role' => Role::ADMIN->status(),
        ]);
    }
}