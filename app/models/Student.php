<?php

class Student extends Eloquent
{
    protected $guarded = [];

    public static $rules = [];

    //Setting UserID as primary key
    protected $primaryKey = 'user_id';
}
