<?php 

use \Illuminate\Database\Eloquent\Model as Eloquent;

class Channels extends Eloquent {

    protected $table = "channels"; // table name
    protected $fillable = ['channel_id', 
                            'channel_name', 
                            'channel_key',
                            'channel_field',
                            'channel_result',
                            'channel_refresh'];
    public $timestamps = true;
}