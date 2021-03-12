@extends('Admin.layout')

@section('content')
                @if($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
<form method="post" action="{{route('koordinator.update', $koordinator->id)}}" enctype="multipart/form-data" class="form-control">
@csrf
@method('PUT')
  <div class="mb-3">
    <label class="form-label">Name</label>
    <input type="text" class="form-control" name="name" value="{{$koordinator->name}}">
  </div>
  <div class="mb-3">
    <label class="form-label">Nip</label>
    <input type="text" class="form-control" name="nomor_induk" value="{{$koordinator->nomor_induk}}">
  </div>
  <div class="mb-3">
    <label class="form-label">Username</label>
    <input type="text" class="form-control" name="username" value="{{$koordinator->username}}">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" value="{{$koordinator->password}}">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection