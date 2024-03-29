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
// 	    date_default_timezone_set('Asia/Jakarta');
// //Contoh Variable Waktu dengan format UTC
// $timeutc = "2019-09-04T17:06:50Z";
// //CONVERT UTC TO LOKAL dengan format tgl/bln/thn jam:menit:detik
// $time1 = strtotime($timeutc.' UTC');
// $format1 = date("Y-m-d H:i:s", $time1);
// //CONVERT UTC TO LOKAL dengan format hanya jam:menit:detik
// $time2 = strtotime($timeutc.' UTC');
// $format2 = date("H:i:s", $time2);
// echo "Contoh Konversi 1 : $format1 <br> Contoh Konversi 2 : $format2";
// return false;
		
		if(isset($_GET['setview_time'])&&$_GET['setview_time']!=0&&$_GET['setview_time']!=''){
			$setview = $_GET['setview_time'];
			if(function_exists('date_default_timezone_set')) date_default_timezone_set('Asia/Jakarta');
			$entryss = Entrys::where('channel_id',$id)->limit(1)->orderBy('created_at','DESC')->get();
			$date = strtotime($entryss[0]['created_at']);
			$selisih = $date-($setview*60);
			$date2 = strtotime(date('Y-m-d H:i:s',$selisih));
			$date2 = date('Y-m-d H:i:s',$date2);
			// var_dump('waktu sekarang'.date('Y-m-d H:i:s',$date).'<br>waktu selisih: '.$date2);
			// return false;
			
			$getChannel = Channels::where('channel_id',$id)->get();
			$channel = json_decode($this->curl->simple_get($this->API . 'channels/'.$id.'/feeds.json?api_key='.$getChannel[0]['channel_key']));
			$entry = array();
			$entid = array();
			foreach($channel->feeds as $val){
				for($i=1;$i<=$getChannel[0]['channel_field'];$i++){
					date_default_timezone_set('Asia/Jakarta');
				    $time1 = strtotime($val->created_at.' UTC');
				    $wibtime = date('Y-m-d H:i:s', $time1);
				    // var_dump($time1);
				    // var_dump($wibtime);
				    // var_dump($val->created_at);
				    // return false;
					$field = 'field'.$i;
					array_push($entry,array(
						'channel_id' 	=> $id,
						'name_field' 	=> $channel->channel->$field,
						'value' 		=> $val->$field,
						'field'			=> $field,
						'entry_id'		=> $val->entry_id,
						'created_at'	=> $wibtime,
						'updated_at'	=> $wibtime
					));
					array_push($entid,$val->entry_id);
				}
			}
			for($i=0;$i<count($entid);$i++){
				Entrys::where('channel_id',$id)->where('entry_id',$entid[$i])->delete();
			}
			Entrys::insert($entry);

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
			$ent = Entrys::where('channel_id',$id)->limit($getChannel[0]['channel_field'])->where('created_at', '>=',$date2)->get();
			
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
			$data['channels'] = Entrys::where('channel_id',$id)->limit($limit)->where('created_at', '>=',$date2)->get();
			$data['temperature']=$temperature;
			$data['location']=$location;
			$data['humidity']=$humidity;
			$data['pressure']=$pressure;
			$data['altitude']=$altitude;
			$data['fieldtemperature']=Entrys::where('channel_id',$id)->where('field',$fieldtemperature)->where('created_at', '>=',$date2)->orderBy('created_at','ASC')->get();
			$data['fieldlat']=Entrys::where('channel_id',$id)->where('field',$fieldlat)->where('created_at', '>=',$date2)->orderBy('created_at','ASC')->get();
			$data['fieldlng']=Entrys::where('channel_id',$id)->where('field',$fieldlng)->orderBy('created_at','ASC')->get();
			$data['fieldhumidity']=Entrys::where('channel_id',$id)->where('field',$fieldhumidity)->where('created_at', '>=',$date2)->orderBy('created_at','ASC')->get();
			// var_dump($data['fieldhumidity'][count($data['fieldhumidity'])-1]['value']);
			// return false;
			$data['fieldpressure']=Entrys::where('channel_id',$id)->where('field',$fieldpressure)->where('created_at', '>=',$date2)->orderBy('created_at','ASC')->get();
			$data['fieldaltitude']=Entrys::where('channel_id',$id)->where('field',$fieldaltitude)->where('created_at', '>=',$date2)->orderBy('created_at','ASC')->get();
			$data['channelid']=$id;
			// $data['from'] = '';
			// $data['to'] = '';
			
		}else{
			$getChannel = Channels::where('channel_id',$id)->get();
			$channel = json_decode($this->curl->simple_get($this->API . 'channels/'.$id.'/feeds.json?api_key='.$getChannel[0]['channel_key']));
			$entry = array();
			$entid = array();
			foreach($channel->feeds as $val){
				for($i=1;$i<=$getChannel[0]['channel_field'];$i++){
					date_default_timezone_set('Asia/Jakarta');
				    $time1 = strtotime($val->created_at.' UTC');
				    $wibtime = date('Y-m-d H:i:s', $time1);
					$field = 'field'.$i;
					array_push($entry,array(
						'channel_id' 	=> $id,
						'name_field' 	=> $channel->channel->$field,
						'value' 		=> $val->$field,
						'field'			=> $field,
						'entry_id'		=> $val->entry_id,
						'created_at'	=> $wibtime,
						'updated_at'	=> $wibtime
					));
					array_push($entid,$val->entry_id);
				}
			}
			// var_dump($entry);
			// return false;
			for($i=0;$i<count($entid);$i++){
				Entrys::where('channel_id',$id)->where('entry_id',$entid[$i])->delete();
			}
			Entrys::insert($entry);
			

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
			// $countent = Entrys::where('channel_id',$id)->groupBy('field')->count();
			// var_dump($countent);
			// return false;
			$counttemp = Entrys::where('channel_id',$id)->where('field',$fieldtemperature)->latest()->take(20)->orderBy('created_at','ASC')->count();
			$countlat = Entrys::where('channel_id',$id)->where('field',$fieldlat)->latest()->take(20)->orderBy('created_at','ASC')->count();
			$countlng = Entrys::where('channel_id',$id)->where('field',$fieldlng)->latest()->take(20)->orderBy('created_at','ASC')->count();
			$counthumidity = Entrys::where('channel_id',$id)->where('field',$fieldhumidity)->latest()->take(20)->orderBy('created_at','ASC')->count();
			$countpressure = Entrys::where('channel_id',$id)->where('field',$fieldpressure)->latest()->take(20)->orderBy('created_at','ASC')->count();
			$countaltitude = Entrys::where('channel_id',$id)->where('field',$fieldaltitude)->latest()->take(20)->orderBy('created_at','ASC')->count();
			$data['channels'] = Entrys::where('channel_id',$id)->limit($limit)->get();
			$data['temperature']=$temperature;
			$data['location']=$location;
			$data['humidity']=$humidity;
			$data['pressure']=$pressure;
			$data['altitude']=$altitude;
			$data['fieldtemperature']=Entrys::where('channel_id',$id)->where('field',$fieldtemperature)->skip($counttemp-20)->take($counttemp-($counttemp-20))->orderBy('created_at','ASC')->get();
			$data['fieldlat']=Entrys::where('channel_id',$id)->where('field',$fieldlat)->skip($countlat-20)->take($countlat-($countlat-20))->orderBy('created_at','ASC')->get();
			$data['fieldlng']=Entrys::where('channel_id',$id)->where('field',$fieldlng)->skip($countlng-20)->take($countlng-($countlng-20))->orderBy('created_at','ASC')->get();
			$data['fieldhumidity']=Entrys::where('channel_id',$id)->where('field',$fieldhumidity)->skip($counthumidity-20)->take($counthumidity-($counthumidity-20))->orderBy('created_at','ASC')->get();
			// var_dump($data['fieldhumidity'][count($data['fieldhumidity'])-1]['value']);
			// return false;
			$data['fieldpressure']=Entrys::where('channel_id',$id)->where('field',$fieldpressure)->skip($countpressure-20)->take($countpressure-($countpressure-20))->orderBy('created_at','ASC')->get();
			$data['fieldaltitude']=Entrys::where('channel_id',$id)->where('field',$fieldaltitude)->skip($countaltitude-20)->take($countaltitude-($countaltitude-20))->orderBy('created_at','ASC')->get();
			$data['channelid']=$id;
			// $data['from'] = '';
			// $data['to'] = '';
		}
		$data['channelname'] = Channels::where('channel_id',$id)->get();
		$this->load->view('V_header');
		$this->load->view('admin/V_detail',$data);
		$this->load->view('V_footer');
	}

}
