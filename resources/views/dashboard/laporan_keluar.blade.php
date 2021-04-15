<!DOCTYPE html>
<html>
<head>
	<title>Laporan Barang Keluar</title>
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
		<h2>Laporan Barang Keluar</h2>
		<h3>Tanggal : {{$tanggal}} </h3>
	</center>

	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>Tgl Keluar</th>
				<th>ID Transaksi</th>
				<th>Nama Barang</th>
				<th>Jumlah Keluar</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($laporan as $row)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{$row->tanggal_keluar}}</td>
				<td>{{$row->id_barang_keluar}}</td>
				<td>{{$row->nama_barang}}</td>
				<td>{{$row->jumlah_keluar}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>