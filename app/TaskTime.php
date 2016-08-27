<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskTime extends Model
{
  protected $fillable = [
    'time',
    'overtime',
    'fk_ticket_id',
    'title',
    'comment',
    'value'
  ];

  protected $hidden = ['remember_token'];

  protected $table = 'tickets_time';

  public function tickets()
  {
    return $this->belongsTo('App\Ticket');
  }

  public function invoices()
  {
    return $this->belongsToMany('App\Invoice');
  }
}
