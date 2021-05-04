@extends('dashboard/template')

@section('title','Jenis Barang')

@section('barang','active')

@section('content')

<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <h3 class="title-5 m-b-35">Data Jenis</h3>
                            <button type="button" class="btn btn-success mr-3" data-toggle="modal" data-target="#tambahSiswa" style="margin-bottom: 1%">
            Tambah Data
        </button>
         <button type="button" class="btn btn-warning mr-3" data-toggle="modal" data-target="#exportData" style="margin-bottom: 1%">
            Export Data
        </button>
        <div class="modal fade" id="exportData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false" style="margin-top: 10%">
            <div class="modal-dialog" role="document">
                <form method="post" action="/dashboard/export_table">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Export Data</h5>
                        </div>
                        <div class="modal-body">
 
                            {{ csrf_field() }}
 
                            <input type="hidden" name="id" value="2">
                            <label>Bentuk Laporan</label>
                            <div class="form-group">
                                <select class="form-control" name="output">
                                    <option value="0">PDF</option>
                                    <option value="1">Excel</option>
                                </select>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Export</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="modal fade" id="tambahSiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false" style="margin-top: 5%">
            <div class="modal-dialog" role="document">
                <form method="post" action="/dashboard/insert_jenis">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Jenis</h5>
                        </div>
                        <div class="modal-body">
 
                            {{ csrf_field() }}
 
                            <label>Nama Jenis</label>
                            <div class="form-group">
                                <input type="text" name="nama_jenis" class="form-control" required placeholder="Nama Jenis">
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
                                                <th>Nama Jenis</th>
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
                                                <td>{{$row->nama_jenis}}</td>
                                                <td>
                                                     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editJenis{{$row->id_jenis}}" >
            Edit
        </button>

        <div class="modal fade" id="editJenis{{$row->id_jenis}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false" style="margin-top: 5%">
            <div class="modal-dialog" role="document">
                <form method="post" action="/dashboard/update_jenis">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ubah Jenis</h5>
                        </div>
                        <div class="modal-body">
 
                            {{ csrf_field() }}
 
                            <label>Nama</label>
                            <input type="hidden" name="id" value="{{$row->id_jenis}}">
                            <div class="form-group">
                                <input type="text" name="nama_jenis" class="form-control" required placeholder="Nama" value="{{$row->nama_jenis}}">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Ubah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

                                                    <button class="btn btn-danger" onclick="deleteJenis({{$row->id_jenis}})">
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
                <th>Nama Jenis</th>
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