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
<form method="post" action="{{route('gurusenbud.store')}}" enctype="multipart/form-data" class="form-control">
@csrf
  <div class="mb-3">
    <label class="form-label">Name</label>
    <input type="text" class="form-control" name="name">
  </div>
  <div class="mb-3">
    <label class="form-label">NIP</label>
    <input type="text" class="form-control" name="nomor_induk">
  </div>
  <div class="mb-3">
    <label class="form-label">Senbud</label>
    <select class="form-select" aria-label="Default select example" name="senbud_id">
    <option selected>Open this select menu</option>
      @foreach ($senbud as $senbud)
              <option value="{{ $senbud->id }}">{{ $senbud->name }}</option>
      @endforeach        
    </select>
  </div>  
  
  <div class="mb-3">
    <label class="form-label">Username</label>
    <input type="text" class="form-control" name="username">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection