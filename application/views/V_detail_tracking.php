<script src="http://maps.googleapis.com/maps/api/js"></script>
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
    height:<?php $s=($channels->feeds[0]->field3/100)*150; echo $s; ?>px;
    display:block;
    position:absolute;
    top:<?php $s=150-($channels->feeds[0]->field3/100*150)+2; echo $s; ?>px;
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
    height:<?php $s=($channels->feeds[0]->field4/100)*150; echo $s; ?>px;
    display:block;
    position:absolute;
    top:<?php $s=150-($channels->feeds[0]->field4/100*150)+2; echo $s; ?>px;
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
      <h2 style="color: white">&nbsp;&nbsp;&nbsp;&nbsp;TRACKING</h2>
      <h2 style="color: white">CHANNELS ID : <?php echo $channels->channel->id; ?></h2>
      <br>
    </div>
  </div>

  <div class="row" style="text-align: -webkit-center;">
    <div class="col-3">
    </div>
    <div class="col-6">
      <div class="card card-stats mb-4 mb-xl-0">
        <div class="card-body">
          <div class="row">
            <div class="col">
            <div id="googleMap" style="width:230px;height:220px;"></div>
            </div>
            <div class="col-auto">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-3">
    </div>
  </div>
  <br>


  <div class="row"  style="text-align: -webkit-center;">
    <div class="col-4">
      <label class="title-label">Temperature</label>
      <div class="card card-stats mb-4 mb-xl-0">
        <div class="card-body">
          <div class="row">
            <div class="col">
              <span style="margin-left: 30px;"><?php echo $channels->feeds[0]->field3 ?>°C</span>
              <span class="thermometer"></span>​
            </div>
            <div class="col-auto">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-4">
      <label class="title-label">Humidity</label>
      <div class="card card-stats mb-4 mb-xl-0">
        <div class="card-body">
          <div class="row">
            <div class="col">
              <span style="margin-left: 30px;"><?php echo $channels->feeds[0]->field4 ?>%</span>
              <span class="hum"></span>​
            </div>
            <div class="col-auto">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-4">
      <label class="title-label">Altitude</label>
      <div class="card card-stats mb-4 mb-xl-0">
        <div class="card-body">
          <div class="row">
            <div class="col"><br><br><br>
              <span class="alt"><b><?php echo $channels->feeds[0]->field6 ?></b> mdpl</span>
            </div>
            <div class="col-auto">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br>

  <div class="row" style="text-align: -webkit-center;">
    <div class="col-3">
    </div>
    <div class="col-6">
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
    <div class="col-3">
    </div>
  </div>
  <br>

  <div class="row" style="text-align: -webkit-center;">
    <div class="col-3">
    </div>
    <div class="col-6">
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
    <div class="col-3">
    </div>
  </div>
  <br>

  <div class="row" style="text-align: -webkit-center;">
    <div class="col-3">
    </div>
    <div class="col-6">
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
    <div class="col-3">
    </div>
  </div>
  <br>



  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js"></script>
  <script>
    var ctx = document.getElementById('a');
    var myChart = new Chart(ctx, {
      type: 'line',
      data: {
            labels: ['1', '2', '3', '4', '5', '6'],
            datasets: [{
                label: 'Test TRUE NB-IoT',
                data: [<?php foreach ($channels->feeds as $f) { ?>
                            <?php echo $f->field3 ?>,
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
    var ctx = document.getElementById('b');
    var myChart = new Chart(ctx, {
      type: 'line',
      data: {
            labels: ['1', '2', '3', '4', '5', '6'],
            datasets: [{
                label: 'Test TRUE NB-IoT',
                data: [<?php foreach ($channels->feeds as $f) { ?>
                            <?php echo $f->field4 ?>,
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
    var ctx = document.getElementById('c');
    var myChart = new Chart(ctx, {
      type: 'line',
      data: {
            labels: ['1', '2', '3', '4', '5', '6'],
            datasets: [{
                label: 'Test TRUE NB-IoT',
                data: [<?php foreach ($channels->feeds as $f) { ?>
                            <?php echo $f->field6 ?>,
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
        
        function initialize() {
        var propertiPeta = {
            center:new google.maps.LatLng(<?php echo $channels->feeds[0]->field1 ?>,<?php echo $channels->feeds[0]->field2 ?>),
            zoom:12,
            mapTypeId:google.maps.MapTypeId.ROADMAP
        };
        
        var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);
        }

         
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
