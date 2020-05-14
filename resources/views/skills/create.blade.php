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
       <form method="post" action="{{ route('skills.store') }}" >
          @csrf

          <div class="form-group">    
              <label for="skill_name">Skill Name:</label>
              <input type="text" class="form-control" name="skill_name" id='skill_name' />
          </div>
         
          <div class="form-group">
            <label for="proficiency_id">Proficiency:</label>
            <select class="form-control select2" name='proficiency_id' id='proficiency_id'>
              <option value="" selected>--Select--</option>
               @foreach($proficiency_types as $row)
                    <option value="{{$row->id}}">{{$row->proficiency_type}}</option>
               @endforeach 
            </select>
          </div>
          
          <button type="submit" class="btn btn-primary">Submit</button>
      </form>
  </div>
</div>
</div>

@endsection





