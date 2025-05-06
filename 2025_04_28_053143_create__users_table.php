<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Lấy ID của các roles
        $cashierRole = DB::table('roles')->where('role_code', 'cashier')->first();
        $waiterRole = DB::table('roles')->where('role_code', 'waiter')->first();
        $chefRole = DB::table('roles')->where('role_code', 'chef')->first();
        $barRole = DB::table('roles')->where('role_code', 'bar')->first();
        $managerRole = DB::table('roles')->where('role_code', 'manager')->first();
        $supervisorRole = DB::table('roles')->where('role_code', 'supervisor')->first();

        // Thêm thu ngân
        DB::table('users')->insert([
            'staff_code' => 'TG001',
            'name' => 'Thu Ngân 1',
            'phone' => '0123456789',
            'password' => Hash::make('password'),
            'role_id' => $cashierRole->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Thêm 20 phục vụ
        for ($i = 1; $i <= 20; $i++) {
            DB::table('users')->insert([
                'staff_code' => 'PV' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'name' => 'Phục Vụ ' . $i,
                'phone' => '0123456789' . $i,
                'password' => Hash::make('password'),
                'role_id' => $waiterRole->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Thêm 10 bếp
        for ($i = 1; $i <= 10; $i++) {
            DB::table('users')->insert([
                'staff_code' => 'BEP' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'name' => 'Bếp ' . $i,
                'phone' => '0123456789' . $i,
                'password' => Hash::make('password'),
                'role_id' => $chefRole->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Thêm 2 bar
        for ($i = 1; $i <= 2; $i++) {
            DB::table('users')->insert([
                'staff_code' => 'BAR' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'name' => 'Bar ' . $i,
                'phone' => '0123456789' . $i,
                'password' => Hash::make('password'),
                'role_id' => $barRole->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Thêm 1 quản lý
        DB::table('users')->insert([
            'staff_code' => 'QL001',
            'name' => 'Quản Lý',
            'phone' => '0123456789',
            'password' => Hash::make('password'),
            'role_id' => $managerRole->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Thêm 2 giám sát
        for ($i = 1; $i <= 2; $i++) {
            DB::table('users')->insert([
                'staff_code' => 'GS' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'name' => 'Giám Sát ' . $i,
                'phone' => '0123456789' . $i,
                'password' => Hash::make('password'),
                'role_id' => $supervisorRole->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
