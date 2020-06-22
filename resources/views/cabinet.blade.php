@extends('layouts.app')

@section('content')
    <div class="main">
        <div class="container">
            <div class="row">
                <div class="col-1-3">
                    <div class="card m-1">
                        <div class="card-header">
                            <p class="float-left">
                                Hello, {{  $user->name  }}&nbsp;</p>
                            {{--                            <a href="/admin" class="float-right">Edit account <i class="fa fa-edit"></i></a>--}}
                        </div>
                        <form action="{{ route('cabinet.saveUser', $user->id) }}" method="post">
                            @method('PUT')
                            @csrf
                            <div class="card-body">
                                <br>@include('alert')
                                <table class="table table-bordered table-hover">
                                    <tbody>
                                    <tr>
                                        <th>First Name</th>
                                        <td><input name="name" type="text" class="form-control"
                                                   value="{{  $user->name }}" ></td>
                                    </tr>
                                    <tr>
                                        <th>Last Name</th>
                                        <td><input name="last_name" type="text" class="form-control"
                                                   value="{{  $user->last_name }}" ></td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td><input name="email" value="{{  $user->email }}" type="email"
                                                   class="form-control" ></td>
                                    </tr>
                                    <tr>
                                        <th>Password</th>
                                        <td><input name="password" type="password"
                                                   class="form-control" placeholder="put your new password" ></td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="float-right">
                                    <button type="submit" class="btn btn-outline-info btn-sm">Save</button>
                                </div>
                            </div>
                        </form>
                    <br/>
                    </div>
                </div>
                <div class="col-2-3">
                    <div class="card m-1">
                        <div class="card-header">
                            <p class="float-left">
                                Your Bulletins</p>
                            {{--                            <a href="/admin" class="float-right">Edit account <i class="fa fa-edit"></i></a>--}}
                        </div>
                        <div class="card-body">
                            {{--                            <a href="{{ route('ads.create') }}" class="float-right">Add <i class="fa fa-plus"></i></a>--}}
                            <ul class="list-group list-group-flush">
                                @foreach($adsList as $ad)
                                    <li class="list-group-item">
                                        <div class="float-right">
{{--                                            <a class="btn badge badge-info" href="{{ route('ads.edit', $ad->id) }}">--}}
{{--                                                <i class="fa fa-pencil"></i> Edit</a>--}}
{{--                                            <form action="{{ route('ads.destroy', $ad->id) }}" method="POST"--}}
{{--                                                  style="display: inline-block;">--}}
{{--                                                @method('DELETE')--}}
{{--                                                @csrf--}}
{{--                                                <button class="btn badge badge-danger" types="submit"><i--}}
{{--                                                        class="fa fa-trash-o fa-lg"></i> Delete--}}
{{--                                                </button>--}}
{{--                                            </form>--}}
                                        </div>
                                        <img src="/image/{{ $ad->image }}" class="rounded" width="150px" align="left"
                                             vspace="5" hspace="5">
                                        <h5>{{ $ad->title }}</h5>
                                        <p>{{ $ad->text }}</p>
                                        <div class="float-left">
                                            <p class="text-info">{{date('d-m-Y', strtotime($ad->created_at))}} </p>
                                        </div>
                                        <div class="float-right">
                                            <p class="text-success"> {{ $ad->category->name }}</p>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
