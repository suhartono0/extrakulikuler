@extends('Admin.layout')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            <p>{{ $message }}</p>
        </div>
    @endif
<a class="btn btn-success" href="{{route('gurusenbud.create')}}">Add</a>
<div class="form-control">
    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Nip</th>            
            <th scope="col">Senbud</th>
            <th scope="col">username</th>
            <th scope="col">passwrod</th>
            <th scope="col">action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($gurusenbud as $gurusenbud)    
                <tr>
                <th scope="row">{{ ++ $i }}</th>
                    <td>{{ $gurusenbud -> name}}</td>
                    <td>{{ $gurusenbud -> nomor_induk}}</td>                    
                    <td>{{ $gurusenbud -> senbud_id}}</td>                    
                    <td>{{ $gurusenbud -> username}}</td>
                    <td>{{ $gurusenbud -> password}}</td>
                    <td>
                    <form action="{{route('gurusenbud.destroy', $gurusenbud->id)}}" method="post">
                        <a href="{{route('gurusenbud.edit', $gurusenbud->id)}}" type="button" class="btn btn-primary">Update</a>
                        
                        @csrf
                        @method('DELETE')               
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    </td>

                </tr>        
            @endforeach
        </tbody>
    </table>
</div>

@endsection
