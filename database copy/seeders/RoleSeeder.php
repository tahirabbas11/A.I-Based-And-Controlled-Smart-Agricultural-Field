<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdminRole = Role::create([
            'name' => 'super admin'
        ]);
        $adminRole =  Role::create([
            'name' => 'admin',
        ]);
        Role::create([
            'name' => 'customer',
        ]);

        $superAdminRole->syncPermissions(['role','create role', 'edit role', 'delete role','permission','create permission', 'edit permission', 'delete permission']);
        $adminRole->syncPermissions(
            [
                // User Crud
                'user',
                'create user',
                'edit user',
                'delete user',
                //Order Crud
                'order',
                'delete order',
                // Product Crud
                'product',
                'create product',
                'edit product',
                'delete product',
                // Attribute Crud
                'attribute',
                'create attribute',
                'edit attribute',
                'delete attribute',
                // Category Crud
                'category',
                'create category',
                'edit category',
                'delete category',
                // Config Crud
                'edit config',
                'logo edit',
                'favicon edit',
            ]
        );
    }
}
