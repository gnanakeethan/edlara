<?php

class StudentTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('students')->delete();
        $extra = ['1', '2', '3', '4'];
        $extra = serialize($extra);
        Student::create(['user_id' => 1, 'email' => 'johndoe@example.com', 'dob' => '1996-01-01', 'extra' => $extra]);
    }
}
