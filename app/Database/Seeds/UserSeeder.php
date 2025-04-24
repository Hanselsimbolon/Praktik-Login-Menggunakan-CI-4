<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'username' => 'admin',
            'password' => password_hash('12345', PASSWORD_DEFAULT),
        ];

        // pastikan 'users' adalah nama tabelnya
        $this->db->table('users')->insert($data);
    }
}
