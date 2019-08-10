<?php

class Exams extends Eloquent
{
    protected $guarded = ['id'];
    protected $table = 'exams';
    protected $hidden = ['hash'];
    public static $rules = [];
}
