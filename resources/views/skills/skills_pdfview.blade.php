<style type="text/css">
	table td, table th{
		border:1px solid black;
	}
</style>

<div class="container">
	<br/>
	<table>
		<tr>
		 <td>Skill Name</td>
         <td>Proficiency</td>
         <td>Employee Name</td>
		</tr>

		@foreach ($skills as $row)
			<tr>
				<td>{{$row->skill_name}}</td>
	            <td>{{$row->proficiency->proficiency_type}}</td>
	            <td>{{$row->user->name}}</td>
			</tr>
		@endforeach
	</table>
</div>