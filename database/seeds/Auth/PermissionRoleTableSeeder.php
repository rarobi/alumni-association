<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

/**
 * Class PermissionRoleTableSeeder.
 */
class PermissionRoleTableSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     */
    public function run()
    {
        $this->disableForeignKeys();

        // Create Roles
        $admin = Role::create(['name' => config('access.users.admin_role')]);
        $executive = Role::create(['name' => 'batch-admin']);
        $payment_receiver_admin = Role::create(['name' => 'payment-receiver-admin']);
        $member = Role::create(['name' => 'member']);
//        $user = Role::create(['name' => config('access.users.default_role')]);

        // Create Permissions
        $permissions = ['view backend', 'view profile', 'view payment'];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // ALWAYS GIVE ADMIN ROLE ALL PERMISSIONS
        $admin->givePermissionTo(Permission::all());

        // Assign Permissions to executive Roles
        $executive->givePermissionTo('view backend');

        // Assign Permissions to member Roles
        $member->givePermissionTo('view profile');

        // Assign Permissions to payment-receiver-admin Roles
        $payment_receiver_admin->givePermissionTo('view payment');

        $this->enableForeignKeys();
    }
}
