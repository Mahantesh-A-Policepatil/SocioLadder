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
    <h1 class="display-8" style="margin-top:20px;">Experience</h1>    
  <div alin="left">  
      <a href="{{ route('experience.create')}}" class="btn btn-success">Add</a> 
      <a href="{{ route('experience.addmore')}}" class="btn btn-success">Add More</a> 
      <a href="{{ route('exp_pdfview',['download'=>'pdf']) }}" class="btn btn-success">Download PDF</a>
  </div>
  <table class="table table-striped" style="margin-top:40px;">
    <thead>
        <tr>
          <!-- <td>ID</td> -->
          <td>Employee Name</td>
          <td>Company Name</td>
          <td>Designation</td>
          <td>From Date</td>
          <td>To Date</td>
          <td>Job Type</td>
          <td>Actions</td>
        </tr>
    </thead>
    

    <tbody>
        @foreach($experience as $row)
        <tr>
         
            <!-- <td>{{$loop->index+1}}</td> -->
            <!-- <td>{{$row->id}}</td> -->
            <td>{{ucfirst($row->user['name'])}}</td>
            <td>{{$row->company_name}}</td>
            <td>{{$row->designation}}</td>
            <td>{{\Carbon\Carbon::parse($row->from_date)->format("M-Y")}}</td>
            <td>{{\Carbon\Carbon::parse($row->to_date)->format("M-Y")}}</td>
            <td>{{$row->job_types->job_type}}</td>
            <td>
              <div>
                <div style="float:left;">
                  <a href="{{ route('experience.edit',$row->id)}}" class="btn btn-primary">Edit</a>
                </div>

              <!--   <div style="float:left;margin-left:5px;">
                  <form action="{{ route('experience.destroy', $row->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit" data-toggle="modal" data-target="confirm-delete">Delete</button>
                  </form>
                </div> -->

                <div style="float:left; margin-left:5px;">
                  <button type="button" class="btn btn-danger" data-id="{{$row->id}}" data-toggle="modal" data-target="#myModal">Delete</button>
                </div>

              </div>
            </td>
        </tr>
        @endforeach
    </tbody>
   
  </table>
  <div class="modal modal-danger fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title text-center">Delete</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <form action="{{ route('experience.destroy', $row->id)}}" method="post">
          @csrf
          @method('DELETE')
          <div class="modal-body">
            <p class="text-center">Are you sure you want to delete this experience..??</p>
            <input type="hidden" name="id" value="" />
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal" id="dont-delete">No, Cancel</button>
            <button type="submit" class="btn btn-danger" id="yes-delete">Yes, Delete</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  
  {{ $experience->links() }}
</div>
</div>
@endsection
@section('scripts')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 
@stop
