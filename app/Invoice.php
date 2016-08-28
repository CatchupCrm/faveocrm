<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
  protected $fillable = [
    'received',
    'sent',
    'payment_date'
  ];

  public function relations()
  {
    return $this->belongsToMany('App\Relation');
  }

  public function tickettime()
  {
    return $this->belongsToMany('App\TicketTime');
  }

}