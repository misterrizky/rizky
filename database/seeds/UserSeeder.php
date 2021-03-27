<?php

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
        User::create([
            'name' => 'Rizky Ramadhan',
            'username' => 'misterrizky',
            'email' => 'misterrizky@aol.com',
            'email_verified_at' => date('Y-m-d H:i:s'),
            'password' => Hash::make('cacadmentalz'),
            'roles' => 'Super Admin'
        ]);
    }
}
