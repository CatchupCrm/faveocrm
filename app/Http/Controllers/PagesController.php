<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Ticket;
use Carbon;
use App\Relation;
use DB;
use App\User;
use App\Settings;
use App\Leads;
use App\Repositories\User\UserRepositoryContract;
use App\Repositories\Relation\RelationRepositoryContract;
use App\Repositories\Setting\SettingRepositoryContract;
use App\Repositories\Ticket\TicketRepositoryContract;
use App\Repositories\Lead\LeadRepositoryContract;

class PagesController extends Controller
{

  protected $users;
  protected $relations;
  protected $settings;
  protected $tickets;
  protected $leads;

  public function __construct(
    UserRepositoryContract $users,
    RelationRepositoryContract $relations,
    SettingRepositoryContract $settings,
    ticketRepositoryContract $tickets,
    leadRepositoryContract $leads
  )
  {
    $this->users = $users;
    $this->relations = $relations;
    $this->settings = $settings;
    $this->tickets = $tickets;
    $this->leads = $leads;
  }

  public function dashboard()
  {
    /**
     * Other Statistics
     *
     */
    $companyname = $this->settings->getCompanyName();
    $users = $this->users->getAllUsers();
    $totalRelations = $this->relations->getAllRelationsCount();
    $totalTimeSpent = $this->tickets->totalTimeSpent();
    /**
     * Statistics for all-time tickets.
     *
     */
    $alltickets = $this->tickets->allTickets();
    $allCompletedTickets = $this->tickets->allCompletedTickets();
    $totalPercentageTickets = $this->tickets->percantageCompleted();
    /**
     * Statistics for today tickets.
     *
     */
    $completedTicketsToday = $this->tickets->completedTicketsToday();
    $createdTicketsToday = $this->tickets->createdTicketsToday();
    /**
     * Statistics for tickets this month.
     *
     */
    $ticketCompletedThisMonth = $this->tickets->completedTicketsThisMonth();
    /**
     * Statistics for tickets each month(For Charts).
     *
     */
    $createdTicketsMonthly = $this->tickets->createdTicketsMothly();
    $completedTicketsMonthly = $this->tickets->completedTicketsMothly();
    /**
     * Statistics for all-time Leads.
     *
     */
    $allleads = $this->leads->allLeads();
    $allCompletedLeads = $this->leads->allCompletedLeads();
    $totalPercentageLeads = $this->leads->percantageCompleted();
    /**
     * Statistics for today leads.
     *
     */
    $completedLeadsToday = $this->leads->completedLeadsToday();
    $createdLeadsToday = $this->leads->completedLeadsToday();
    /**
     * Statistics for leads this month.
     *
     */
    $leadCompletedThisMonth = $this->leads->completedLeadsThisMonth();
    /**
     * Statistics for leads each month(For Charts).
     *
     */
    $completedLeadsMonthly = $this->leads->createdLeadsMonthly();
    $createdLeadsMonthly = $this->leads->completedLeadsMonthly();
    return view('pages.dashboard', compact(
      'completedTicketsToday',
      'completedLeadsToday',
      'createdTicketsToday',
      'createdLeadsToday',
      'createdTicketsMonthly',
      'completedTicketsMonthly',
      'completedLeadsMonthly',
      'createdLeadsMonthly',
      'ticketCompletedThisMonth',
      'leadCompletedThisMonth',
      'totalTimeSpent',
      'totalRelations',
      'users',
      'companyname',
      'alltickets',
      'allCompletedTickets',
      'totalPercentageTickets',
      'allleads',
      'allCompletedLeads',
      'totalPercentageLeads'
    ));
  }
}
