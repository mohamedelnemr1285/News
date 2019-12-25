@extends('layouts.admin')

@section('content')

    <h1 class="page-header">
        Statistics
        <small>WebSite Statistics</small>
    </h1>

    <div>
        <table class="table table-bordered">
            <tr>
                <td>All Likes</td>
                <td>{{$statistics['check_article']}}</td>
            </tr>
            <tr>
                <td>All Articles</td>
                <td>{{$statistics['articles']}}</td>
            </tr>
        </table>
    </div>

    @endsection