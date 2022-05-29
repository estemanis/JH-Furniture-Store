<?php

namespace Database\Seeders;

use App\Models\Account;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $account = new Account();
        $account->fullname = "Admin";
        $account->email = "admin1@gmail.com";
        $account->password = "admin";
        $account->password = bcrypt($account->password);
        $account->address = "Jalan Bogor Baru 11";
        $account->gender = "Male";
        $account->role = "Admin";  
        $account->save(); 

        $account = new Account();
        $account->fullname = "Robert";
        $account->email = "robert@gmail.com";
        $account->password = "Admin";
        $account->password = bcrypt($account->password);
        $account->address = "Jalan Bogor Baru 12";
        $account->gender = "Male";
        $account->role = "Admin";  
        $account->save(); 
    }
}
