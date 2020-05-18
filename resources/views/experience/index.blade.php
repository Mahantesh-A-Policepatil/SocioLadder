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

                <div style="float:left;margin-left:5px;">
                  <form action="{{ route('experience.destroy', $row->id)}}" method="post">
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
    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                 Delete Experience
              </div>
              <div class="modal-body">
                 Are you sure you want to delete experience details..??
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-danger btn-ok">Delete</a>
              </div>
          </div>
      </div>
  </div>
  </table>
  {{ $experience->links() }}
</div>
</div>
@endsection
