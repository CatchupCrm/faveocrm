<?php
use Illuminate\Database\Seeder;
use App\PermissionRole;

class RoleUserTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    /**
     * ADMIN ROLES
     *
     */
    $createUser = new PermissionRole;
    $createUser->role_id = '1';
    $createUser->permission_id = '1';
    $createUser->save();
    $updateUser = new PermissionRole;
    $updateUser->role_id = '1';
    $updateUser->permission_id = '2';
    $updateUser->save();
    $deleteUser = new PermissionRole;
    $deleteUser->role_id = '1';
    $deleteUser->permission_id = '3';
    $deleteUser->save();
    $createRelation = new PermissionRole;
    $createRelation->role_id = '1';
    $createRelation->permission_id = '4';
    $createRelation->save();
    $updateRelation = new PermissionRole;
    $updateRelation->role_id = '1';
    $updateRelation->permission_id = '5';
    $updateRelation->save();
    $deleteRelation = new PermissionRole;
    $deleteRelation->role_id = '1';
    $deleteRelation->permission_id = '6';
    $deleteRelation->save();
    $createTicket = new PermissionRole;
    $createTicket->role_id = '1';
    $createTicket->permission_id = '7';
    $createTicket->save();
    $updateTicket = new PermissionRole;
    $updateTicket->role_id = '1';
    $updateTicket->permission_id = '8';
    $updateTicket->save();
    $createLead = new PermissionRole;
    $createLead->role_id = '1';
    $createLead->permission_id = '9';
    $createLead->save();
    $updateLead = new PermissionRole;
    $updateLead->role_id = '1';
    $updateLead->permission_id = '10';
    $updateLead->save();
  }
}
