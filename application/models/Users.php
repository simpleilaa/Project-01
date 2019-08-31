<?php 

use \Illuminate\Database\Eloquent\Model as Eloquent;

class Users extends Eloquent {

    protected $table = "users"; // table name
    protected $fillable = ['username', 
                            'password', 
                            'role'];
    public $timestamps = true;
}