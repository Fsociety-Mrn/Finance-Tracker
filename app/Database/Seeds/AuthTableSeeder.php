<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AuthTableSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'FullName'=>'Account,Admin C', 
            'Age'=>24, 
            'Birthday'=> date("Y-m-d", strtotime("January 30, 2000")), 
            'Username'=>base64_encode('hellofriend'), 
            'Email'=>'lisboamillen30@gmail.com', 
            'Password'=>base64_encode('hellofriend')
        ];

        $this->db->table('Auth_Table')->insert($data);
    }
}
