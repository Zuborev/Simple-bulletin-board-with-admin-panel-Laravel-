@extends('layouts.app')

@section('content')
    <div class="main">
        <div class="container-fluid">
            @include('alert')
        </div>
        <div class="container">
            <div class="row col-auto">
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-5">
                    <div class="card">
                        <div class="card-header">
                            <p class="float-left">
                                Your Bulletins</p>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                @if(count($adsList))
                                    @foreach($adsList as $ad)
                                        <li class="list-group-item">
                                            <div class="float-right">
                                                <form
                                                    action="{{ route('adDestroy', $ad->id) }}"
                                                    method="POST"
                                                    style="display: inline-block;">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn badge badge-danger" types="submit"><i
                                                            class="fa fa-trash-o fa-lg"></i> Delete
                                                    </button>
                                                </form>
                                            </div>
                                            <img src="/image/{{ $ad->image }}" class="img-thumbnail img-responsive"
                                                 width="75px" align="left"  hspace="5">
                                            <h5>{{ $ad->title }}</h5>
                                            <p>{{ $ad->text }}</p>
                                            <div class="float-left">
                                                <p class="text-info">{{date('d-m-Y', strtotime($ad->created_at))}} </p>
                                            </div>
                                            <div class="float-right">
                                                <p class="text-success"> {{ $ad->category->name }}</p>
                                            </div>
                                        </li>
                                        <hr>
                                    @endforeach
                            </ul>
                            @else
                                <h5>No records found</h5>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <p class="float-left">
                                Add ads</p>
                        </div>
                        <form action="{{ route('adStore') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <input name="title"  class="form-control" value="{{  old("title") }}"
                                       placeholder="Title">
                                <br>
                                <textarea name="text" class="form-control" placeholder="Text..." rows="5"
                                          >{{  old('text')  }}</textarea>
                                <br>
                                <select class="form-control" name="category_id"  type="text">
                                    <option value="" disabled selected hidden>Ad's category</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{  $category->name  }}</option>
                                    @endforeach
                                </select>
                                <br>
                                <input type="file" class="filestyle" name="image" value="{{old('image')}}"
                                       data-placeholder="File is not">&nbsp;
                                <input type="hidden" name="user_id" value="{{$user->id}}">
                                <br>
                                <button type="submit" class="btn btn-outline-info btn-sm">Add your ad</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="clearfix visible-md-block"></div>
                <div class="col-xs-12 col-sm-6 col-md-12 col-lg-3">
                    <div class="card">
                        <div class="card-header">
                            <p class="float-left">
                                Hello, {{  $user->name  }}</p>
                        </div>
                        <form action="{{ route('cabinet.saveUser', $user->id) }}" method="post">
                            @method('PUT')
                            @csrf
                            <div class="card-body">
                                <label for="name">First Name</label>
                                <input name="name" type="text" class="form-control" id="name"
                                       value="{{  $user->name }}">

                                <label for="last_name">Last Name</label>
                                <input name="last_name" type="text" class="form-control" id="last_name"
                                       value="{{  $user->last_name }}">
                                <label for="email">Email</label>
                                <input name="email" value="{{  $user->email }}" type="email" id="email"
                                       class="form-control">
                                <label for="password">Password</label>
                                <input name="password" type="password" id="password"
                                       class="form-control" placeholder="put your new password">
                                <br>
                                <button type="submit" class="btn btn-outline-info btn-sm">Chance your info</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
