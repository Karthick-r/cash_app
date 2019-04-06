@extends('admin.layout.app')

@section('main-content')

<?php $page=0;?>



<div id="category_news">

  <section id="dom">
        <div class="row">
          <div class="col-12">
            <div class="row">
            <div class="col-sm-10">
            
            </div>
            
            <div class="col-sm-2">
            
                             <select class="form-control" name="sto_id"  onchange="shownews(this.value)">
         <option value="0">ALL Route</option>
         
           @foreach($route as $route)
            <option value="{{$route->route_id}}" >{{$route->route_name}}</option>
           @endforeach
         
         </select>

            </div>
            </div>
           </div>
         </div>
     </section>



 <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-content">
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-2 col-sm-12 border-right-blue-grey border-right-lighten-5">
                      <div class="pb-1 text-center">
                   
                     <div class="clearfix mb-1 text-center">
                          <span class="font-medium-3 text-bold-500 info text-center">Total liters</span>
                  </div>
                     <div class="clearfix mb-1 text-center">
                          <span class="font-medium-3 text-bold-500 info text-center">
                          @if(!empty($today) && !empty($today->water))
                          {{$today->water}}
                          @else 0 @endif ltr <sub class="success">
                          @if(!empty($today->main_water))M.W-{{$today->main_water}} @endif</sub></span>
</div>
                      
                      </div>
                      <div class="progress mb-0" style="height: 7px;">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 100%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>

                    <div class="col-lg-2 col-sm-12 border-right-blue-grey border-right-lighten-5">
                      <div class="pb-1 text-center">
                       <div class="clearfix mb-1 text-center">
                          <span class="font-medium-3 text-bold-500 danger"> Bottles</span>
                          </div>
                          <div class="clearfix mb-1 text-center">
                <span class="font-medium-3 text-bold-300 danger"> 
@if(!empty($today) && !empty($today->new_bottle))
                {{$today->new_bottle}}
                @else 0 @endif<sub>New</sub> </span>

                          
                          <span class="font-medium-3 text-bold-300 danger">@if(!empty($today) && !empty($today->bottle)) {{$today->bottle}} @else 0 @endif

                         <sub>Sold</sub> </span>
                       
                       </div>
                        </div>
                     
                         
                        
                    
                      <div class="progress mb-0" style="height: 7px;">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="20"></div>
                      </div>
                    </div>


                    <div class="col-lg-2 col-sm-12 border-right-blue-grey border-right-lighten-5">
                      <div class="pb-1 text-center">
                
                        <div class="clearfix mb-1 text-center">
                          <span class="font-medium-3 text-bold-500 success "> Salary</span>
             </div>
                        <div class="clearfix mb-1 text-center">
                          <span class="font-medium-3 text-bold-500 success">Rs.@if(!empty($today) && !empty($today->salary)){{$today->salary}}@else 0 @endif</span>
                 </div>
                     
                      </div>
                      <div class="progress mb-0" style="height: 7px;">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>

                    <div class="col-lg-2 col-sm-12 text-center">
                      <div class="pb-1 text-center">
                    
                         <div class="clearfix mb-1 text-center">
                          <span class="font-medium-3 text-bold-500 warning ">Cash Collected</span>
                       </div>
                       <div class="clearfix mb-1 text-center">
                         
                          <span class="font-medium-3 text-bold-500 warning ">Rs.@if(!empty($today) && !empty($today->cash)){{$today->cash}}@else 0 @endif</span>
                        </div>


                       
                      </div>
                      <div class="progress mb-0" style="height: 7px;">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 100%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>

                      <div class="col-lg-2 col-sm-12 text-center">
                      <div class="pb-1 text-center">
                      <div class="clearfix mb-1 text-center">
                         
                          <span class="font-medium-3 text-bold-500  default">Expenses</span>
                      
</div>
<div class="clearfix mb-1 text-center">
                       
                         
                          <span class="font-medium-3 text-bold-500 default ">Rs.@if(!empty($today) && !empty($expanses_today->amount)){{$expanses_today->amount}}@else 0 @endif</span>
                        </div>


                       
                      </div>
                      <div class="progress mb-0" style="height: 7px;">
                        <div class="progress-bar bg-default" role="progressbar" style="width: 100% ;background-color:black" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>


                      <div class="col-lg-2 col-sm-12 text-center">
                      <div class="pb-1 text-center">
              
                         <div class="clearfix mb-1 text-center">
                          <span class="font-medium-3 text-bold-500 primary ">Cash in Hand</span>
                      </div>
                         <div class="clearfix mb-1 text-center">
                           <span class="font-medium-3 text-bold-500 primary ">Rs.@if(!empty($today)){{ $today->cash-$expanses_today->amount }}@else 0 @endif</span>
                
</div>

                       
                      </div>
                      <div class="progress mb-0" style="height: 7px;">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 100%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
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
                  <h3>Water Reading:{{date('M-Y')}}</h3>
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
                <div class="">
                  <h3>Bottle Closed:{{date('M-Y')}}</h3>
                </div>
  
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
    title: "cash collected - Rs",
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
   <?php foreach($report1 as $re)
                {
                  echo ' {
    type: "column",
    name: "'.$re->route_name.'",
    showInLegend: true,      
    yValueFormatString: "Rs #,##,### ",
    dataPoints: [
      { label: "'.$re->label.'",  y: '.$re->y.' }
      
      
    ]
  },';


                  }?>
 
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
      <?php foreach($vv as $vv1)
{


  echo  '{ label: "'.$vv1->label.'",  y:'.$vv1->y.' },';
}
?>
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
     <?php foreach($bottle as $bo)
{


  echo  '{ label: "'.$bo->label.'",  y:'.$bo->y.' },';
}
?>
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



   
<script>
function shownews(str) 

{
    //alert(str);
  if (str=="") {

    document.getElementById("category_news").innerHTML="";
    return;
  } 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function()
    {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("category_news").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET",'/clients/cash/cash_app/public/getnews/'+str,true);
   // xmlhttp.open("GET",'/getnews/'+str,true);
  xmlhttp.send();


}
</script>



@endsection

