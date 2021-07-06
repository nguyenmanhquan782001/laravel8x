<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => "Trần Hữu Thiện",
                'email' => "thienth@fpt.edu.vn",
                'password' => '123456',
                'phone_number' => '0987654321'
            ],
            [
                'name' => "Trần Hữu Nam",
                'email' => "namth@fpt.edu.vn",
                'password' => '123456',
                'phone_number' => '0987654322'
            ]
        ];

        foreach($data as $item){
            $user = new User();
            $user->name = $item['name'];
            $user->email = $item['email'];
            $user->password = Hash::make($item['password']);
            $user->phone_number = $item['phone_number'];
            $user->save();
        }
    }
}
