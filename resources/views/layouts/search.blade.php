
@extends('layouts.admin')

@section('content')

    @if($articles->count() > 0)

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">News</th>
                        <th scope="col">Article</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 0 ?>

                    @foreach($articles as $article)
                        <?php $i++ ?>

                        <tr>
                            <th scope="row">{{$i}}</th>
                            <td>{{ucwords($article->user->name)}}</td>
                            <td>{{$article->news}}</td>
                            <td>{{$article->article}}</td>

                        </tr>

                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@else
        <h2 style="color:red;"> No Results</h2>

    @endif


@endsection



