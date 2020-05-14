@extends('layouts.app')

@section('content')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-8">Add Experience</h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
       <form method="post" action="{{ route('experience.store') }}" >
          @csrf

          <div class="form-group">    
              <label for="company_name">Company Name:</label>
              <input type="text" class="form-control" name="company_name" id='company_name' />
          </div>

          <div class="form-group">    
              <label for="designation">Designation:</label>
              <input type="text" class="form-control" name="designation" id='designation' />
          </div>

          <div class="form-group">    
              <label for="from_date">From Date:</label> 
              <input type="date" class="form-control" name="from_date" id='from_date' />
              
          </div>

          <div class="form-group">    
              <label for="to_date">To Date:</label>
              <input type="date" class="form-control" name="to_date" id='to_date' />
              
          </div>

          <div class="form-group">
            <label for="last_name">Job Type:</label>
            <select class="form-control select2" name='job_types' id='job_types'>
              <option value="" selected>--Select--</option>
               @foreach($job_types as $row)
                    <option value="{{$row->id}}">{{$row->job_type}}</option>
               @endforeach 
            </select>
          </div>

          <div class="form-group">    
              <label for="experience_details">Experience Details:</label>
              <textarea class="form-control" name="experience_details" id='experience_details'></textarea> 
          </div>
      
          <button type="submit" class="btn btn-primary">Submit</button>
      </form>
  </div>
</div>
</div>

@endsection





