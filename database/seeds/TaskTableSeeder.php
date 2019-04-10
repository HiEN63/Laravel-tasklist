<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskTableSeeder extends Seeder
{


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Tasks = [
            'task_id' => 0,
            'task_sentence' => 'hoge',
            'time_limit' => '2019/01/01/ 0:00:00',
            'time_stamp' => '2019/01/01/ 0:00:00',
            'user_id' => 0,
            'task_status' => 0,
        ];
        DB::table('tasks')->insert($Tasks);
    }
}
