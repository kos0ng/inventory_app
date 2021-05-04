<!DOCTYPE html>
<html>
<head>
	<title>Laporan {{$table_name}}</title>
</head>
<body>
	<style type="text/css">
		table, th, td {
  border: 1px solid black;
}
table{
	width: 100%
}
	</style>
	<center>
		<h2>Laporan {{$table_name}}</h2>
		<h3>Tanggal : {{$tanggal}} </h3>
	</center>

	<table class='table table-bordered'>
		<thead>
			<tr>
				@foreach($columns as $row)
				<th>{{$row}}</th>
				@endforeach
			</tr>
		</thead>
		<tbody>
			@foreach($laporan as $row)
			<tr>
				@foreach($row as $row2)
					<td>{{$row2}}</td>
				@endforeach
			</tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>