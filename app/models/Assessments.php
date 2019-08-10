<?php

class Assessments extends Eloquent
{
    protected $guarded = ['id', 'teacherid', 'studentid', 'subjectid', 'tutorialid'];

    public static $rules = [];
}
