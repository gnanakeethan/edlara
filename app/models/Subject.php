<?php

class Subject extends Eloquent
{
    protected $guarded = ['id'];
    //making softdelete true. to enable trashing.
    protected $softDelete = true;
    public static $rules = [];
}
