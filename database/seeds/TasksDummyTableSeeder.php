<?php
use Illuminate\Database\Seeder;

class TicketsDummyTableSeeder extends Seeder
{

  /**
   * Auto generated seed file
   *
   * @return void
   */
  public function run()
  {
    factory(App\Ticket::class, 175)->create()->each(function ($c) {

    });
  }
}
