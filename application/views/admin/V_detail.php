<meta http-equiv="refresh" content="60">
<style type="text/css">
    .title-label{
        color: black;
        background-color: #dee2e6;
        padding: 10px 30px 10px 30px;
    }

    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: transparent;
        background-clip: border-box;
        border: 1px solid black;
        border-radius: 0px;
        width: 300px;
        height: 250px;

    }

    .thermometer{
        margin:50% 0 0 50%;
        left:0px;
        top:-100px;
        width:22px;
        height:150px;
        display:block;
        font:bold 14px/152px helvetica, arial, sans-serif;
        text-align:center;
        text-indent: 36px;
        background: linear-gradient(top, #fff 0%, #fff 50%, #db3f02 50%, #db3f02 100%);
        border-radius:22px 22px 0 0;
        border:5px solid #4a1c03;
        border-bottom:none;
        position:absolute;
        box-shadow:inset 0 0 0 4px #fff;
        color:#4a1c03;
    }

    .thermometer:before{
        content:' ';
        width:44px;
        height:44px;
        display:block;
        position:absolute;
        top:142px;
        left:-16px;
        z-index:-1; 
        background:#c70000;
        border-radius:44px;
        border:5px solid #4a1c03;
        box-shadow:inset 0 0 0 4px #fff;
    }

    .thermometer:after{
        content:' ';
        width:12px;
        height:<?php $s=($fieldtemperature[count($fieldtemperature)-1]['value']/100)*150; echo $s; ?>px;
        display:block;
        position:absolute;
        top:<?php $s=150-($fieldtemperature[count($fieldtemperature)-1]['value']/100*150)+2; echo $s; ?>px;
        left:0px;
        background:#c70000;
    }
    .hum{
        margin:50% 0 0 50%;
        left:0px;
        top:-100px;
        width:22px;
        height:150px;
        display:block;
        font:bold 14px/152px helvetica, arial, sans-serif;
        text-align:center;
        text-indent: 36px;
        background: linear-gradient(top, #fff 0%, #fff 50%, #db3f02 50%, #db3f02 100%);
        border-radius:22px 22px 0 0;
        border:5px solid #4a1c03;
        border-bottom:none;
        position:absolute;
        box-shadow:inset 0 0 0 4px #fff;
        color:#4a1c03;
    }

    .hum:before{
        content:' ';
        width:44px;
        height:44px;
        display:block;
        position:absolute;
        top:142px;
        left:-16px;
        z-index:-1; 
        background:#2366da;
        border-radius:44px;
        border:5px solid #4a1c03;
        box-shadow:inset 0 0 0 4px #fff;
    }

    .hum:after{
        content:' ';
        width:12px;
        height:<?php $s=($fieldhumidity[count($fieldtemperature)-1]['value']/100)*150; echo $s; ?>px;
        display:block;
        position:absolute;
        top:<?php $s=150-($fieldhumidity[count($fieldtemperature)-1]['value']/100*150)+2; echo $s; ?>px;
        left:0px;
        background:#2366da;
    }
    .alt{
        font-size: 40px;
        padding-left: 10px;

    }
</style>
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-12">
            <a href="<?=base_url()?>" class="btn btn-primary mb-2 btn-sm">Back to List Channel</a>
            <h3 style="color: white"><?=$channelname[0]['channel_name']?></h3>
            <h4 style="color: white">CHANNELS ID : <?php echo $channelid; ?></h4>
          <br>
      </div>
  </div>
  <div class="row">
        <div class="col-md-2 col-sm-2"></div>
        <form class="form-inline col-md-8 col-sm-8" method="get" action="#">
                <div class="col-md-12 col-sm-12">
                    <select name="setview_time" class="form-control form-control-sm mb-2">
                        <option value="0">All</option>
                        <option value="10">10 minutes</option>
                        <option value="30">30 minutes</option>
                        <option value="60">1 hour</option>
                        <option value="180">3 hours</option>
                        <option value="720">12 hours</option>
                    </select>
                    <button type="submit" class="btn btn-primary mb-2 btn-sm form-control-sm">Range of Graph</button>
                </div>       
            </form>
        <div class="col-md-2 col-sm-2"></div>
    </div>

<!-- maps -->
<?php if($location ==1){?>
    <div class="row">
        <div class="col-md-2 col-sm-2"></div>
        </div class="col-md-8 col-sm-8">
            <center>
                <h4>CURRENT LOCATION</h4>
                <div class="row">
                    <div class="col-md-2 col-sm-3 col-1"></div>
                    <div id="mapid" class="col-md-8 col-sm-6 col-10"></div>
                    <div class="col-md-2 col-sm-3 col-1"></div>
                    <input type="hidden" id="latA" name="latA" value="<?=$fieldlat[count($fieldlat)-1]['value']?>">
                    <input type="hidden" id="lngA" name="lngA" value="<?=$fieldlng[count($fieldlng)-1]['value']?>">
                </div>
            </center>
        </div>
        </div class="col-md-2 col-sm-2"></div>
    </div>    
    <br><br>
<?php } ?>
    
<!-- temperature -->
<?php if($temperature ==1){?>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-2 col-sm-6 col-12">
            <center><label class="title-label">Temperature</label></center>
            <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <span style="margin-left: 30px;"><?php echo number_format($fieldtemperature[count($fieldtemperature)-1]['value'],2) ?>°C</span>
                            <span class="thermometer"></span>​
                        </div>
                        <div class="col-auto">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-sm-6 col-12">
            <center><label class="title-label">Temperature Graph</label></center>
            <div class="row">
                <div class="col-md-2">
                </div>
                <div class="col-md-8">
                    <canvas id="a" width="100"></canvas>
                </div>
                <div class="col-md-2">
                </div>
            </div>
            </div>
        </div>
    </div>
    <br><br>
<?php } ?>

<!-- humidity -->
<?php if($humidity ==1){?>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-2 col-sm-6 col-12 mb-3">
            <center><label class="title-label">Humidity</label></center>
            <input id="humidity" type="hidden" style="width:inherit">
        </div>
        <div class="col-md-8 col-sm-6 col-12">
            <center><label class="title-label">Humidity Graph</label></center>
            <div class="row">
                <div class="col-md-2">
                </div>
                <div class="col-md-8">
                    <canvas id="b" width="100"></canvas>
                </div>
                <div class="col-md-2">
                </div>
            </div>
        </div>
    </div>
    <br><br>
<?php } ?>

<!-- altitude -->
<?php if($altitude ==1){?>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-2 col-sm-6 col-12 mb-3">
            <center><label class="title-label">Altitude</label></center>
            <input id="altitude" type="hidden" style="width:inherit">
        </div>
        <div class="col-md-8 col-sm-6 col-12">
            <center><label class="title-label">Altitude Graph</label></center>
            <div class="row">
                <div class="col-md-2">
                </div>
                <div class="col-md-8">
                    <canvas id="c" width="100"></canvas>
                </div>
                <div class="col-md-2">
                </div>
            </div>
        </div>
    </div>
    <br><br>
<?php } ?>

<!-- pressure -->
<?php if($pressure ==1){?>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-2 col-sm-6 col-12 mb-3">
            </center><label class="title-label">Pressure</label></center>
            <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col"><br><br><br>
                            <span class="alt"><b><?php echo number_format($fieldpressure[count($fieldpressure)-1]['value'],2) ?></b> hPa</span>
                        </div>
                        <div class="col-auto">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-sm-6 col-12">
            <center><label class="title-label">Pressure Graph</label></center>
            <div class="row">
                <div class="col-md-2">
                </div>
                <div class="col-md-8">
                    <canvas id="d" width="100"></canvas>
                </div>
                <div class="col-md-2">
                </div>
            </div>
        </div>
    </div>
    <br><br>
<?php } ?>



<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js"></script>
<script>
    var ctx = document.getElementById('a');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['',<?php foreach ($fieldtemperature as $key=>$f) { if(is_numeric($f->value)){?>
                            <?php echo "'".date_format(date_create($f->created_at),'H:i:s')."'"?>,
                    <?php  }} ?>],
            datasets: [{
                label: 'Temperature',
                data: [0,<?php foreach ($fieldtemperature as $key=>$f) {if(is_numeric($f->value)){ ?>
                            <?php echo $f->value ?>,
                    <?php  }} ?>60],
                backgroundColor: [
                <?php for($i=0;$i<count($fieldtemperature);$i++){?>
                'rgba(209, 19, 19,0.2)',
                <?php } ?>
                ],
                borderColor: [
                <?php for($i=0;$i<count($fieldtemperature);$i++){?>
                'rgba(209, 19, 19,1)',
                <?php } ?>
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: false
                    }
                }]
            },
            legend: {
            display: false
         }
        }
    });
