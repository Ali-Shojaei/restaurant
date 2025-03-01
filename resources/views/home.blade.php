@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="style.css"> 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h6 style="font-family: 'IranSansWeb'; margin-top: 10px;  ">داشبورد</h6></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h4 style="font-family: 'IranSansWeb'; margin-top: 10px; ">!شما قبلا در سیستم ثبت نام شده اید</h4>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
