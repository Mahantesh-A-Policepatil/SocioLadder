<style type="text/css">
	table td, table th{
		border:1px solid black;
	}
</style>

<div class="container">
	<br/>
	<table>
		<tr>
		  <td>Employee Name</td>
          <td>Company Name</td>
          <td>Designation</td>
          <td>From Date</td>
          <td>To Date</td>
          <td>Job Type</td>
		</tr>

		@foreach ($experience as $row)
			<tr>
				<td>{{ucfirst($row->user['name'])}}</td>
	            <td>{{$row->company_name}}</td>
	            <td>{{$row->designation}}</td>
	            <td>{{\Carbon\Carbon::parse($row->from_date)->format("M-Y")}}</td>
	            <td>{{\Carbon\Carbon::parse($row->to_date)->format("M-Y")}}</td>
	            <td>{{$row->job_types->job_type}}</td>
			</tr>
		@endforeach
	</table>
</div>