</script>

<script>
    var ctx2 = document.getElementById('b');
    var myChart2 = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: ['',<?php foreach ($fieldhumidity as $key=>$f) { if(is_numeric($f->value)){?>
                            <?php echo "'".date_format(date_create($f->created_at),'H:i:s')."'" ?>,
                    <?php  }} ?>],
            datasets: [{
                label: 'Humidity',
                data: [0,<?php foreach ($fieldhumidity as $key=>$f) { if(is_numeric($f->value)){?>
                            <?php echo $f->value ?>,
                    <?php  }} ?>100],
                backgroundColor: [
                <?php for($i=0;$i<count($fieldhumidity);$i++){?>
                'rgba(238,130,238, 0.2)',
                <?php } ?>
                ],
                borderColor: [
                <?php for($i=0;$i<count($fieldhumidity);$i++){?>
                'rgba(238,130,238, 1)',
                <?php } ?>
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: false
                    }
                }]
            },
            legend: {
            display: false
         }
        }
    });
</script>

<script>
    var ctx3 = document.getElementById('c');
    var myChart3 = new Chart(ctx3, {
        type: 'line',
        data: {
            labels: ['',<?php foreach ($fieldaltitude as $key=>$f) {if(is_numeric($f->value)){ ?>
                            <?php echo "'".date_format(date_create($f->created_at),'H:i:s')."'" ?>,
                    <?php  }} ?>],
            datasets: [{
                label: 'Altitude',
                data: [0,<?php foreach ($fieldaltitude as $f) { if(is_numeric($f->value)){?>
                            <?php echo $f->value ?>,
                    <?php  }} ?>200],
                    backgroundColor: [
                <?php for($i=0;$i<count($fieldaltitude);$i++){?>
                'rgba(0,128,0, 0.2)',
                <?php } ?>
                ],
                borderColor: [
                <?php for($i=0;$i<count($fieldaltitude);$i++){?>
                'rgba(0,128,0, 1)',
                <?php } ?>
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: false
                    }
                }]
            },
            legend: {
            display: false
         }
        }
    });
