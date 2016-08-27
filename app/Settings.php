<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
  protected $fillable = [
    'ticket_complete_allowed',
    'ticket_assign_allowed',
    'lead_complete_allowed',
    'lead_assign_allowed'
  ];

  public function user()
  {
    return $this->belongsTo('App\User');
  }

  public function tickets()
  {
    return $this->belongsTo('App\Ticket');
  }
}
