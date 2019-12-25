
{{--@extends('layouts.app')--}}

{{--@section('content')--}}

    {{--<div class="container">--}}
        {{--<div class="row justify-content-center">--}}
            {{--<div class="col-md-8">--}}

                {{--<table class="table table-striped">--}}
                    {{--<thead>--}}
                    {{--<tr>--}}
                        {{--<th scope="col">#</th>--}}
                        {{--<th scope="col">Name</th>--}}
                        {{--<th scope="col">News</th>--}}
                        {{--<th scope="col">Article</th>--}}
                        {{--<th scope="col">Edit</th>--}}
                        {{--<th scope="col">De</th>--}}
                    {{--</tr>--}}
                    {{--</thead>--}}
                    {{--<tbody>--}}
                    {{--@foreach($articles as $article)--}}

                        {{--<tr>--}}
                            {{--<th scope="row">{{$article->id}}</th>--}}
                            {{--<td>{{ucwords($article->user->name)}}</td>--}}
                            {{--<td>{{$article->news}}</td>--}}
                            {{--<td>{{$article->article}}</td>--}}


                            {{--<td> <a href="{{route('article.edit',$article->id)}}"/> <i class="fa fa-2x fa-edit"></i></td>--}}


                            {{--<form action="{{route('article.destroy',$article->id)}}" method="get" role="form">--}}
                                {{--{{csrf_field()}}--}}
                            {{--<td><a href="{{route('article.destroy',['id'=>$article->id])}}"/> <i class="fa fa-trash fa-2x"style=" color:red;"></i></td>--}}
                            {{--</form>--}}
                        {{--</tr>--}}
                    {{--@endforeach--}}

                    {{--</tbody>--}}
                {{--</table>--}}


            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

{{--@endsection--}}

