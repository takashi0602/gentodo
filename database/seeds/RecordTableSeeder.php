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
        'かけだしのペンギン', 'ふつうのペンギン', '一流のペンギン', '伝説のペンギン'
      ];

      for($i = 0; $i < 4; $i++) {
        DB::table('records')->insert([
          'title' => $title[$i],
        ]);
      }
    }
}
