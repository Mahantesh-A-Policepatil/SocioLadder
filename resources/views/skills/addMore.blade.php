
<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    </head>
    <body>

        <div class="container">
            <h2 align="center">Add/Remove Multiple Skills At Once</h2> 
            <form action="{{ route('addMoreSkillsDetails') }}" method="POST">
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
                        <th>Skill Name</th>
                        <th>Proficiency</th>
                        <th>Action</th>
                    </tr>
                    <tr>  
                        <?php 
                            $current_user_id = Auth::user()->id;
                        ?>
                        <td><input type="text" name="addmore[0][skill_name]"  class="form-control" /></td>  
                        <input type="hidden" name="addmore[0][user_id]"  class="form-control" value="{{ $current_user_id }}" />  
                        <td>
                            <select class="form-control select2" name='addmore[0][proficiency_id]' >
                              <option value="" selected>--Select--</option>
                               @foreach($proficiency_types as $row)
                                    <option value="{{$row->id}}">{{$row->proficiency_type}}</option>
                               @endforeach 
                            </select>
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
                    '<tr><td><input type="text" name="addmore['+i+'][skill_name]"  class="form-control" /></td> <input type="hidden" name="addmore['+i+'][user_id]"  class="form-control" value="'+user_id+'"/>  <td><select class="form-control select2" name="addmore['+i+'][proficiency_id]" ><option value="" selected>--Select--</option><option value="1" >Beginner</option><option value="2" >Intermediate</option><option value="3" >Advanced</option><option value="4" >Expert</option></select></td></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>'
                    );

            });

            $(document).on('click', '.remove-tr', function(){  
                 $(this).parents('tr').remove();
            });  

        </script>
    </body>
</html>