@extends('layouts.app')

@section('content')
<div class="row">
    

        <!-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif -->
        <div class="container">
         <div class="card" style="border-color: #286090;" >
          <div class="card-header" style="background-color:#286090; border-color: #2e6da4; color:white">Update Experience</div>
          <div class="card-body">
        <form method="post" action="{{ route('experience.update', $experience->id) }}">
            @method('PATCH') 
            
            @csrf

             <div class="form-group">    
              <label for="company_name">Company Name:</label>
              <input type="text" class="form-control" name="company_name" id='company_name' value="{{$experience->company_name}}" />
              {!! $errors->first('company_name', '<p class="alert alert-danger">:message</p>') !!}
          </div>

          <div class="form-group">    
              <label for="designation">Designation:</label>
              <input type="text" class="form-control" name="designation" id='designation' value="{{$experience->designation}}" />
              {!! $errors->first('designation', '<p class="alert alert-danger">:message</p>') !!}
          </div>

          <div class="form-group">    
              <label for="from_date">From Date:</label> 
              <input type="date" class="form-control" name="from_date" id='from_date' value={{$experience->from_date}} />
              {!! $errors->first('from_date', '<p class="alert alert-danger">:message</p>') !!}
          </div>

          <div class="form-group">    
              <label for="to_date">To Date:</label>
              <input type="date" class="form-control" name="to_date" id='to_date' value={{$experience->to_date}} />
              {!! $errors->first('to_date', '<p class="alert alert-danger">:message</p>') !!}
          </div>

          <div class="form-group">
            <label for="last_name">Job Type:</label>
            <select class="form-control select2" name='job_types' id='job_types'>
              <option value="">--Select--</option>
               @foreach($job_types as $row)
                  @if($experience->job_type_id ==  $row->id)
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
              <textarea class="form-control" name="experience_details" id='experience_details'>{{$experience->experience_details}}</textarea> 
          </div>
           
         

        <button type="submit" class="btn btn-primary">Update</button>
        </form>
      </div>
      <div class="card-footer text-muted" style="background-color:#286090; border-color: #2e6da4;">
        <span style="color:white">SocioLadder Test Assignment</span>
      </div>
    </div>
</div>
</div>

@endsection
