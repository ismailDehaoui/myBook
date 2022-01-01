@extends('layouts.master')
@Section('content')
 <!--div id="chart" style="height: 300px;"></div-->
    <!--Charting library -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
    <!-- Chartisan -->
    <script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>
  <div class="container-fluid">
   <div class="row">  
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">person</i>
              </div>
            </div>
            <br/> <br/>
             <div class="text-center pt-1">
                <h5 class="mb-0 text-capitalize">Nouveaux abonnés</h5>
              </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder">{{$ab}} Abonnés </span>depuis hièr</p>
            </div>
          </div>
    </div>
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-success shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">menu_book</i>
              </div>
            </div>
             <br/> <br/>
             <div class="text-center pt-1">
                <h5 class="mb-0 text-capitalize">Nouveaux livres</h5>
              </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder">{{$nla}} livres </span>depuis hièr</p>
            </div>
          </div>
        </div>
         <div class="col-xl-3 col-sm-10 mb-xl-5 mb-6">
      <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-light shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">category</i>
              </div>
            </div>
             <br/> <br/>
              <div class="text-center pt-1">
                <h5 class=" mb-0  text-capitalize">Nouvelles catégories</h5>
              </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder">{{$ctj}} catégories </span>depuis hièr</p>
            </div>
          </div>
        </div>
  </div>
 </div>
<div class="row mt-4">
        <div class="col-lg-4 col-md-6 mt-4 mb-4">
          <div class="card z-index-2 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
             <div class="card-body"><canvas id="myAreaChart" width="100%" height="60"></canvas></div>
              </div>
            </div>
            <div class="card-body"> 
              <h6 class="mb-0 ">Abonnés</h6>
              <hr class="dark horizontal">
              <div class="d-flex ">
                <i class="material-icons text-sm my-auto me-1">schedule</i>
                <p class="mb-0 text-sm">Nombre total:<span class="text-success text-sm font-weight-bolder">{{$na}} abonnés</span></p>
              </div>
            </div>
          </div>
        </div>
         <div class="col-lg-4 col-md-6 mt-4 mb-4">
          <div class="card z-index-2 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-success shadow-primary border-radius-lg py-3 pe-1">
             <div class="card-body"><canvas id="livrelinechart" width="100%" height="60"></canvas></div>
              </div>
            </div>
            <div class="card-body"> 
                <h6 class="mb-0 ">Livres</h6>
              <hr class="dark horizontal">
              <div class="d-flex ">
                <i class="material-icons text-sm my-auto me-1">schedule</i>
                <p class="mb-0 text-sm">Nombre total:<span class="text-success text-sm font-weight-bolder">{{$nl}} livres</span></p>
              </div>
            </div>
          </div>
        </div>
         <div class="col-lg-4 col-md-6 mt-4 mb-4">
          <div class="card z-index-2 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-dark shadow-primary border-radius-lg py-3 pe-1">
             <div class="card-body"><canvas id="" width="100%" height="60"></canvas></div>
              </div>
            </div>
            <div class="card-body"> 
                <h6 class="mb-0 ">Livres par catégorie</h6>
              <hr class="dark horizontal">
              <div class="d-flex ">
                <i class="material-icons text-sm my-auto me-1">schedule</i>
                <p class="mb-0 text-sm">Nombre total:<span class="text-success text-sm font-weight-bolder">{{$nbrCat}} catégories</span></p>
              </div>
            </div>
          </div>
        </div>
  </div>      
<div class="row mt-4">
         <div class="col-lg-12 col-md-6 mt-4 mb-4">
          <div class="card z-index-2 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-light shadow-primary border-radius-lg py-3 pe-1">
             <div class="card-body"><canvas id="CategorieLivresPieChart" width="200%" height="60"></canvas></div>
              </div>
            </div>
            <div class="card-body"> 
                <h6 class="mb-0 ">Livres par catégorie</h6>
              <hr class="dark horizontal">
              <div class="d-flex ">
                <i class="material-icons text-sm my-auto me-1">schedule</i>
                <p class="mb-0 text-sm">Nombre total:<span class="text-success text-sm font-weight-bolder">{{$nbrCat}} catégories</span></p>
              </div>
            </div>
          </div>
        </div>
  </div> 


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script type="text/javascript">
  var _ydata=JSON.parse('{!! json_encode($months) !!}');
  var _xdata=JSON.parse('{!! json_encode($monthC) !!}');
  var _ylivre=JSON.parse('{!! json_encode($year) !!}');
  var _xlivre=JSON.parse('{!! json_encode($yearC) !!}');

   var _xcatlivres={!! json_encode($pdata) !!};
   var _ycatlivres={!! json_encode($plabels) !!};
</script>
<script >
  Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = 'white';

// Abonnes Area Chart 
var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: _ydata,
    datasets: [{
      label: "Abonnés",
      lineTension: 0.3,
      backgroundColor: "white",
      borderColor: "white",
      pointRadius: 5,
      pointBackgroundColor: "white",
      pointBorderColor: "white",
      pointHoverRadius: 5,
      pointHoverBackgroundColor: "rgba(2,117,216,1)",
      pointHitRadius: 50,
      pointBorderWidth: 2,
      data: _xdata,
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 100,
          maxTicksLimit: 10
        },
        gridLines: {
          color: "rgba(0, 0, 0, .125)",
        }
      }],
    },
    legend: {
      display: false
    }
  }
});

// Livres Area Chart 
var ctx = document.getElementById("livrelinechart");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: _ylivre,
    datasets: [{
      label: "Livres",
      lineTension: 0.3,
      backgroundColor: "white",
      borderColor: "white",
      pointRadius: 5,
      pointBackgroundColor: "white",
      pointBorderColor: "white",
      pointHoverRadius: 5,
      pointHoverBackgroundColor: "rgba(2,117,216,1)",
      pointHitRadius: 50,
      pointBorderWidth: 2,
      data: _xlivre,
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'livre'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 100,
          maxTicksLimit: 10
        },
        gridLines: {
          color: "rgba(0, 0, 0, .125)",
        }
      }],
    },
    legend: {
      display: false
    }
  }
});

</script>

<script >
  // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Pie Chart Example
var ctx = document.getElementById("CategorieLivresPieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: _ycatlivres,
    datasets: [{
      data: _xcatlivres,
      backgroundColor: ['rgb(0, 168, 0)',  'rgb(237, 28, 131)','rgb(0, 51, 90)', '#28a745','rgb(172, 211, 230)','rgb(149, 101, 111)','rgb(224, 101, 111)','rgb(172, 211, 190)',''],
    }],
  },
});
</script>
                                    
@endsection('content')
