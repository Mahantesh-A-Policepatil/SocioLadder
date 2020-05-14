
<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    </head>
    <body>

        <div class="container">
            <h2 align="center">Add/Remove Multiple Experience Details At Once</h2> 
            <form action="{{ route('addmoreExp') }}" method="POST">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (Session::has('success'))
                    <div class="alert alert-success text-center">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <p>{{ Session::get('success') }}</p>
                    </div>
                @endif

                <table class="table table-bordered" id="dynamicTable">  
                    <tr>
                        <th>Company Name</th>
                        <th>Designation</th>
                        <th>From Date</th>
                        <th>To Date</th>
                        <th>Job Type</th>
                        <th>Experience Details</th>
                        <th>Action</th>
                    </tr>
                    <tr>  
                        <?php 
                            $current_user_id = Auth::user()->id;
                        ?>
                        <td><input type="text" name="addmore[0][company_name]"  class="form-control" /></td>  
                        <td><input type="text" name="addmore[0][designation]"  class="form-control" /></td>  
                        <td><input type="date" name="addmore[0][from_date]"  class="form-control" /></td>  
                        <td><input type="date" name="addmore[0][to_date]"  class="form-control" /></td>  
                        <input type="hidden" name="addmore[0][user_id]"  class="form-control" value="{{ $current_user_id }}" />  
                        <td>
                            <select class="form-control select2" name='addmore[0][job_type_id]' >
                              <option value="" selected>--Select--</option>
                               @foreach($job_types as $row)
                                    <option value="{{$row->id}}">{{$row->job_type}}</option>
                               @endforeach 
                            </select>
                        </td> 
                        <td>
                               <textarea class="form-control" name="addmore[0][experience_details]"></textarea> 
                        </td>  

                        <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  
                    </tr>  

                </table> 
                <button type="submit" class="btn btn-success">Save</button>
            </form>
        </div>

        <script type="text/javascript">

            var i = 0;
            var user_id = <?php echo Auth::user()->id ?>;
            $("#add").click(function(){
                ++i;
                $("#dynamicTable").append(
                    '<tr><td><input type="text" name="addmore['+i+'][company_name]"  class="form-control" /></td><td><input type="text" name="addmore['+i+'][designation]"  class="form-control" /></td><td><input type="date" name="addmore['+i+'][from_date]" class="form-control" /></td><td><input type="date" name="addmore['+i+'][to_date]" class="form-control" /></td> <input type="hidden" name="addmore['+i+'][user_id]"  class="form-control" value="'+user_id+'"/>  <td><select class="form-control select2" name="addmore['+i+'][job_type_id]" ><option value="" selected>--Select--</option><option value="1" >Full Time</option><option value="2" >Part Time</option><option value="3" >Consultant</option></select></td><td><textarea class="form-control" name="addmore['+i+'][experience_details]"></textarea></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>'
                    );

            });

            $(document).on('click', '.remove-tr', function(){  
                 $(this).parents('tr').remove();
            });  

        </script>
    </body>
</html>