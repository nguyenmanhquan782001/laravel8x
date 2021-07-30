<?php

namespace Database\Seeders;

use App\Models\Backend\RolesModel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['role_name' => "admin" , 'display_name' => 'Quản trị hệ thống'] ,
            ['role_name' => "guest" , 'display_name' => 'Khách hàng'] ,
            ['role_name' => "dev" , 'display_name' => 'Phát triển'] ,
            ['role_name' => "contents" , 'display_name' => 'Nội dung'] ,
        ]) ;
    }
}
