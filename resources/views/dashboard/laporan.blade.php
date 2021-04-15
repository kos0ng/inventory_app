@extends('dashboard/template')

@section('title','Laporan')

@section('laporan','active')

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
                                            <h4 style="color:white">
                                                Form Laporan
                                            </h4 >
                                        </div>
                                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4"></div>
                                <form action="/dashboard/cetak_laporan" method="POST">
                                <div class="col-md-8">
                                    {{ csrf_field() }}
                                    <label>Laporan Transaksi</label>
                                    <div class="form-group">
                                        <input type="radio" name="tipe" value="0">Barang Masuk<br>
                                        <input type="radio" name="tipe" value="1">Barang Keluar
                                    </div>           
                                    <label>Tanggal</label>
                                    <div class="form-group">
                                        <input type="text" name="daterange" value="01/01/2021 - 01/02/2021" class="form-control">
                                    </div>           
                                    <input type="submit" name="submit" value="Cetak" class="btn btn-success">
                                </div>
                                </form>
                                <div class="col-md-2"></div>
                            </div>
                                        </div>

                                    </section>

                                </aside>
                            </div>
                            <div class="col-ld-3"></div>
                        </div>
                       
                    </div>
                </div>
            </div>
@endsection