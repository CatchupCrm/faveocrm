<?php
namespace App\Repositories\Relation;
interface RelationRepositoryContract
{

  public function find($id);

  public function listAllRelations();

  public function getInvoices($id);

  public function getAllRelationsCount();

  public function listAllIndustries();

  public function create($requestData);

  public function update($id, $requestData);

  public function destroy($id);

  public function vat($requestData);
}
