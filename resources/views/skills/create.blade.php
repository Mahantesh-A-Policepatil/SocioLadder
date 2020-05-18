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
      </div><br />
    @endif -->
     <div class="container">
     <div class="card"style="border-color: #286090;" >
      <div class="card-header" style="background-color:#286090; border-color: #2e6da4; color:white">Add Skill</div>
      <div class="card-body">
       <form method="post" action="{{ route('skills.store') }}" >
          @csrf

          <div class="form-group">    
              <label for="skill_name">Skill Name:</label>
              <input type="text" class="form-control" name="skill_name" id='skill_name' />
              {!! $errors->first('skill_name', '<p class="alert alert-danger">:message</p>') !!}
          </div>
         
          <div class="form-group">
            <label for="proficiency_id">Proficiency:</label>
            <select class="form-control select2" name='proficiency_id' id='proficiency_id'>
              <option value="" selected>--Select--</option>
               @foreach($proficiency_types as $row)
                  @if(old('proficiency_id') ==  $row->id)
                    <option value="{{$row->id}}" selected>{{$row->proficiency_type}}</option>
                  @else
                    <option value="{{$row->id}}">{{$row->proficiency_type}}</option>
                  @endif
               @endforeach 
            </select>
            {!! $errors->first('proficiency_id', '<p class="alert alert-danger">:message</p>') !!}
          </div>
          
          <button type="submit" class="btn btn-primary">Submit</button>
      </form>
  </div>
   </div>
    <div class="card-footer text-muted" style="background-color:#286090; border-color: #2e6da4;">
        <span style="color:white">SocioLadder Test Assignment</span>
    </div>
  </div>
</div>

@endsection





