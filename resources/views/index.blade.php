@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Board for your ads!</div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            @foreach($ads as $ad)
                                <li class="list-group-item">
                                    <h4>{{ $ad->title }}</h4>
                                    <img src="/image/{{ $ad->image }}"  width="150px" align="left"
                                         vspace="5" hspace="5"  class="img-thumbnail img-responsive">

                                    <p>{{ $ad->text }}</p>
                                    <div class="float-left">
                                        <p class="text-info">  {{ $ad->user->name }} {{ $ad->user->last_name }}
                                            | {{date('d-m-Y', strtotime($ad->created_at))}} </p>
                                    </div>
                                    <div class="float-right">
                                        <p class="text-success"> {{ $ad->category->name }}</p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <br/>
                @if ($ads->total() > $ads->count())
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            {{$ads->links()}}
                        </ul>
                    </nav>
                @endif
            </div>
        </div>
    </div>
@endsection
