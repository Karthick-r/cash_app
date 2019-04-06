
@extends('admin.layout.app')

@section('main-content')

<?php $page=0;?>



 <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-content">
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-3 col-sm-12 border-right-blue-grey border-right-lighten-5">
                      <div class="pb-1 text-center">
                        <div class="clearfix mb-1 text-center">
                     
                          <span class="font-large-1 text-bold-500 info text-center">Total liters</span>
                        </div>
                        <div class="clearfix mb-1 ">
                     
                          <span class="font-large-1 text-bold-500 info text-center">{{$today->water}} ltr </span>
                        </div>
                      
                      </div>
                      <div class="progress mb-0" style="height: 7px;">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 100%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>

                    <div class="col-lg-3 col-sm-12 border-right-blue-grey border-right-lighten-5">
                      <div class="pb-1 text-center">
                        <div class="clearfix mb-1">
                         
                          <span class="font-large-1 text-bold-500 danger"> Bottles</span>
                        </div>
                       
                         <div class="clearfix mb-1">
                         New
                         
                          <span class="font-large-1 text-bold-300 danger"> {{$today->new_bottle}} </span>

                          Closed
                          <span class="font-large-1 text-bold-300 danger"> {{$today->bottle}} </span>
                       
                        </div>
                        </div>
                     
                         
                        
                    
                      <div class="progress mb-0" style="height: 7px;">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>


                    <div class="col-lg-3 col-sm-12 border-right-blue-grey border-right-lighten-5">
                      <div class="pb-1 text-center">
                        <div class="clearfix mb-1">
                        
                          <span class="font-large-1 text-bold-500 success "> Salary</span>
                        </div>
                        <div class="clearfix mb-1">
                        
                          <span class="font-large-1 text-bold-500 success">Rs.{{$today->salary}}</span>
                        </div>
                     
                      </div>
                      <div class="progress mb-0" style="height: 7px;">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>

                    <div class="col-lg-3 col-sm-12 text-center">
                      <div class="pb-1 text-center">
                        <div class="clearfix mb-1">
                         
                          <span class="font-large-1 text-bold-500 warning ">Cash Collected</span>
                        </div>

                          <div class="clearfix mb-1">
                         
                          <span class="font-large-1 text-bold-500 warning ">Rs.{{$today->cash}}</span>
                        </div>


                       
                      </div>
                      <div class="progress mb-0" style="height: 7px;">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 100%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>




<div class="row">
    <div class="col-xl-12 col-lg-12 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="card-block">
  
<div id="chartContainer" style="height: 370px; width: 100%;"></div>

                </div>
            </div>
        </div>
    </div>

   
</div>

<div class="row">
    <div class="col-xl-6 col-lg-12 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                <div class="">
                <select>
                  <option>Jan</option>
                   <option>Feb</option>
                </select>
                </div>
  
<div id="chartContainer2" style="height: 370px; width: 100%;"></div>

                </div>
            </div>
        </div>
    </div>

 <div class="col-xl-6 col-lg-12 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="card-block">
  
<div id="chartContainer3" style="height: 370px; width: 100%;"></div>




                </div>
            </div>
        </div>
    </div>
   
</div>





