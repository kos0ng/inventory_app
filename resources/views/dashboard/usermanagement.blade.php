@extends('dashboard/template')

@section('title','User Management')

@section('user_management','active')

@section('content')

<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <h3 class="title-5 m-b-35">User Management</h3>
                            <button type="button" class="btn btn-success mr-3" data-toggle="modal" data-target="#tambahSiswa" style="margin-bottom: 1%">
            Tambah Data
        </button>

        <div class="modal fade" id="tambahSiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false" style="margin-top: 5%">
            <div class="modal-dialog" role="document">
                <form method="post" action="/dashboard/insert_user">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                        </div>
                        <div class="modal-body">
 
                            {{ csrf_field() }}
 
                            <label>Email</label>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" required placeholder="Email">
                            </div>

                            <label>Password</label>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" required placeholder="Password">
                            </div>

                            <label>Konfirmasi Password</label>
                            <div class="form-group">
                                <input type="password" name="password_confirmation" class="form-control" required placeholder="Konfirmasi Password">
                            </div>
                            <hr>
                            <label>Nama</label>
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" required placeholder="Nama">
                            </div>
                            <label>Nomor Telepon</label>
                            <div class="form-group">
                                <input type="text" name="no_telp" class="form-control" required placeholder="Nomor Telepon">
                            </div>
                            <label>Role</label>
                            <div class="form-group">
                                <input type="radio" name="role" value="1">Admin<br>
                                <input type="radio" name="role" value="2">Gudang
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
                                                <th>Foto</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>No Telp</th>
                                                <th>Role</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $i = 1;
                                            @endphp
                                            @foreach($all as $row)
                                            <tr>
                                                <td style="width: 5%">{{$i}}</td>
                                                <td style="width: 10%"><img src="/images/profile/{{$row->foto}}" class="img-thumbnail"></td>
                                                <td>{{$row->name}}</td>
                                                <td>{{$row->email}}</td>
                                                <td>{{$row->no_telp}}</td>
                                                <td>
                                                    @if($row->role==1)
                                                    {{'Admin'}}
                                                    @endif
                                                    @if($row->role==2)
                                                    {{'Gudang'}}
                                                    @endif
                                                </td>
                                                <td>

                                                    <form action="/dashboard/activate_user" method="POST">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="id_user" value="{{$row->id_user}}">
                                                        @if($row->is_active==0)
                                                        <input type="submit" name="activate" class="btn btn-success" value="Activate">
                                                        @endif
                                                        @if($row->is_active==1)
                                                        <input type="submit" name="disable" class="btn btn-secondary" value="Disable">
                                                        @endif
                                                    </form>
                                                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editUser{{$row->id_user}}" >
            Edit
        </button>

        <div class="modal fade" id="editUser{{$row->id_user}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false" style="margin-top: 5%">
            <div class="modal-dialog" role="document">
                <form method="post" action="/dashboard/update_user">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                        </div>
                        <div class="modal-body">
 
                            {{ csrf_field() }}
 
                            <input type="hidden" name="id_user" value="{{$row->id_user}}">
                            <label>Email</label>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" required placeholder="Email" value="{{$row->email}}">
                            </div>
                            <hr>
                            <label>Nama</label>
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" required placeholder="Nama" value="{{$row->name}}">
                            </div>
                            <label>Nomor Telepon</label>
                            <div class="form-group">
                                <input type="text" name="no_telp" class="form-control" required placeholder="Nomor Telepon" value="{{$row->no_telp}}">
                            </div>
                            <label>Role</label>
                            <div class="form-group">
                                <input type="radio" name="role" value="1" @if($row->role==1) {{'checked'}} @endif>Admin<br>
                                <input type="radio" name="role" value="2" @if($row->role==2) {{'checked'}} @endif>Gudang
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

                                                    <button class="btn btn-danger" onclick="deleteUser('{{$row->id_user}}')">
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
                                                <th>Foto</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>No Telp</th>
                                                <th>Role</th>
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