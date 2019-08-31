<?php 

use \Illuminate\Database\Eloquent\Model as Eloquent;

class Entrys extends Eloquent {

    protected $table = "entrys"; // table name
    protected $fillable = ['entry_id', 
                            'channel_id',
                            'name_field',
                            'field',
                            'value'];
    public $timestamps = false;
}