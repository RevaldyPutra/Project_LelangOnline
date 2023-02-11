<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = [
            [
                'name'      => 'admin',
                'username'  => 'admin',
                'password'  => bcrypt('admin'),
                'passwordshow'  => 'admin',
                'level'     => 'admin',
                'telepon'      => '08123456789'
            ],
            [
                'name'      => 'petugas',
                'username'  => 'petugas',
                'password'  => bcrypt('petugas'),
                'passwordshow'  => 'petugas',
                'level'     => 'petugas',
                'telepon'      => '08123456790'
            ],
            [
                'name'      => 'masyarakat',
                'username'  => 'masyarakat',
                'password'  => bcrypt('masyarakat'),
                'passwordshow'  => 'masyarakat',
                'level'     => 'masyarakat',
                'telepon'      => '08123456791'
            ]
            ];
            foreach ($user as $key => $value) {
                User::create($value);
        }
    }
}
