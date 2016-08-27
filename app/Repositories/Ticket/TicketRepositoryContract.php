<?php
namespace App\Repositories\Task;
interface TaskRepositoryContract
{

  public function find($id);

  public function getTaskTime($id);

  public function create($requestData);

  public function updateStatus($id, $requestData);

  public function updateTime($id, $requestData);

  public function updateAssign($id, $requestData);

  public function invoice($id, $requestData);

  public function allTickets();

  public function allCompletedTickets();

  public function percantageCompleted();

  public function createdTicketsMothly();

  public function completedTicketsMothly();

  public function createdTicketsToday();

  public function completedTicketsToday();

  public function completedTicketsThisMonth();

  public function totalTimeSpent();
}
