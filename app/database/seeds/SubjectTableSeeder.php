<?php

class SubjectTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('subjects')->delete();
        Subject::create(['subjectcode' => 'SC6', 'grade'=>'6', 'subjectname'=>'Science']);
        Subject::create(['subjectcode' => 'MA6', 'grade'=>'6', 'subjectname'=>'Maths']);
        Subject::create(['subjectcode' => 'HI6', 'grade'=>'6', 'subjectname'=>'History']);
        Subject::create(['subjectcode' => 'EN6', 'grade'=>'6', 'subjectname'=>'English']);
        Subject::create(['subjectcode' => 'GE6', 'grade'=>'6', 'subjectname'=>'Geography']);
        Subject::create(['subjectcode' => 'CI6', 'grade'=>'6', 'subjectname'=>'Citizenship Education']);
        Subject::create(['subjectcode' => 'TA6', 'grade'=>'6', 'subjectname'=>'Tamil']);
        Subject::create(['subjectcode' => 'SI6', 'grade'=>'6', 'subjectname'=>'Sinhala']);
        Subject::create(['subjectcode' => 'HS6', 'grade'=>'6', 'subjectname'=>'Health Science']);

        Subject::create(['subjectcode' => 'SC7', 'grade'=>'7', 'subjectname'=>'Science']);
        Subject::create(['subjectcode' => 'MA7', 'grade'=>'7', 'subjectname'=>'Maths']);
        Subject::create(['subjectcode' => 'HI7', 'grade'=>'7', 'subjectname'=>'History']);
        Subject::create(['subjectcode' => 'EN7', 'grade'=>'7', 'subjectname'=>'English']);
        Subject::create(['subjectcode' => 'GE7', 'grade'=>'7', 'subjectname'=>'Geography']);
        Subject::create(['subjectcode' => 'CI7', 'grade'=>'7', 'subjectname'=>'Citizenship Education']);
        Subject::create(['subjectcode' => 'TA7', 'grade'=>'7', 'subjectname'=>'Tamil']);
        Subject::create(['subjectcode' => 'SI7', 'grade'=>'7', 'subjectname'=>'Sinhala']);
        Subject::create(['subjectcode' => 'HS7', 'grade'=>'7', 'subjectname'=>'Health Science']);

        Subject::create(['subjectcode' => 'SC8', 'grade'=>'8', 'subjectname'=>'Science']);
        Subject::create(['subjectcode' => 'MA8', 'grade'=>'8', 'subjectname'=>'Maths']);
        Subject::create(['subjectcode' => 'HI8', 'grade'=>'8', 'subjectname'=>'History']);
        Subject::create(['subjectcode' => 'EN8', 'grade'=>'8', 'subjectname'=>'English']);
        Subject::create(['subjectcode' => 'GE8', 'grade'=>'8', 'subjectname'=>'Geography']);
        Subject::create(['subjectcode' => 'CI8', 'grade'=>'8', 'subjectname'=>'Citizenship Education']);
        Subject::create(['subjectcode' => 'TA8', 'grade'=>'8', 'subjectname'=>'Tamil']);
        Subject::create(['subjectcode' => 'SI8', 'grade'=>'8', 'subjectname'=>'Sinhala']);
        Subject::create(['subjectcode' => 'HS8', 'grade'=>'8', 'subjectname'=>'Health Science']);

        Subject::create(['subjectcode' => 'SC9', 'grade'=>'9', 'subjectname'=>'Science']);
        Subject::create(['subjectcode' => 'MA9', 'grade'=>'9', 'subjectname'=>'Maths']);
        Subject::create(['subjectcode' => 'HI9', 'grade'=>'9', 'subjectname'=>'History']);
        Subject::create(['subjectcode' => 'EN9', 'grade'=>'9', 'subjectname'=>'English']);
        Subject::create(['subjectcode' => 'GE9', 'grade'=>'9', 'subjectname'=>'Geography']);
        Subject::create(['subjectcode' => 'CI9', 'grade'=>'9', 'subjectname'=>'Citizenship Education']);
        Subject::create(['subjectcode' => 'TA9', 'grade'=>'9', 'subjectname'=>'Tamil']);
        Subject::create(['subjectcode' => 'SI9', 'grade'=>'9', 'subjectname'=>'Sinhala']);
        Subject::create(['subjectcode' => 'HS9', 'grade'=>'9', 'subjectname'=>'Health Science']);

        Subject::create(['subjectcode' => 'SC10', 'grade'=>'10', 'subjectname'=>'Science']);
        Subject::create(['subjectcode' => 'MA10', 'grade'=>'10', 'subjectname'=>'Maths']);
        Subject::create(['subjectcode' => 'HI10', 'grade'=>'10', 'subjectname'=>'History']);
        Subject::create(['subjectcode' => 'EN10', 'grade'=>'10', 'subjectname'=>'English']);
        Subject::create(['subjectcode' => 'TA10', 'grade'=>'10', 'subjectname'=>'Tamil']);
        Subject::create(['subjectcode' => 'SI10', 'grade'=>'10', 'subjectname'=>'Sinhala']);

        Subject::create(['subjectcode' => 'SC11', 'grade'=>'11', 'subjectname'=>'Science']);
        Subject::create(['subjectcode' => 'MA11', 'grade'=>'11', 'subjectname'=>'Maths']);
        Subject::create(['subjectcode' => 'HI11', 'grade'=>'11', 'subjectname'=>'History']);
        Subject::create(['subjectcode' => 'EN11', 'grade'=>'11', 'subjectname'=>'English']);
        Subject::create(['subjectcode' => 'TA11', 'grade'=>'11', 'subjectname'=>'Tamil']);
        Subject::create(['subjectcode' => 'SI11', 'grade'=>'11', 'subjectname'=>'Sinhala']);

        Subject::create(['subjectcode' => 'CM12', 'grade'=>'12', 'subjectname'=>'Combined Maths']);
        Subject::create(['subjectcode' => 'C12', 'grade'=>'12', 'subjectname'=>'Chemistry']);
        Subject::create(['subjectcode' => 'P12', 'grade'=>'12', 'subjectname'=>'Physics']);
        Subject::create(['subjectcode' => 'B12', 'grade'=>'12', 'subjectname'=>'Bio Science']);
        Subject::create(['subjectcode' => 'ET12', 'grade'=>'12', 'subjectname'=>'Engineering Technology']);
        Subject::create(['subjectcode' => 'ST12', 'grade'=>'12', 'subjectname'=>'Science For Technology']);
        Subject::create(['subjectcode' => 'IT12', 'grade'=>'12', 'subjectname'=>'Information Communication Technology']);
    }
}
