@extends('dashboard/template')

@section('title','Barang Masuk')

@section('barangmasuk','active')

@section('content')

<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <h3 class="title-5 m-b-35">Riwayat Data Barang Masuk</h3>
                            <button type="button" class="btn btn-success mr-3" data-toggle="modal" data-target="#tambahSiswa" style="margin-bottom: 1%">
            Tambah Data
        </button>

        <div class="modal fade" id="tambahSiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false" style="margin-top: 5%">
            <div class="modal-dialog" role="document">
                <form method="post" action="/dashboard/insert_barangmasuk">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Barang Masuk</h5>
                        </div>
                        <div class="modal-body">
 
                            {{ csrf_field() }}
 
                            <label>Tanggal Masuk</label>
                            <div class="form-group">
                                <input type="date" name="tanggal_masuk" class="form-control" required placeholder="Tanggal Masuk">
                            </div>

                            <label>Supplier</label>
                            <div class="form-group">
                                <select class="form-control" name="supplier_id">
                                @foreach($supplier as $row_s)
                                    <option value="{{$row_s->id_supplier}}">{{$row_s->nama_supplier}}</option>
                                @endforeach
                                </select>
                            </div>
                            <label>Barang</label>
                            <div class="form-group">
                                <select class="form-control" name="barang_id">
                                @foreach($barang as $row_b)
                                    <option value="{{$row_b->id_barang}}">{{$row_b->nama_barang}}</option>
                                @endforeach
                                </select>
                            </div>
                            <label>Jumlah Masuk</label>
                            <div class="form-group">
                                <input type="number" name="jumlah_masuk" class="form-control">
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
                                                <th>Tanggal Masuk</th>
                                                <th>Supplier</th>
                                                <th>Nama Barang</th>
                                                <th>Jumlah Masuk</th>
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
                                                <td>{{$row->id_barang_masuk}}</td>
                                                <td>{{$row->tanggal_masuk}}</td>
                                                <td>{{$row->nama_supplier}}</td>
                                                <td>{{$row->nama_barang}}</td>
                                                <td>{{$row->jumlah_masuk}}</td>
                                                <td>{{$row->name}}</td>
                                                <td>

                                                    <button class="btn btn-danger" onclick="deleteBarangMasuk('{{$row->id_barang_masuk}}')">
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
                                                <th>Tanggal Masuk</th>
                                                <th>Supplier</th>
                                                <th>Nama Barang</th>
                                                <th>Jumlah Masuk</th>
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