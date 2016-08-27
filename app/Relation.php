<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Relation extends Model
{

  protected $fillable = [
    'name',
    'company_name',
    'vat',
    'email',
    'address',
    'zipcode',
    'city',
    'primary_number',
    'secondary_number',
    'industry_id',
    'company_type',
    'fk_user_id'];

  public function userAssignee()
  {
    return $this->belongsTo('App\User', 'fk_user_id', 'id');
  }

  public function alltickets()
  {
    return $this->hasMany('App\Ticket', 'fk_relation_id', 'id')
      ->orderBy('status', 'asc')
      ->orderBy('created_at', 'desc');
  }

  public function allleads()
  {
    return $this->hasMany('App\Leads', 'fk_relation_id', 'id')
      ->orderBy('status', 'asc')
      ->orderBy('created_at', 'desc');
  }

  public function tickets()
  {
    return $this->hasMany('App\Ticket', 'fk_relation_id', 'id');
  }

  public function leads()
  {
    return $this->hasMany('App\Leads', 'fk_relation_id', 'id');
  }

  public function documents()
  {
    return $this->hasMany('App\Document', 'fk_relation_id', 'id');
  }

  public function invoices()
  {
    return $this->belongsToMany('App\Invoice');
  }

}