</script>

<script>
    var ctx4 = document.getElementById('d');
    var myChart4 = new Chart(ctx4, {
        type: 'line',
        data: {
            labels: ['',<?php foreach ($fieldpressure as $key=>$f) { if(is_numeric($f->value)){?>
                            <?php echo "'".date_format(date_create($f->created_at),'H:i:s')."'" ?>,
                    <?php  } }?>],
            datasets: [{
                label: 'Altitude',
                data: [980<?php foreach ($fieldpressure as $f) { if(is_numeric($f->value)){ ?>
                            <?php echo $f->value ?>,
                    <?php  }} ?>1020],
                    backgroundColor: [
                <?php for($i=0;$i<count($fieldpressure);$i++){?>
                'rgba(0,0,255, 0.2)',
                <?php } ?>
                ],
                borderColor: [
                <?php for($i=0;$i<count($fieldpressure);$i++){?>
                'rgba(0,0,255, 1)',
                <?php } ?>
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: false
                    }
                }]
            },
            legend: {
            display: false
         }
        }
    });
</script>
<!-- <script src="<?=base_url()?>assets/js/jquery.js"></script> -->
<script>
        // console.log('cek: '+$("#humidity").length);

        if($("#humidity").length){
        <?php
            $hum = array();
            foreach($fieldhumidity as $key=>$val){
                array_push($hum, $val->value);
            }
            $max = 10;
            $maxs = 0;
            for($i=1; $i<max($hum);$i++){
                if(max($hum)<($max*$i)){
                    $maxs = $max * $i;
                    break;
                }
            }
        ?>
        $("#humidity").myfunc({divFact:5,eventListenerType:'keyup',gagueLabel:'%',maxVal:'100'});
        $("#humidity").val(<?=number_format($fieldhumidity[count($fieldhumidity)-1]['value'],2)?>);
        $("#humidity").trigger("keyup");
        }
</script>
<script>
    if($("#altitude").length){
        <?php
            $al = array();
            foreach($fieldaltitude as $key=>$val){
                array_push($al, $val->value);
            }
            $max = 10;
            $maxs = 0;
            for($i=1; $i<max($al);$i++){
                if(max($al)<($max*$i)){
                    $maxs = $max * $i;
                    break;
                }
            }
        ?>
        $("#altitude").myfunc({divFact:5,eventListenerType:'keyup',gagueLabel:'m',maxVal:'200'});
        $("#altitude").val(<?=number_format($fieldaltitude[count($fieldaltitude)-1]['value'],2)?>);
        $("#altitude").trigger("keyup");
        }
</script>
<script>
    // console.log("latC = "+$("#latC").val());
    var lat = document.getElementById('latA').value;
    var lng = document.getElementById('lngA').value;
    console.log(lat);
    var mymap = L.map('mapid').setView([lng, lat], 15);
    L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
	attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
	maxZoom: 18,
	id: 'mapbox.streets',
	accessToken: 'pk.eyJ1IjoiaW1hZHVkZGluaGFyaXMiLCJhIjoiY2p1d2E3MzM4MGFiZDRkcGYyMWF3emtlYiJ9.KTemDE4IAujR0X-ltttotg'
}).addTo(mymap);
    L.marker([lng, lat]).addTo(mymap).bindPopup('Current Location')
                          .openPopup();
    
//     L.Routing.control({
//     waypoints: [
//         L.latLng(lat, lng),
//         L.latLng(lat, lng)
//     ],
//     routeWhileDragging: true
// }).addTo(mymap);
</script>