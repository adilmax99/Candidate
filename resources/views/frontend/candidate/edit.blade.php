@extends('frontend.main')
@section('content')
<div class="container" >
  <div class="col-md-6 offset-md-3">
    <div class="jumbotron">
      <h1 align="center">Candidate Form</h1>
        @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
         @endif
     <form method="POST" action="{{ route('candidate.update', $candidate->id) }}" data-parsley-validate>
      @method('PATCH')
      @csrf
      <div class="form-group">
        <label for="fullName">Full Name <span id="error">*</span></label>
        <input type="text" class="form-control" name="fullName" id="fullName" value="{{$candidate->fullName}}" data-parsley-required>
      </div>
      <div class="form-group">
        <label for="email">Email address<span id="error">*</span></label>
        <input type="email" class="form-control" name="email" id="email" value="{{$candidate->email}}" data-parsley-required>
      </div>
      <div class="form-group">
        <label for="contactNo">Contact Number<span id="error">*</span></label>
        <input type="text" class="form-control" name="contactNo" id="contactNo" value="{{$candidate->contactNo}}" data-parsley-required>
      </div>
      <div class="form-group">
        <label for="education">Higher Education</label>
        <input type="text" class="form-control" name="education" id="education" value="{{$candidate->education}}">
      </div>
      <div class="form-group">
        <label for="city">City</label>
        <input type="text" class="form-control" name="city" id="city" value="{{$candidate->city}}">
      </div>
      <div class="form-check">
        <label class="ml-20" for="gender">Select Gender<span id="error">*</span></label>
        <div>
          <input class="form-check-input" type="radio" name="gender" id="gender" value="Male" data-parsley-required>   Male &nbsp;&nbsp;&nbsp;&nbsp;
          <input class="form-check-input" type="radio" name="gender" id="gender" value="Female" >  Female
        </div>
      </div>
      <div class="form-group">
        <label for="address" class="mt-10">Your Address</label>
        <textarea class="form-control" name="address" id="address" rows="3" >{{$candidate->address}}</textarea>
      </div>
      <div class="form-group">
        <button type="submit"  class="btn btn-primary">Submit</button>
      </div>
      <br>
    </form>
  </div>
</div>
</div>
@endsection