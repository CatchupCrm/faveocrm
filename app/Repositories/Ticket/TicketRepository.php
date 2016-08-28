<?php
namespace App\Repositories\Ticket;

use App\Ticket;
use Notifynder;
use Carbon;
use App\Activity;
use App\TicketTime;
use DB;
use App\Integration;

class TicketRepository implements TicketRepositoryContract
{

  public function find($id)
  {
    return Tickets::findOrFail($id);
  }

  public function getAssignedRelation($id)
  {
    $tickets = Tickets::findOrFail($id);
    $tickets->relationAssignee;
    return $tickets;
  }

  public function GetTimeForTicket($id)
  {
    $ticketstime = Tickets::findOrFail($id);
    $ticketstime->allTime;
    return $ticketstime;
  }

  public function getTicketTime($id)
  {
    return TicketTime::where('fk_ticket_id', $id)->get();
  }


  public function create($requestData)
  {
    $fk_relation_id = $requestData->get('fk_relation_id');
    $input = $requestData = array_merge(
      $requestData->all(),
      ['fk_user_id_created' => auth()->id(),]
    );
    $ticket = Tickets::create($input);
    $insertedId = $ticket->id;
    Session()->flash('flash_message', 'Ticket successfully added!'); //Snippet in Master.blade.php
    Notifynder::category('ticket.assign')
      ->from(auth()->id())
      ->to($ticket->fk_user_id_assign)
      ->url(url('tickets', $insertedId))
      ->expire(Carbon::now()->addDays(14))
      ->send();
    $activityinput = array_merge(
      ['text' => 'Ticket ' . $ticket->title .
        ' was created by ' . $ticket->ticketCreator->name .
        ' and assigned to' . $ticket->assignee->name,
        'user_id' => Auth()->id(),
        'type' => 'ticket',
        'type_id' => $insertedId]
    );
    Activity::create($activityinput);
    return $insertedId;
  }

  public function updateStatus($id, $requestData)
  {
    $ticket = Tickets::findOrFail($id);
    $input = $requestData->get('status');
    $input = array_replace($requestData->all(), ['status' => 2]);
    $ticket->fill($input)->save();
    $activityinput = array_merge(
      ['text' => 'Ticket was completed by ' . Auth()->user()->name,
        'user_id' => Auth()->id(),
        'type' => 'ticket',
        'type_id' => $id]
    );
    Activity::create($activityinput);
  }

  public function updateTime($id, $requestData)
  {
    $ticket = Tickets::findOrFail($id);
    $input = array_replace($requestData->all(), ['fk_ticket_id' => "$ticket->id"]);
    TicketTime::create($input);
    $activityinput = array_merge(
      ['text' => Auth()->user()->name . ' Inserted a new time for this ticket',
        'user_id' => Auth()->id(),
        'type' => 'ticket',
        'type_id' => $id]
    );
    Activity::create($activityinput);
  }

  public function updateAssign($id, $requestData)
  {
    $ticket = Tickets::with('assignee')->findOrFail($id);
    $input = $requestData->get('fk_user_id_assign');
    $input = array_replace($requestData->all());
    $ticket->fill($input)->save();
    $ticket = $ticket->fresh();
    $insertedName = $ticket->assignee->name;
    $activityinput = array_merge(
      ['text' => auth()->user()->name . ' assigned ticket to ' . $insertedName,
        'user_id' => auth()->id(),
        'type' => 'ticket',
        'type_id' => $id]
    );
    Activity::create($activityinput);
  }

  public function invoice($id, $requestData)
  {
    $contatGuid = $requestData->invoiceContact;
    $ticketname = Tickets::find($id);
    $timemanger = TicketTime::where('fk_ticket_id', $id)->get();
    $sendMail = $requestData->sendMail;
    $productlines = [];
    foreach ($timemanger as $time) {
      $productlines[] = array(
        'Description' => $time->title,
        'Comments' => $time->comment,
        'BaseAmountValue' => $time->value,
        'Quantity' => $time->time,
        'AccountNumber' => 1000,
        'Unit' => 'hours');
    }
    $api = Integration::getApi('billing');
    $results = $api->createInvoice([
      'Currency' => 'DKK',
      'Description' => $ticketname->title,
      'contactId' => $contatGuid,
      'ProductLines' => $productlines]);
    if ($sendMail == true) {
      $bookGuid = $booked->Guid;
      $bookTime = $booked->TimeStamp;
      $api->sendInvoice($bookGuid, $bookTime);
    }
  }

  /**
   * Statistics for Dashboard
   */
  public function allTickets()
  {
    return Tickets::all()->count();
  }

  public function allCompletedTickets()
  {
    return Tickets::where('status', 2)->count();
  }

  public function percantageCompleted()
  {
    if (!$this->allTickets() || !$this->allCompletedTickets()) {
      $totalPercentageTickets = 0;
    } else {
      $totalPercentageTickets = $this->allCompletedTickets() / $this->allTickets() * 100;
    }
    return $totalPercentageTickets;
  }

  public function createdTicketsMothly()
  {
    return DB::table('tickets')
      ->select(DB::raw('count(*) as month, created_at'))
      ->groupBy(DB::raw('YEAR(created_at), MONTH(created_at)'))
      ->get();
  }

  public function completedTicketsMothly()
  {
    return DB::table('tickets')
      ->select(DB::raw('count(*) as month, updated_at'))
      ->where('status', 2)
      ->groupBy(DB::raw('YEAR(updated_at), MONTH(updated_at)'))
      ->get();
  }

  public function createdTicketsToday()
  {
    return Tickets::whereRaw(
      'date(created_at) = ?',
      [Carbon::now()->format('Y-m-d')]
    )->count();
  }

  public function completedTicketsToday()
  {
    return Tickets::whereRaw(
      'date(updated_at) = ?',
      [Carbon::now()->format('Y-m-d')]
    )->where('status', 2)->count();
  }

  public function completedTicketsThisMonth()
  {
    return DB::table('tickets')
      ->select(DB::raw('count(*) as total, updated_at'))
      ->where('status', 2)
      ->whereBetween('updated_at', array(Carbon::now()->startOfMonth(), Carbon::now()))->get();
  }

  public function totalTimeSpent()
  {
    return DB::table('tickets_time')
      ->select(DB::raw('SUM(time)'))
      ->get();
  }
}
