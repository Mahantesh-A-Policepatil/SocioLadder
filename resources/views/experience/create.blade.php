@extends('layouts.app')

@section('content')

<div class="container">
     

     <div class="card" style="border-color: #286090;" >
       
      <div class="card-header" style="background-color:#286090; border-color: #2e6da4; color:white">Add Experience</div>
      <div class="card-body">
       <form method="post" action="{{ route('experience.store') }}" >
          @csrf

          <div class="form-group">    
              <label for="company_name">Company Name:</label>
              <input type="text" class="form-control" name="company_name" id='company_name' value="{{ old('company_name') }}" />
              {!! $errors->first('company_name', '<p class="alert alert-danger">:message</p>') !!}
          </div>

          <div class="form-group">    
              <label for="designation">Designation:</label>
              <input type="text" class="form-control" name="designation" id='designation' value="{{ old('designation') }}" />
              {!! $errors->first('designation', '<p class="alert alert-danger">:message</p>') !!}
          </div>

          <div class="form-group">    
              <label for="from_date">From Date:</label> 
              <input type="date" class="form-control" name="from_date" id='from_date' value="{{ old('from_date') }}" />
              {!! $errors->first('from_date', '<p class="alert alert-danger">:message</p>') !!}
          </div>

          <div class="form-group">    
              <label for="to_date">To Date:</label>
              <input type="date" class="form-control" name="to_date" id='to_date' value="{{ old('to_date') }}" />
              {!! $errors->first('to_date', '<p class="alert alert-danger">:message</p>') !!}
          </div>

          <div class="form-group">
            <label for="last_name">Job Type:</label>
            <select class="form-control select2" name='job_types' id='job_types'>
              <option value="" selected>--Select--</option>
               @foreach($job_types as $row)
                  @if(old('job_types') ==  $row->id)
                    <option value="{{$row->id}}" selected>{{$row->job_type}}</option>
                  @else
                    <option value="{{$row->id}}">{{$row->job_type}}</option>
                  @endif
               @endforeach 
            </select>
            {!! $errors->first('job_types', '<p class="alert alert-danger">:message</p>') !!}
          </div>

          <div class="form-group">    
              <label for="experience_details">Experience Details:</label>
              <textarea class="form-control" name="experience_details" id='experience_details'></textarea> 
          </div>
      
          <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
     <div class="card-footer text-muted" style="background-color:#286090; border-color: #2e6da4;">
        <span style="color:white">SocioLadder Test Assignment</span>
     </div>
  </div>
</div>



@endsection





