<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
  protected $fillable = ['name', 'size', 'path', 'file_display', 'fk_relation_id'];

  public function relations()
  {
    $this->belongsTo('relations', 'fk_relation_id');
  }
}
