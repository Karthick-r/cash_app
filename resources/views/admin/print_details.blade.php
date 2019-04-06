

<!DOCTYPE html>
<html>
<head>
<style>
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
}


</style>
</head>
<body>

<h2>Compliant Details</h2>

<div style="overflow-x:auto;">
  <table>
    <tr><th>id</th><td>#{{$compliants->compliants_id}}</td></tr>
    <tr><th>category</th><td>{{$compliants->cat}}</td></tr>
    <tr><th>Title</th><td>{{$compliants->title}}</td></tr>
    <tr><th>Status</th><td>{{$compliants->action}}</td></tr>
    <tr><th>Location</th><td>{{$compliants->geo_loc}}</td></tr>
    <tr><th>Date</th><td> <?php echo date('d-m-Y', strtotime($compliants->created_at));?></td></tr>
    

      
 
  </table>
</div>

<h3>History</h3>
@foreach($tickets as $tic)


<h3>{{$tic->stage}}</h3>
<h4>{{$tic->des}}</h4>
    <p> <?php echo date('d-m-Y', strtotime($tic->ddd));?></p>



@endforeach
</body>
</html>


