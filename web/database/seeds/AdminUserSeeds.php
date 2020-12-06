<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminUserSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // adminList User Add
        $adminList = new \App\Model\AdminList();
        $adminList->Name = '유희상';
        $adminList->Email = 'emop99@naver.com';
        $adminList->Password = '384cbfad4eff62f9a06a6912a352c178d265f591b55052aae6ff9f8940d3ae9c';
        $adminList->save();
    }
}
