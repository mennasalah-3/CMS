<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=DB::table('users')->where('email','bondokk3011@gmail.com')->first();
        if(!$user){ 
            User::create([
                'name' => 'menna',
                'email'=>'bondokk3011@gmail.com',
                'password'=>Hash::make('12345678'),
                'role'=>'admin'
            ]);
        }
    }
}
