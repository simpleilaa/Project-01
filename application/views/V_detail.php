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
          <?php if($location ==1){?>
            <h2 style="color: white">&nbsp;&nbsp;&nbsp;&nbsp;TRACKING</h2>
          <?php }else{?>
            <h2 style="color: white">&nbsp;&nbsp;&nbsp;&nbsp;NON TRACKING</h2>
          <?php } ?>
          <h2 style="color: white">CHANNELS ID : <?php echo $channelid; ?></h2>
          <br>
      </div>
  </div>

<?php if($location ==1){?>
<br>
    <center>
        <h4>CURRENT LOCATION</h4>
    </center>
    <div id="mapid"></div>
    <input type="hidden" id="latA" name="latA" value="<?=$fieldlat[count($fieldtemperature)-1]['value']?>">
    <input type="hidden" id="lngA" name="lngA" value="<?=$fieldlng[count($fieldtemperature)-1]['value']?>">
  <br>
<?php } ?>

<?php if($temperature==1){?>
  <div class="row" style="text-align: -webkit-center;">
      <div class="col-1">
      </div>
      <div class="col-5">
        <label class="title-label">Temperature</label>
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
<div class="col-5">
    <label class="title-label">Temperature Result Card</label>
    <div class="card card-stats mb-4 mb-xl-0">
        <div class="card-body">
          <div class="row">
            <div class="col">
                <canvas id="a" width="100" height="100"></canvas>
            </div>
            <div class="col-auto">
            </div>
        </div>
    </div>
</div>
</div>
<?php } ?>
<div class="col-1">
</div>
</div>
<br>
<?php if($humidity==1){?>
<div class="row" style="text-align: -webkit-center;">
  <div class="col-1">
  </div>
  <div class="col-5">
    <label class="title-label">Humidity</label>
    <div class="card card-stats mb-4 mb-xl-0">
        <div class="card-body">
          <div class="row">
            <div class="col">
                <!-- <span style="margin-left: 30px;"><?php echo number_format($fieldhumidity[count($fieldhumidity)-1]['value'],2) ?>%</span> -->
                <!-- <span class="hum"></span>​ -->
                <input id="humidity" type="hidden" style="width:inherit">
            </div>
            <div class="col-auto">
            </div>
        </div>
    </div>
</div>
</div>
<div class="col-5">
    <label class="title-label">Humidity Result Card</label>
    <div class="card card-stats mb-4 mb-xl-0">
        <div class="card-body">
          <div class="row">
            <div class="col">
              <canvas id="b" width="100" height="100"></canvas>
          </div>
          <div class="col-auto">
          </div>
      </div>
  </div>
</div>
</div>
<div class="col-1">
</div>
</div>
<?php }?>
<br>
<?php if($altitude==1){?>
<div class="row" style="text-align: -webkit-center;">
  <div class="col-1">
  </div>
  <div class="col-5">
    <label class="title-label">Altitude</label>
    <div class="card card-stats mb-4 mb-xl-0">
        <div class="card-body">
          <div class="row">
            <div class="col"><br><br><br>
                <!-- <span class="alt"><b><?php echo number_format($fieldaltitude[count($fieldaltitude)-1]['value'],2) ?></b> m</span> -->
                <input id="altitude" type="hidden" style="width:inherit">
            </div>
            <div class="col-auto">
            </div>
        </div>
    </div>
</div>
</div>
<div class="col-5">
    <label class="title-label">Altitude Result Card</label>
    <div class="card card-stats mb-4 mb-xl-0">
        <div class="card-body">
          <div class="row">
            <div class="col">
                <canvas id="c" width="100" height="100"></canvas>
            </div>
            <div class="col-auto">
            </div>
        </div>
    </div>
</div>
</div>
<?php } ?>
<div class="col-1">
</div>
</div>
<br>
<?php if($pressure==1){?>
<div class="row" style="text-align: -webkit-center;">
  <div class="col-1">
  </div>
  <div class="col-5">
    <label class="title-label">Pressure</label>
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
<div class="col-5">
    <label class="title-label">Pressure Result Card</label>
    <div class="card card-stats mb-4 mb-xl-0">
        <div class="card-body">
          <div class="row">
            <div class="col">
                <canvas id="d" width="100" height="100"></canvas>
            </div>
            <div class="col-auto">
            </div>
        </div>
    </div>
</div>
</div>
<?php } ?>
<div class="col-1">
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js"></script>
<script>
    var ctx = document.getElementById('a');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [<?php foreach ($fieldtemperature as $key=>$f) { ?>
                            <?php echo "'".$f->entry_id."'"?>,
                    <?php  } ?>],
            datasets: [{
                label: 'Temperature',
                data: [<?php foreach ($fieldtemperature as $key=>$f) { ?>
                            <?php echo $f->value ?>,
                    <?php  } ?>],
                backgroundColor: [
                'rgba(255, 99, 132, 0.2)'
                ],
                borderColor: [
                'rgba(255, 99, 132, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>

<script>
    var ctx2 = document.getElementById('b');
    var myChart2 = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: [<?php foreach ($fieldhumidity as $key=>$f) { ?>
                            <?php echo "'".$f->entry_id."'" ?>,
                    <?php  } ?>],
            datasets: [{
                label: 'Humidity',
                data: [<?php foreach ($fieldhumidity as $key=>$f) { ?>
                            <?php echo $f->value ?>,
                    <?php  } ?>],
                backgroundColor: [
                'rgba(255, 99, 132, 0.2)'
                ],
                borderColor: [
                'rgba(255, 99, 132, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>

<script>
    var ctx3 = document.getElementById('c');
    var myChart3 = new Chart(ctx3, {
        type: 'line',
        data: {
            labels: [<?php foreach ($fieldaltitude as $key=>$f) { ?>
                            <?php echo "'".$f->entry_id."'" ?>,
                    <?php  } ?>],
            datasets: [{
                label: 'Altitude',
                data: [<?php foreach ($fieldaltitude as $f) { ?>
                            <?php echo $f->value ?>,
                    <?php  } ?>,100],
                backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>

<script>
    var ctx4 = document.getElementById('d');
    var myChart4 = new Chart(ctx4, {
        type: 'line',
        data: {
            labels: [<?php foreach ($fieldpressure as $key=>$f) { ?>
                            <?php echo "'".$f->entry_id."'" ?>,
                    <?php  } ?>],
            datasets: [{
                label: 'Altitude',
                data: [<?php foreach ($fieldpressure as $f) { ?>
                            <?php echo $f->value ?>,
                    <?php  } ?>,100],
                backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
<!-- <script src="<?=base_url()?>assets/js/jquery.js"></script> -->
<script>
        $("#humidity").myfunc({divFact:10,eventListenerType:'keyup',gagueLabel:'%'});
        $("#humidity").val(<?=number_format($fieldhumidity[count($fieldtemperature)-1]['value'],2)?>);
        $("#humidity").trigger("keyup");

        $("#altitude").myfunc({divFact:10,eventListenerType:'keyup',gagueLabel:'m'});
        $("#altitude").val(<?=number_format($fieldaltitude[count($fieldaltitude)-1]['value'],2)?>);
        $("#altitude").trigger("keyup");

        $(".envelope").addClass('inin');
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
var marker = L.marker([lng, lat]).addTo(mymap);
</script>