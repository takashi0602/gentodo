<?php

use Illuminate\Database\Seeder;
use App\Record;

class RecordTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Record::truncate();

      $title = [
        '', '', '', ''
      ];

      for($i = 0; $i < 3; $i++) {
        DB::table('records')->insert([
          'amount' => 5,
          'title' => "駆け出しのペンギン",
        ]);
      }
    }
}
