
<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>
        
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

     
        
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <style>
           
            .footer {
              position: fixed;
              bottom: 0;
              width: 100%;
              height:20px;
              background-color:#286090; border-color: #2e6da4;
              color: white;
              text-align: center;

            }
        </style>
    </head>
    <body>
         <nav class="navbar navbar-expand-md shadow-sm" style="background-color:#286090; color: white;">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}" style="color: white;">
                    <!-- {{ config('app.name', 'Laravel') }} -->
                    SocioLadder
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}" style="color: white;" >{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}" style="color: white;" >{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" style="color: white;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('home') }}">
                                        {{ __('Home') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

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

        <footer class="footer">
              <div class="container">
                © Copyright 2020, All Rights Reserved
              </div>
        </footer>

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