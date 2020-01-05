
@extends('layouts.admin')

@section('content')



    @if (Session()->has('success'))
        <div class="alert alert-info">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">$times;</button>
           <strong>{{ Session()->get('success') }}</strong>
        </div>
    @endif


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">

                {{--<table class="table table-striped">--}}
                    {{--<thead>--}}
                    {{--<tr>--}}
                        {{--<th scope="col">#</th>--}}
                        {{--<th scope="col">Name</th>--}}
                        {{--<th scope="col">News</th>--}}
                        {{--<th scope="col">Article</th>--}}
                        {{--<th scope="col">Images</th>--}}
                        {{--<th scope="col">Add Post</th>--}}
                        {{--<th scope="col">Edit</th>--}}
                        {{--<th scope="col">Like</th>--}}
                        {{--<th scope="col">Delete</th>--}}
                        {{--<th scope="col">Date</th>--}}

                    {{--</tr>--}}
                    {{--</thead>--}}
                    {{--<tbody>--}}
                          {{--<?php $i = 0 ?>--}}

                    {{--@foreach($articles as $article)--}}
                           {{--<?php $i++ ?>--}}

                        {{--<tr>--}}
                            {{--<th scope="row">{{$i}}</th>--}}
                            {{--<td>{{ucwords($article->user->name)}}</td>--}}
                            {{--<td>{{$article->news}}</td>--}}
                            {{--<td>{{$article->article}}</td>--}}
                            {{--<td><img style="display:block;width:100%;height:100%;" src={{asset('storage/' .$article->image)}} /></td>--}}

                            {{--@if(Auth::check())--}}
                             {{--@if(Auth::user()->hasRole(['admin','editor']))--}}

                             {{--<td><a href="{{route('create')}}" style="color:green"><i class="fa fa-2x fa-plus" aria-hidden="true"></i></a> </td>--}}

                            {{--<td><a class="btn btn-primary" href="{{ route('Article.edit',$article->id) }}">Edit</a></td>--}}

                              {{--@php--}}
                              {{--$like_count = 0;--}}
                                {{--$dislike_count = 0;--}}

                              {{--$like_status = "btn-secondary";--}}
                              {{--$dislike_status = "btn-secondary";--}}

                              {{--@endphp--}}
                                {{--@foreach($article->likes as $like)--}}
                                    {{--@php--}}
                                    {{--if($like->like == 1){--}}
                                        {{--$like_count++;--}}
                                    {{--}if ($like->like == 0){--}}
                                    {{--$dislike_count++;--}}
                                    {{--}--}}


                                    {{--if ($like->like == 1 && $like->user_id == Auth::user()->id){--}}
                                      {{--$like_status = "btn-success";--}}
                                    {{--}--}}
                                    {{--if ($like->like == 0 && $like->user_id == Auth::user()->id){--}}
                                       {{--$dislike_status = "btn-danger";--}}
                                    {{--}--}}

                                    {{--@endphp--}}

                                    {{--@endforeach--}}


                                {{--<td><button data-like="{{$like_status}}" type="button" class="like btn {{$like_status}}">like <span class="glyphicon glyphicon-thumbs-up"></span> <b>{{$like_count}}</b> </button>--}}
                                    {{--<button  type="button" class="btn {{$dislike_status}}">dislike <span class="glyphicon glyphicon-thumbs-down"></span> <b>{{$dislike_count}}</b> </button></td>--}}

                                {{--<td><a href="delete/{{$article->id}}"><i class="fa fa-trash fa-2x" style=" color:red;" ></i></a></td>--}}

                                    {{--<td>{{$article->created_at}}</td>--}}
                                {{--@endif--}}
                            {{--@endif--}}
                        {{--</tr>--}}


                    {{--@endforeach--}}

                    {{--</tbody>--}}
                {{--</table>--}}


                <h2 class="news">News</h2>
                @foreach($articles as $article)
                <p class="date">Date:{{$article->created_at}}</p>
                <h4 class="text-capitalize" style=" line-height: 2;">{{$article->news}}</h4>
                <p class="text-capitalize" style=" line-height: 2;">{{$article->article}}</p>
                <img style="display:block;width:100%;height:50%;" src="{{asset('storage/' .$article->image)}}" class="img-fluid" alt="Responsive image"><br>

                @php
                    $like_count = 0;
                    $dislike_count = 0;

                    $like_status = "btn-secondary";
                    $dislike_status = "btn-secondary";

                @endphp
                @foreach($article->likes as $like)
                    @php
                        if($like->like == 1){
                            $like_count++;
                        }if ($like->like == 0){
                        $dislike_count++;
                        }


                        if ($like->like == 1 && $like->user_id == Auth::user()->id){
                          $like_status = "btn-success";
                        }
                        if ($like->like == 0 && $like->user_id == Auth::user()->id){
                           $dislike_status = "btn-danger";
                        }

                    @endphp

                @endforeach

                <button type="button" data-article="{{$article->id}}" data-like="{{$like_status}}" class="like btn{{$like_status}}">like
                    <span class="glyphicon glyphicon-thumbs-up"></span> <b>{{$like_count}}</b> </button>

                <button type="button" data-article="{{$article->id}}" data-dislike="{{$dislike_status}}" class="dislike btn{{$dislike_status}}">dislike
                    <span class="glyphicon glyphicon-thumbs-down"></span> <b>{{$dislike_count}}</b> </button>


                @if(Auth::check())
                    @if(Auth::user()->hasRole(['admin','editor']))
                <a href="delete/{{$article->id}}"><i class="delete fa fa-trash fa-2x" style=" color:red;" ></i></a>
                <a href="{{route('create')}}" style="color:green"><i class="fa fa-2x fa-plus" aria-hidden="true"></i></a>
                <a class="btn btn-primary" href="{{ route('Article.edit',$article->id) }}">Edit</a>
                    @endif
                @endif
                    <div class="block_1"></div> <hr />

                @endforeach

            </div>
        </div>
    </div>

@endsection

