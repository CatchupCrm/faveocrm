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
    $createTicket = new Permissions;
    $createTicket->name = 'Create ticket';
    $createTicket->slug = 'ticket.create';
    $createTicket->description = 'Permission to create ticket';
    $createTicket->save();
    $updateTicket = new Permissions;
    $updateTicket->name = 'Update ticket';
    $updateTicket->slug = 'ticket.update';
    $updateTicket->description = 'Permission to update ticket';
    $updateTicket->save();
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
