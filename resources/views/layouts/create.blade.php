
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

    @if (session('success'))
        {{session('success')}}
        @endif
 <div class="container">
     <div class="row justify-content-center">
         <div class="col-md-8">
             <div class="card">
                 <h2 class="card-header">Create</h2>

                 <div class="card-body">
                     @if($stop_article == 1)
                         <h4> News Are Currently Closed</h4>
                     @else

                     <form action="{{route('store')}}" method="POST" role="form" enctype="multipart/form-data">
                         {{csrf_field()}}

                         <div class="control">
                             <label for="news">News</label>
                             <input type="text" class="form-control " name="news" id="news" placeholder="Input Your news...">
                         </div>


                         <div class="form-group">
                             <label for="article">Article</label>
                             <textarea rows="4" cols="50" class="form-control" name="article" id="article" placeholder="Input Your article...">
                        </textarea>
                         </div>

                         <div class="control">
                             <label for="image">Image</label>
                             <input type="file" class="form-control " name="image" id="image" >
                         </div>

                     <button type="submit" class="btn btn-primary">Submit</button>
                 </form>

                         @endif

             </div>
             </div>
             </div>
             </div>
             </div>

 @endsection