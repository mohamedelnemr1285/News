@extends('layouts.admin')

@section('content')

<div>
<h4>Control Panel</h4>

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">User</th>
            <th scope="col">Editor</th>
            <th scope="col">Admin</th>

        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <form method="post" action="{{route('add.role')}}">
            <th scope="row">{{$user->id}}</th>
            <td>{{$user->name}}</td>
            <td>{{$user->email}} <input type="hidden" name="email" value="{{$user->email}}"></td>
            <td>
                <input type="checkbox" onChange="this.form.submit()" {{$user->hasRole('User') ? 'checked' : ''}} name="role_user">
            </td>
            <td>
                <input type="checkbox" onChange="this.form.submit()" {{$user->hasRole('Editor') ? 'checked' : ''}} name="role_editor">

            </td>
             <td>
                 <input type="checkbox" onChange="this.form.submit()" {{$user->hasRole('Admin') ? 'checked' : ''}} name="role_admin">

             </td>
                {{csrf_field()}}

                {{--<td><button type="submit">Submit Roles</button></td>--}}
                </form>
            </tr>
        @endforeach

        </tbody>
    </table>

    <form method="post" action="/setting">
        {{csrf_field()}}

        <h3>Setting</h3>
        <label>Stop-Article</label>
         <input type="checkbox"  name="stop_article" onChange="this.form.submit()" {{$stop_article == 1 ? 'checked' : ''}}>

    </form>

</div>
@endsection
