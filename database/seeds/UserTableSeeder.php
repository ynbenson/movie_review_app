<?php

use Illuminate\Database\Seeder;
use App\User;


class UserTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->delete();
        User::create(array(
            'name'      => 'John Wild',
            'username'  => 'JW123',
            'email'     => 'john_wild@gmail.com',
            'password'  => Hash::make('secret'),
        ));
        
        User::create(array(
            'name'      => 'foo',
            'username'  => 'foo',
            'email'     => 'foo@gmail.com',
            'password'  => Hash::make('foofoo'),
        ));
        
        //DB::table('users')->delete();
    }
}
