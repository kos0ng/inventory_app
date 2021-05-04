<!DOCTYPE html>
<html>
<head>
	<title>Laporan user</title>
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
		<h2>Laporan user</h2>
		<h3>Tanggal : {{$tanggal}} </h3>
	</center>

	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>ID User</th>
				<th>Nama</th>
				<th>Email</th>
				<th>No Telepon</th>
				<th>Role</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			@foreach($laporan as $row)
			<tr>
				<td>{{ $row->id_user }}</td>
				<td>{{$row->name}}</td>
				<td>{{$row->email}}</td>
				<td>{{$row->no_telp}}</td>
				<td>
					@if($row->role==1)
					Administrator
					@endif
					@if($row->role==2)
					Gudang
					@endif
				</td>
				<td>
					@if($row->is_active==0)
					Tidak Aktif
					@endif
					@if($row->is_active==1)
					Aktif
					@endif
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>