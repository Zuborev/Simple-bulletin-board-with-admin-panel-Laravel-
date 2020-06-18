@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <p class="float-left">Hello, {{  auth()->user()->last_name  }} {{  auth()->user()->name  }}</p>
                        <a href="/admin" class="float-right">Edit account <i class="fa fa-edit"></i></a>
                    </div>
                    <div class="card-body">

                        <div>
                            <p>Your Bulletins: <a class="btn-sm btn-primary" href="#">Add</a></p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
