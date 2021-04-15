@extends('dashboard/template')

@section('title','Data Siswa')

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

        <div class="modal fade" id="tambahSiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false" style="margin-top: 5%">
            <div class="modal-dialog" role="document">
                <form method="post" action="/dashboard/insert_barang">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Jenis</h5>
                        </div>
                        <div class="modal-body">
 
                            {{ csrf_field() }}
 
                            <label>Nama Barang</label>
                            <div class="form-group">
                                <input type="text" name="nama_barang" class="form-control" required placeholder="Nama Barang">
                            </div>

                            <label>Jenis Barang</label>
                            <div class="form-group">
                                <select class="form-control" name="jenis_id">
                                @foreach($jenis as $row_j)
                                    <option value="{{$row_j->id_jenis}}">{{$row_j->nama_jenis}}</option>
                                @endforeach
                                </select>
                            </div>
                            <label>Satuan Barang</label>
                            <div class="form-group">
                                <select class="form-control" name="satuan_id">
                                @foreach($satuan as $row_s)
                                    <option value="{{$row_s->id_satuan}}">{{$row_s->nama_satuan}}</option>
                                @endforeach
                                </select>
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
                                                <th>ID Barang</th>
                                                <th>Nama Barang</th>
                                                <th>Jenis Barang</th>
                                                <th>Stok</th>
                                                <th>Satuan</th>
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
                                                <td>{{$row->id_barang}}</td>
                                                <td>{{$row->nama_barang}}</td>
                                                <td>{{$row->nama_jenis}}</td>
                                                <td>{{$row->stok}}</td>
                                                <td>{{$row->nama_satuan}}</td>
                                                <td>
                                                     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editJenis{{$row->id_barang}}" >
            Edit
        </button>

        <div class="modal fade" id="editJenis{{$row->id_barang}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false" style="margin-top: 5%">
            <div class="modal-dialog" role="document">
                <form method="post" action="/dashboard/update_barang">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ubah Jenis</h5>
                        </div>
                        <div class="modal-body">
 
                            {{ csrf_field() }}
 
                            <label>Nama Barang</label>
                            <input type="hidden" name="id" value="{{$row->id_barang}}">
                            <div class="form-group">
                                <input type="text" name="nama_barang" class="form-control" required placeholder="Nama" value="{{$row->nama_barang}}">
                            </div>
                            <label>Jenis Barang</label>
                            <div class="form-group">
                                <select class="form-control" name="jenis_id">
                                @foreach($jenis as $row_j)
                                    <option value="{{$row_j->id_jenis}}" @if($row_j->id_jenis == $row->jenis_id) {{'selected'}} @endif>{{$row_j->nama_jenis}}</option>
                                @endforeach
                                </select>
                            </div>
                            <label>Satuan Barang</label>
                            <div class="form-group">
                                <select class="form-control" name="satuan_id">
                                @foreach($satuan as $row_s)
                                    <option value="{{$row_s->id_satuan}}" @if($row_s->id_satuan == $row->satuan_id) 
                                        {{'selected'}}
                                     @endif>{{$row_s->nama_satuan}}</option>
                                        }
                                @endforeach
                                </select>
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

                                                    <button class="btn btn-danger" onclick="deleteBarang('{{$row->id_barang}}')">
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
                <th>ID Barang</th>
                <th>Nama Barang</th>
                <th>Jenis Barang</th>
                <th>Stok</th>
                <th>Satuan</th>
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