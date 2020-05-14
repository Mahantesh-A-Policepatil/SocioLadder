@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-8">Update an Order</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
        <form method="post" action="{{ route('skills.update', $skill->id) }}">
            @method('PATCH') 
            
            @csrf


          <div class="form-group">    
              <label for="skill_name">Skill Name:</label>
              <input type="text" class="form-control" name="skill_name" id='skill_name' value={{$skill->skill_name}} />
          </div>

          <div class="form-group">
            <label for="last_name">Job Type:</label>
            <select class="form-control select2" name='proficiency_id' id='proficiency_id'>
              <option value="">--Select--</option>
               @foreach($proficiency_types as $row)
                    @if($skill->proficiency_id ==  $row->id)
                    <option value="{{$row->id}}" selected>{{$row->proficiency_type}}</option>
                  @else
                    <option value="{{$row->id}}">{{$row->proficiency_type}}</option>
                  @endif
               @endforeach 
            </select>
          </div>

        <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
