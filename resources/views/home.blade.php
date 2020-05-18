@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card" style="border-color: #286090;">
                <div class="card-header" style="background-color:#286090; border-color: #2e6da4; color:white">Employee Dashboard</div>

                <div class="card-body" style="font-size: 20px;">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <ul>
                        <li>
                            <a href="{{ route('experience.index') }}" style="color:#286090;">Experience</a> 
                        </li>
                        <li>
                            <a href="{{ route('skills.index') }}" style="color:#286090;">Skills</a> 
                        </li>
                    </ul>
                </div>
                <div class="card-footer text-muted" style="background-color:#286090; border-color: #2e6da4;">
                      <span style="color:white">SocioLadder Test Assignment</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
