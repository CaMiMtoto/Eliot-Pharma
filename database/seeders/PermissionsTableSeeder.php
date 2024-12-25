<?php

namespace Database\Seeders;

use App\Constants\AppPermission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = AppPermission::getPermissions();
        foreach ($permissions as $permission) {
            // replace _ with empty space
            $permissionDescription = str_replace('_', ' ', $permission);
            $permissionDescription = ucfirst(strtolower($permissionDescription));
            // update or create permission
            $permissionDescription="Permission to $permissionDescription";
            Permission::query()
                ->updateOrCreate(
                    ['name' => $permission],
                    ['name' => $permission, 'description' => $permissionDescription]
                );

        }
    }
}
