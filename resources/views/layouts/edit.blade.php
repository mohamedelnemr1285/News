
@extends('layouts.admin')


@section('content')

    @if ($errors->any())
        <div class="notification is-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit</div>

                    <div class="card-body">

                        {{--@foreach($articles as $article)--}}
                            <form action="{{ route('Article.update',['id' =>$article->id])}}" method="POST" role="form" enctype="multipart/form-data">
                                @csrf
                                {{--@method('PATCH')--}}

                            <div class="control">
                                <label for="news">News</label>
                                <input type="text" class="form-control" value="{{$article->news}}" name="news" id="news" placeholder="Input Your news...">
                            </div>


                            <div class="form-group">
                                <label for="article">Article</label>
                                <textarea rows="4" cols="50" class="form-control"  name="article" id="article" placeholder="Input Your article...">
                                {{$article->article}}
                           </textarea>
                            </div>

                                <div class="control">
                                    <label for="image">Image</label>
                                    <input type="file" class="form-control " name="image" id="image" value="{{$article->image}}">
                                </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                        {{--@endforeach--}}

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection