<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;


class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //------------ 'Role' ---------- \\
        $roles_permission = ['role','create role', 'edit role', 'delete role'];

        foreach ($roles_permission as $value) {
            Permission::create([
                'name' => $value
            ]);
        }


        //------------ 'Permission' ---------- \\
        $permissions_permission = ['permission','create permission', 'edit permission', 'delete permission'];

        foreach ($permissions_permission as $value) {
            Permission::create([
                'name' => $value
            ]);
        }


        //------------ 'User' ---------- \\

        $users_permission = ['user', 'create user', 'edit user', 'delete user'];

        foreach ($users_permission as $value) {
            Permission::create([
                'name' => $value
            ]);
        }

        //------------ 'Product' ---------- \\

        $products_permission = ['product', 'create product', 'edit product', 'delete product'];

        foreach ($products_permission as $value) {
            Permission::create([
                'name' => $value
            ]);
        }

        //------------ 'Product' ---------- \\

        $products_permission = ['attribute', 'create attribute', 'edit attribute', 'delete attribute'];

        foreach ($products_permission as $value) {
            Permission::create([
                'name' => $value
            ]);
        }



        //------------ 'Category' ---------- \\
        $category_permission = ['category', 'create category', 'edit category', 'delete category'];

        foreach ($category_permission as $value) {
            Permission::create([
                'name' => $value
            ]);
        }


        //------------ 'Config' ---------- \\
        $config_permission = ['edit config', 'delete config', 'logo edit', 'favicon edit'];

        foreach ($config_permission as $value) {
            Permission::create([
                'name' => $value
            ]);
        }


        //------------ 'Order' ---------- \\
        $orders_permission = ['order','delete order'];
        foreach ($orders_permission as $value) {
            Permission::create([
                'name' => $value
            ]);
        }
    }
}
