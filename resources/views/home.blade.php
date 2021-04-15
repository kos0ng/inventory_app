@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Anda telah masuk! tunggu admin untuk mengaktifkan akun anda atau hubungi admin untuk mengaktifkan akun anda!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
