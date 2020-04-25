<?php

use App\TypeUser;
use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TypeUser::create([
            'name'		=> 'Adminastrador'
        ]);

        TypeUser::create([
            'name'		=> 'Usuario'
        ]);

        User::getAdmin();
        User::getUser();

        factory(App\User::class, 10)->create();

    }
}
