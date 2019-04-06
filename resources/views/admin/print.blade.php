

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

tr:nth-child(even){background-color: #f2f2f2}
</style>
</head>
<body>

<h2>Compliant Details</h2>

<div style="overflow-x:auto;">
  <table>
    <tr>
      <th>id</th>
                             <th>category</th>
                             <th>Title</th>
                             <th>Status</th>
                             <th>Location</th>
                             <th>Date</th>
    </tr>
   @foreach($compliants as $user)
                      <tr>
<td>#{{$user->compliants_id}}</td>
<td>{{$user->cat }}</td>
<td>{{$user->title}}</td>
<td>{{$user->action}}</td>
<td>{{$user-> geo_loc}}</td>
<td>

 <?php echo date('d-m-Y', strtotime($user->created_at));?>

 </td>


</tr>
@endforeach
 
  </table>
</div>

</body>
</html>


