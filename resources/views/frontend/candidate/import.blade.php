@extends('frontend.main')
@section('title', 'Import Export Candidates')
@section('content')
<section class="mt-60">
<div class="container">
    <div class="card mt-4">
        <div class="card-header">
            Candidate Details
        </div>
        <div class="card-body">
            <form action="{{ url('candidate-import') }}" method="POST" 
               enctype="multipart/form-data" data-parsley-validate>
                @csrf
                <input type="file" name="file" class="form-control" data-parsley-required>
                <br>
                <a class="btn btn-info" href="{{ url('export') }}"> 
                 Export File</a>
                <button type="submit" class="btn btn-success">Import File</button>
            </form>
        </div>
    </div>

     <div class="card">
        <div class="card-body">
          <h4 class="card-title m-b-0">Candidate Table</h4>
          @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
          @endif
          <div class="form-group">
            <a href="{{ route('candidate.index') }}" class="btn btn-success" >Add New Candidate</a>
            <a href="{{ url('import-export') }}" class="btn btn-success" >Upload In CSV</a>
          </div>
        </div>
        <div class="table-responsive">
        <table id="candiTable" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Candidate Name</th>
              <th scope="col">Email</th>
              <th scope="col">Phone Number</th>
              <th scope="col">Higher Education</th>
              <th scope="col">City</th>
              <th scope="col">Gender</th>
              <th scope="col">address</th>
              <th scope="col">Action</th>
              <th scope="col">Created At</th>
            </tr>
          </thead>
          <tbody>
            @foreach($candidate as $candidates)
            <tr>
              <th scope="row">{{$candidates->id}}</th>
              <td>{{$candidates->fullName}}</td>
              <td>{{$candidates->email}}</td>
              <td>{{$candidates->contactNo}}</td>
              <td>{{$candidates->education}}</td>
              <td>{{$candidates->city}}</td>
              <td>{{$candidates->gender}}</td>
              <td>{{$candidates->address}}</td>
              <td>
                <a href="{{ route('candidate.edit', [$candidates->id])}}" class="btn btn-primary btn-sm">Edit</a>
                <a href="{{ route('candidate.destroy', $candidates->id)}}" onclick="event.preventDefault();  document.getElementById('{{$candidates->id}}').submit();" class="btn btn-danger btn-sm">Delete</a>

                <form id="{{$candidates->id}}" action="{{ route('candidate.destroy', $candidates->id)}}" method="post" style="display: none;">
                  @csrf
                  @method('DELETE')
                </form>
              </td>
              <td>{{$candidates->created_at }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
        </div>
      </div>
</div>
</section>
@endsection