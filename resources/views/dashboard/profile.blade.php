@extends('dashboard/template')

@section('title','Profile')

@section('dashboard','active')

@section('content')

<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-3">
                            </div>
                             <div class="col-lg-6">
                                @if ($errors->any())
    <div class="alert alert-danger" style="padding-left: 5%">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                                <aside class="profile-nav alt">
                                    <section class="card">
                                        <div class="card-header user-header alt bg-dark">
                                            <div class="media">
                                                <a href="#">
                                                    <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="/images/profile/{{$all->foto}}">
                                                </a>
                                                <div class="media-body">
                                                    <h2 class="text-light display-6">{{$all->name}}</h2>
                                                    <p style="color: white">{{$all->email}}</p>
                                                </div>
                                            </div>
                                        </div>


                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">
                                                <a href="#">
                                                    <i class="fa fa-user"></i> Role : 
                                                    @if($all->role==1) {{'Admin'}} @endif
                                                    @if($all->role==2) {{'Gudang'}} @endif

                                                </a>
                                            </li>
                                            <li class="list-group-item">
                                                <a href="#">
                                                    <i class="fa fa-clock-o"></i> Registered At : 
                                                    {{$all->created_at}}
                                                </a>
                                            </li>
                                        </ul>

                                    </section>
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#editUser">
            Ubah Profile
        </button>

        <div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false" style="margin-top: 5%">
            <div class="modal-dialog" role="document">
                <form method="post" action="/dashboard/update_profile" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                        </div>
                        <div class="modal-body">
 
                            {{ csrf_field() }}
 
                            <label>Foto</label>
                            <div class="form-group text-center">
                                <img src="/images/profile/{{$all->foto}}" class="img-thumbnail" style="width: 50%">
                            </div>
                            <div class="form-group">
                                <input type="file" name="foto" class="form-control" placeholder="Foto">
                            </div>
                            <label>Email</label>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" required placeholder="Email" value="{{$all->email}}">
                            </div>
                            <hr>
                            <label>Nama</label>
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" required placeholder="Nama" value="{{$all->name}}">
                            </div>
                            <label>Nomor Telepon</label>
                            <div class="form-group">
                                <input type="text" name="no_telp" class="form-control" required placeholder="Nomor Telepon" value="{{$all->no_telp}}">
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
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#changePassword">
            Change Password
        </button>

        <div class="modal fade" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false" style="margin-top: 5%">
            <div class="modal-dialog" role="document">
                <form method="post" action="/dashboard/change_password" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ganti Password</h5>
                        </div>
                        <div class="modal-body">
 
                            {{ csrf_field() }}

 
                            <label>Password Lama</label>
                            <div class="form-group text-center">
                                <input type="password" name="old_password" class="form-control">
                            </div>
                            
                            <label>Password Baru</label>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" required placeholder="Password Baru">
                            </div>
                            <hr>
                            <label>Konfirmasi Password Baru</label>
                            <div class="form-group">
                                <input type="password" name="password_confirmation" class="form-control" required placeholder="Konfirmasi Password Baru" >
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
                                </aside>
                            </div>
                            <div class="col-ld-3"></div>
                        </div>
                       
                    </div>
                </div>
            </div>
@endsection