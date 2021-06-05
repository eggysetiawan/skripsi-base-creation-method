<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $superadmins = User::create([
            'name' => 'superadmin',
            'username' => 'superadmin',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('superadmin'),
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'bio' => 'Most Powerful user',
            'mobile' => '009988383838',
            'brand' => 'supeardmin',
        ]);

        $willy = User::create([
            'name' => 'willy',
            'username' => 'willy',
            'email' => 'willy@gmail.com',
            'password' => bcrypt('password23'),
            'first_name' => 'Willy',
            'last_name' => 'willy',
            'bio' => 'The 1st User',
            'mobile' => '009988383838',
            'brand' => 'Im photographer',
        ]);

        $demo_customer = User::create([
            'name' => 'Demo Customer',
            'username' => 'customers',
            'email' => 'customer@gmail.com',
            'password' => bcrypt('customers'),
            'first_name' => 'Customer',
            'last_name' => 'customer',
            'bio' => 'The 1st customer',
            'mobile' => '009988383838',
            'brand' => 'Im customer',
        ]);

        $superadmin = Role::create(['name' => 'superadmin']);
        $photographer = Role::create(['name' => 'photographer']);
        $customer = Role::create(['name' => 'customer']);

        Permission::create(['name' => 'openworld']);
        Permission::create(['name' => 'photo']);
        Permission::create(['name' => 'order']);

        $superadmin->givePermissionTo('openworld');
        $superadmin->givePermissionTo('photo');
        $superadmin->givePermissionTo('order');

        $photographer->givePermissionTo('photo');
        $customer->givePermissionTo('order');

        $superadmins->assignRole('superadmin');
        $willy->assignRole('photographer');
        $demo_customer->assignRole('customer');
    }
}