<script>
window.onload = function () {




var chart = new CanvasJS.Chart("chartContainer", {
  exportEnabled: true,
  animationEnabled: true,
  title:{
    text: "Sales with Report"
  },
  subtitles: [{
    text: "Click Legend to Hide or Unhide Data Series"
  }], 
  axisX: {
    title: "States"
  },
  axisY: {
    title: "Water Filter - Units",
    titleFontColor: "#4F81BC",
    lineColor: "#4F81BC",
    labelFontColor: "#4F81BC",
    tickColor: "#4F81BC"
  },
  axisY2: {
    title: "Bottle - Pcs",
    titleFontColor: "#C0504E",
    lineColor: "#C0504E",
    labelFontColor: "#C0504E",
    tickColor: "#C0504E"
  },
  toolTip: {
    shared: true
  },
  legend: {
    cursor: "pointer",
    itemclick: toggleDataSeries
  },

  data: [
  {
    type: "column",
    name: "Oil Filter",
    showInLegend: true,      
    yValueFormatString: "#,##00.# Units",
    dataPoints: [
      { label: "Jan",  y: 19034.5 },
      { label: "Feb", y: 20015 },
      { label: "March", y: 25342 },
      { label: "Apr",  y: 20088 },
      { label: "May",  y: 7000 },
      { label: "Jun",  y: 19034.5 },
      { label: "July", y: 20015 },
      { label: "Aug", y: 25342 },
      { label: "Sep",  y: 20088 },
      { label: "Oct",  y: 7000 },
      { label: "Nav",  y: 19034.5 },
      { label: "Dec", y: 20015 }
      
    ]
  },
  {
    type: "column",
    name: "Clutch",
    showInLegend: true,
    yValueFormatString: "#,##0.# Units",
    dataPoints: [

     { label: "Jan",  y: 2107.5 },
      { label: "Feb", y: 1355 },
      { label: "March", y: 2553 },
      { label: "Apr",  y: 1355 },
      { label: "May",  y: 1355 },
      { label: "Jun",  y: 1945.5 },
      { label: "July", y: 4255 },
      { label: "Aug", y: 1355 },
      { label: "Sep",  y: 4255 },
      { label: "Oct",  y: 5258 },
      { label: "Nav",  y: 1305.5 },
      { label: "Dec", y: 5285 }
      
   
    ]
  },


 {
    type: "column",
    name: "Oil3 Filter",
    showInLegend: true,      
    yValueFormatString: "#,##00.# Units",
    dataPoints: [
      { label: "Jan",  y: 19034.5 },
      { label: "Feb", y: 20015 },
      { label: "March", y: 25342 },
      { label: "Apr",  y: 20088 },
      { label: "May",  y: 7000 },
      { label: "Jun",  y: 19034.5 },
      { label: "July", y: 20015 },
      { label: "Aug", y: 25342 },
      { label: "Sep",  y: 20088 },
      { label: "Oct",  y: 7000 },
      { label: "Nav",  y: 19034.5 },
      { label: "Dec", y: 20015 }
      
    ]
  },
   {
    type: "column",
    name: "Oil5 Filter",
    showInLegend: true,      
    yValueFormatString: "#,##00.# Units",
    dataPoints: [
      { label: "Jan",  y: 19034.5 },
      { label: "Feb", y: 20015 },
      { label: "March", y: 25342 },
      { label: "Apr",  y: 20088 },
      { label: "May",  y: 7000 },
      { label: "Jun",  y: 19034.5 },
      { label: "July", y: 20015 },
      { label: "Aug", y: 25342 },
      { label: "Sep",  y: 20088 },
      { label: "Oct",  y: 7000 },
      { label: "Nav",  y: 19034.5 },
      { label: "Dec", y: 20015 }
      
    ]
  },
   {
    type: "column",
    name: "Oil4 Filter",
    showInLegend: true,      
    yValueFormatString: "#,##00.# Units",
    dataPoints: [
      { label: "Jan",  y: 19034.5 },
      { label: "Feb", y: 20015 },
      { label: "March", y: 25342 },
      { label: "Apr",  y: 20088 },
      { label: "May",  y: 7000 },
      { label: "Jun",  y: 19034.5 },
      { label: "July", y: 20015 },
      { label: "Aug", y: 25342 },
      { label: "Sep",  y: 20088 },
      { label: "Oct",  y: 7000 },
      { label: "Nav",  y: 19034.5 },
      { label: "Dec", y: 20015 }
      
    ]
  },
   {
    type: "column",
    name: "Oil4 Filter",
    showInLegend: true,      
    yValueFormatString: "#,##00.# Units",
    dataPoints: [
      { label: "Jan",  y: 19034.5 },
      { label: "Feb", y: 20015 },
      { label: "March", y: 25342 },
      { label: "Apr",  y: 20088 },
      { label: "May",  y: 7000 },
      { label: "Jun",  y: 19034.5 },
      { label: "July", y: 20015 },
      { label: "Aug", y: 25342 },
      { label: "Sep",  y: 20088 },
      { label: "Oct",  y: 7000 },
      { label: "Nav",  y: 19034.5 },
      { label: "Dec", y: 20015 }
      
    ]
  }
  ]



});

var chart2 = new CanvasJS.Chart("chartContainer2", {
  animationEnabled: true,
  exportEnabled: true,
  theme: "light1", // "light1", "light2", "dark1", "dark2"
  title:{
    text: "Water Report"
  },
  data: [{
    type: "column", //change type to bar, line, area, pie, etc
    //indexLabel: "{y}", //Shows y value on all Data Points
    indexLabelFontColor: "#5A5757",
    indexLabelPlacement: "outside",
    dataPoints: [
      { x: 120, y: 71 },
      { x: 20, y: 55 },
      { x: 30, y: 50 },
      { x: 40, y: 65 },
      { x: 50, y: 92, indexLabel: "Highest" },
      { x: 60, y: 68 },
      { x: 70, y: 38 },
      { x: 80, y: 71 },
      { x: 90, y: 54 },
      { x: 100, y: 60 },
      { x: 110, y: 36 },
      { x: 120, y: 49 },
      { x: 130, y: 21, indexLabel: "Lowest" }
    ]
  }]
});

var chart3 = new CanvasJS.Chart("chartContainer3", {
  animationEnabled: true,
  exportEnabled: true,
  theme: "light1", // "light1", "light2", "dark1", "dark2"
  title:{
    text: "Bottle Report"
  },
  data: [{
    type: "column", //change type to bar, line, area, pie, etc
    //indexLabel: "{y}", //Shows y value on all Data Points
    indexLabelFontColor: "#5A5757",
    indexLabelPlacement: "outside",
    dataPoints: [
      { x: 120, y: 71 },
      { x: 20, y: 55 },
      { x: 30, y: 50 },
      { x: 40, y: 65 },
      { x: 50, y: 92, indexLabel: "Highest" },
      { x: 60, y: 68 },
      { x: 70, y: 38 },
      { x: 80, y: 71 },
      { x: 90, y: 54 },
      { x: 100, y: 60 },
      { x: 110, y: 36 },
      { x: 120, y: 49 },
      { x: 130, y: 21, indexLabel: "Lowest" }
    ]
  }]
});
chart3.render();
chart2.render();
chart.render();

function toggleDataSeries(e) {
  if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
    e.dataSeries.visible = false;
  } else {
    e.dataSeries.visible = true;
  }
  e.chart.render();
}

}
</script>


<style>
.remove_can a
{
display: none;
}
.remove_can span
{
display: none;
}
</style>
<script src="{{asset('admin/assets/script/canvasjs.min.js')}}"></script>



<script type="text/javascript">


    var data = {{$report}};
    console.log(data);
</script>
   



@endsection

