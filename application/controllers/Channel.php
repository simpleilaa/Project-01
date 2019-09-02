<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Channel extends CI_Controller {


	var $API = "";

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		 //$this->API="http://10.10.122.94:8181/Hirest/hirest-rest"; //local
		$this->API="https://api.thingspeak.com/"; //
		$this->load->library(array('session','form_validation',));
		$this->load->helper(array('url','form','security'));
		$this->load->model(array('M_user','Channels','Entrys','Users'));
		$logged_in = $this->session->userdata('statses')=='login';
		if(!$logged_in){
			redirect(base_url());
		}
	}

	public function index()
	{

		redirect(base_url('channel/dashboard'));
		
	}
	public function dashboard()
	{

		$data['channels'] = Channels::get();
		$this->load->view('V_header');
		$this->load->view('V_channels',$data);
		$this->load->view('V_footer');

	}

	public function add_channels()
	{
		$this->load->view('V_header');
		$this->load->view('V_add_channels');
		$this->load->view('V_footer');
	}

	public function postchannel()
	{
		$channelname = $this->input->post('channelname');
		$channelid = $this->input->post('channelid');
		$channelkey = $this->input->post('apikey');
		$channelfield = $this->input->post('channelfield');

		$data = array(
			'channel_name'		=> $channelname,
			'channel_id'		=> $channelid,
			'channel_key'		=> $channelkey,
			'channel_field'		=> $channelfield
		);
		$post = Channels::create($data);
		if($post){
			redirect(base_url().'channel/dashboard');
		}
	}

	public function detail($id)
	{
		
		if(isset($_GET['setview_time'])&&$_GET['setview_time']!=0&&$_GET['setview_time']!=''){
			$setview = $_GET['setview_time'];
		}else{
			$getChannel = Channels::where('channel_id',$id)->get();
			$channel = json_decode($this->curl->simple_get($this->API . 'channels/'.$id.'/feeds.json?api_key='.$getChannel[0]['channel_key']));
			$entry = array();
			foreach($channel->feeds as $val){
				for($i=1;$i<=$getChannel[0]['channel_field'];$i++){
					$field = 'field'.$i;
					array_push($entry,array(
						'channel_id' 	=> $id,
						'name_field' 	=> $channel->channel->$field,
						'value' 		=> $val->$field,
						'field'			=> $field,
						'entry_id'		=> $val->entry_id,
						'created_at'	=> $val->created_at,
						'updated_at'	=> $val->created_at
					));
				}
			}
			Entrys::where('channel_id',$id)->delete();
			Entrys::insert($entry);
		}
		$temperature = 0;
		$location = 0;
		$humidity = 0;
		$pressure = 0;
		$altitude = 0;
		$fieldtemperature = '';
		$fieldlat = '';
		$fieldlng = '';
		$fieldhumidity = '';
		$fieldpressure = '';
		$fieldaltitude = '';
		$ent = Entrys::where('channel_id',$id)->limit($getChannel[0]['channel_field'])->get();
		
		foreach($ent as $key=>$value){
			$fields = strtolower($value->name_field);
			$fields = explode(' ',$fields);
			for($i=0;$i<count($fields);$i++){
				if($fields[$i] == 'temperature'){
					$temperature = 1;
					$fieldtemperature = $value->field;
				}
				if($fields[$i] == 'latitude'){
					$location = 1;
					$fieldlat = $value->field;
				}
				if($fields[$i] == 'longitude'){
					$location = 1;
					$fieldlng = $value->field;
				}
				if($fields[$i] == 'humidity'){
					$humidity = 1;
					$fieldhumidity = $value->field;
				}
				if($fields[$i] == 'pressure'){
					$pressure = 1;
					$fieldpressure = $value->field;
				}
				if($fields[$i] == 'altitude'){
					$altitude = 1;
					$fieldaltitude = $value->field;
				}
			}
		// var_dump($value->name_field);
		}
		// return false;
		$limit = 6 * $getChannel[0]['channel_field'];
		$data['channels'] = Entrys::where('channel_id',$id)->limit($limit)->get();
		$data['temperature']=$temperature;
		$data['location']=$location;
		$data['humidity']=$humidity;
		$data['pressure']=$pressure;
		$data['altitude']=$altitude;
		$data['fieldtemperature']=Entrys::where('channel_id',$id)->where('field',$fieldtemperature)->limit(10)->orderBy('created_at','DESC')->get();
		$data['fieldlat']=Entrys::where('channel_id',$id)->where('field',$fieldlat)->limit(10)->orderBy('created_at','DESC')->get();
		$data['fieldlng']=Entrys::where('channel_id',$id)->where('field',$fieldlng)->limit(10)->orderBy('created_at','DESC')->get();
		$data['fieldhumidity']=Entrys::where('channel_id',$id)->where('field',$fieldhumidity)->limit(10)->orderBy('created_at','DESC')->get();
		$data['fieldpressure']=Entrys::where('channel_id',$id)->where('field',$fieldpressure)->limit(10)->orderBy('created_at','DESC')->get();
		$data['fieldaltitude']=Entrys::where('channel_id',$id)->where('field',$fieldaltitude)->limit(10)->orderBy('created_at','DESC')->get();
		$data['channelid']=$id;
		$this->load->view('V_header');
		$this->load->view('V_detail',$data);
		$this->load->view('V_footer');
	}

}