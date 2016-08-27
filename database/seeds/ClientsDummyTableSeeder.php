<?php
use Illuminate\Database\Seeder;

class RelationsDummyTableSeeder extends Seeder
{

  /**
   * Auto generated seed file
   *
   * @return void
   */
  public function run()
  {
    factory(App\Relation::class, 50)->create()->each(function ($c) {

    });
  }
}
