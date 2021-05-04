@extends('dashboard/template')

@section('title','Barang Keluar')

@section('barangkeluar','active')

@section('content')

<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <h3 class="title-5 m-b-35">Riwayat Data Barang Keluar</h3>
                            <button type="button" class="btn btn-success mr-3" data-toggle="modal" data-target="#tambahSiswa" style="margin-bottom: 1%">
            Tambah Data
        </button>
        <button type="button" class="btn btn-warning mr-3" style="margin-bottom: 1%">
            <a href="/dashboard/laporan" style="text-decoration: none;color: #212529">Export Data</a>
        </button>

        <div class="modal fade" id="tambahSiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false" style="margin-top: 5%">
            <div class="modal-dialog" role="document">
                <form method="post" action="/dashboard/insert_barangkeluar">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Barang Keluar</h5>
                        </div>
                        <div class="modal-body">
 
                            {{ csrf_field() }}
 
                            <label>Tanggal Keluar</label>
                            <div class="form-group">
                                <input type="date" name="tanggal_keluar" class="form-control" required placeholder="Tanggal Masuk">
                            </div>

                            <label>Barang</label>
                            <div class="form-group">
                                <select class="form-control" name="barang_id">
                                @foreach($barang as $row_b)
                                    <option value="{{$row_b->id_barang}}">{{$row_b->nama_barang}}</option>
                                @endforeach
                                </select>
                            </div>
                            <label>Jumlah Keluar</label>
                            <div class="form-group">
                                <input type="number" name="jumlah_keluar" class="form-control">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning" id="searchtable">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>No Transaksi</th>
                                                <th>Tanggal Keluar</th>
                                                <th>Nama Barang</th>
                                                <th>Jumlah Keluar</th>
                                                <th>User</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $i = 1;
                                            @endphp
                                            @foreach($all as $row)
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td>{{$row->id_barang_keluar}}</td>
                                                <td>{{$row->tanggal_keluar}}</td>
                                                <td>{{$row->nama_barang}}</td>
                                                <td>{{$row->jumlah_keluar}}</td>
                                                <td>{{$row->name}}</td>
                                                <td>

                                                    <button class="btn btn-danger" onclick="deleteBarangKeluar('{{$row->id_barang_keluar}}')">
                                                        Hapus
                                                    </button>
                                                </td>
                                            </tr>
                                            @php
                                            $i++;
                                            @endphp
                                            @endforeach
                                        </tbody>
                                          <tfoot>
            <tr>
                                                <th>No</th>
                                                <th>No Transaksi</th>
                                                <th>Tanggal Keluar</th>
                                                <th>Nama Barang</th>
                                                <th>Jumlah Keluar</th>
                                                <th>User</th>
                                                <td></td>
            </tr>
        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
@endsection