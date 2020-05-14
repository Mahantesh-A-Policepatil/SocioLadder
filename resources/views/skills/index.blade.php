@extends('layouts.app')

@section('content')

  
<div class="container">

  <div class="col-sm-12">
    @if(session()->get('success'))
      <div class="alert alert-success">
        {{ session()->get('success') }}  
      </div>
    @endif
  </div>
  
<div class="col-sm-12">
    <h1 class="display-8" style="margin-top:20px;">Skills</h1>    
  <div alin="left">  
      <a href="{{ route('skills.create')}}" class="btn btn-success">Add</a> 
      <a href="{{ route('skills.addmoreSkills')}}" class="btn btn-success">Add More</a>
      <a href="{{ route('skills_pdfview',['download'=>'pdf']) }}" class="btn btn-success">Download PDF</a>
  </div>
  <table class="table table-striped" style="margin-top:40px;">
    <thead>
        <tr>
          <td>Skill Name</td>
          <td>Proficiency</td>
          <td>Employee Name</td>
          <td>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($skills as $row)
        <tr>
            <td>{{$row->skill_name}}</td>
            <td>{{$row->proficiency->proficiency_type}}</td>
            <td>{{$row->user->name}}</td>
            <td>
              <div>
                <div style="float:left;">
                  <a href="{{ route('skills.edit',$row->id)}}" class="btn btn-primary">Edit</a>
                </div>

                <div style="float:left;margin-left:5px;">
                  <form action="{{ route('skills.destroy', $row->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                  </form>
                </div>
              </div>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  {{ $skills->links() }}
</div>
</div>
@endsection