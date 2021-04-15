<!DOCTYPE html>
<html>
<head>
	<title>Laporan Barang Masuk</title>
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
		<h2>Laporan Barang Masuk</h2>
		<h3>Tanggal : {{$tanggal}} </h3>
	</center>

	<table style="border: 1">
		<thead>
			<tr>
				<th>No</th>
				<th>Tgl Masuk</th>
				<th>ID Transaksi</th>
				<th>Nama Barang</th>
				<th>Supplier</th>
				<th>Jumlah Masuk</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($laporan as $row)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{$row->tanggal_masuk}}</td>
				<td>{{$row->id_barang_masuk}}</td>
				<td>{{$row->nama_barang}}</td>
				<td>{{$row->nama_supplier}}</td>
				<td>{{$row->jumlah_masuk}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>