<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesRelationTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('relation__invoice', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('relation_id')->references('id')->on('relations');
      $table->integer('invoice_id')->references('id')->on('invoices');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::drop('relation__invoice');
  }
}
