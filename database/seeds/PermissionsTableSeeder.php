<?php
use Illuminate\Database\Seeder;
use App\Permissions;

class PermissionsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    /**
     * User Permissions
     */
    $createUser = new Permissions;
    $createUser->name = 'Create user';
    $createUser->slug = 'user.create';
    $createUser->description = 'Permission to create user';
    $createUser->save();
    $updateUser = new Permissions;
    $updateUser->name = 'Update user';
    $updateUser->slug = 'user.update';
    $updateUser->description = 'Permission to update user';
    $updateUser->save();
    $deleteUser = new Permissions;
    $deleteUser->name = 'Delete user';
    $deleteUser->slug = 'user.delete';
    $deleteUser->description = 'Permission to update delete';
    $deleteUser->save();
    /**
     * Relation Permissions
     */
    $createRelation = new Permissions;
    $createRelation->name = 'Create relation';
    $createRelation->slug = 'relation.create';
    $createRelation->description = 'Permission to create relation';
    $createRelation->save();
    $updateRelation = new Permissions;
    $updateRelation->name = 'Update relation';
    $updateRelation->slug = 'relation.update';
    $updateRelation->description = 'Permission to update relation';
    $updateRelation->save();
    $deleteRelation = new Permissions;
    $deleteRelation->name = 'Delete relation';
    $deleteRelation->slug = 'relation.delete';
    $deleteRelation->description = 'Permission to delete relation';
    $deleteRelation->save();
    /**
     * Tickets Permissions
     */
    $createTask = new Permissions;
    $createTask->name = 'Create ticket';
    $createTask->slug = 'ticket.create';
    $createTask->description = 'Permission to create ticket';
    $createTask->save();
    $updateTask = new Permissions;
    $updateTask->name = 'Update ticket';
    $updateTask->slug = 'ticket.update';
    $updateTask->description = 'Permission to update ticket';
    $updateTask->save();
    /**
     * Leads Permissions
     */
    $createLead = new Permissions;
    $createLead->name = 'Create lead';
    $createLead->slug = 'lead.create';
    $createLead->description = 'Permission to create lead';
    $createLead->save();
    $updateLead = new Permissions;
    $updateLead->name = 'Update lead';
    $updateLead->slug = 'lead.update';
    $updateLead->description = 'Permission to update lead';
    $updateLead->save();
  }
}
