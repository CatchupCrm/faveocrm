<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon;

class Ticket extends Model
{
  protected $fillable = [
    'title',
    'description',
    'status',
    'fk_user_id_assign',
    'fk_user_id_created',
    'fk_relation_id',
    'deadline'
  ];
  protected $dates = ['deadline'];

  protected $hidden = ['remember_token'];

  public function assignee()
  {
    return $this->belongsTo('App\User', 'fk_user_id_assign');
  }

  public function relationAssignee()
  {
    return $this->belongsTo('App\Relation', 'fk_relation_id');
  }

  public function ticketCreator()
  {
    return $this->belongsTo('App\User', 'fk_user_id_created');
  }

  public function comments()
  {
    return $this->hasMany('App\Comment', 'fk_ticket_id', 'id');
  }

  // create a virtual attribute to return the days until deadline
  public function getDaysUntilDeadlineAttribute()
  {
    return Carbon\Carbon::now()
      ->startOfDay()
      ->diffInDays($this->deadline, false); // if you are past your deadline, the value returned will be negative.
  }

  public function settings()
  {
    return $this->hasMany('App\Settings');
  }

  public function time()
  {
    return $this->hasOne('App\TicketTime', 'fk_ticket_id', 'id');
  }

  public function allTime()
  {
    return $this->hasMany('App\TicketTime', 'fk_ticket_id', 'id');
  }

  public function activity()
  {
    return $this->hasMany('App\Activity', 'type_id', 'id')->where('type', 'ticket');
  }
}
