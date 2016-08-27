<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Pathology Lab Reporting System</title>


</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>
            	Report for {{$report->patient->firstname}} {{$report->patient->firstname}} on
            	{{$report->reportDate}}
           	</h2>
            <hr />
            <div class="table-responsive">
	            <table class="table table-bordered">
	                <thead>
	                	<tr>
		                    <th>Test</th>
		                    <th>Result</th>
		                    <th>Remarks</th>
	                    </tr>
	                </thead>

	                <tbody>
	                    @foreach($report->tests as $test)
	                    <tr>
	                        <td>{{ $test->test}}</td>
	                        <td>{{ $test->result}}</td>
	                        <td>{{ $test->comment}}</td>
	                    </tr>
	                    @endforeach
	                </tbody>
	            </table>
            </div>

            <p><strong>Conclusion:</strong></p>
            <p>{{$report->reportRemarks}}</p>
        </div>
    </div>
</div>
</body>
</html>
