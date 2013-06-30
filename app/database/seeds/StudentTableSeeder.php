<?php

class StudentTableSeeder extends DatabaseSeeder {
    public function run() {

        DB::table('students') -> delete();
        $extra = array('grade' => '12', 'stream' => 'Maths', 'choices' => array('CM', 'P', 'C'), );
        $extra = serialize($extra);
        Student::create(array('user_id' => 1, 'email' => 'johndoe@example.com', 'dob' => '1996-01-01', 'extra' => $extra));
    }

}