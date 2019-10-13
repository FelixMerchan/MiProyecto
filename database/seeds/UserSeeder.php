<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([

            'id'=>'1',
            'name'=>'Félix Merchán',
            'estado'=> 1,
            'email'=> 'elvis_merchan@hotmail.com',
            'password'=> bcrypt('26e04f92'),
            'email_verified_at'=>"2019-04-01 12:31:15",

        ]);
    }
}
