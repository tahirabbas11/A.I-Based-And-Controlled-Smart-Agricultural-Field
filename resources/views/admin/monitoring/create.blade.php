@extends('admin.layouts.app')
@section('title', 'Monitoring')
@section('content')
<div class="container-full">
	<div class="content-header">
	    <div class="d-flex align-items-center">
	        <div class="mr-auto">
	            <h3 class="page-title">Monitor</h3>
	            <div class="d-inline-block align-items-center">
	                <nav>
	                    <ol class="breadcrumb">
	                        <li class="breadcrumb-item">
	                        	<a href="#"><i class="mdi mdi-home-outline">Monitor</i></a>
	                        </li>
	                        <li class="breadcrumb-item active" aria-current="page">Monitor</li>
	                    </ol>
	                </nav>
	            </div>
	        </div>
	    </div>
	</div>
	<section class="content">
	    <div class="row">
	        <div class="col-lg-12 col-12">
	            <div class="box">
	                <div class="box-header with-border">
	                    <h4 class="box-title">Monitor</h4>
	                </div>
                    <div class="table-responsive-sm">
					  <table class="table mb-0">
						
						<tbody>
						  <tr class="firstrow">
							<td>Temperature:<span id="temp"></span></td>
							<td>Moisture:<span id="moisture"></span></td>
							<td>Smoke:<span id="smoke"></span></td>  
						  </tr>
                          <tr class="secndrow">
                            <td>Humidity:<span id="humdity"></span></td>
                            <td>Light:<span id="light"></span></td>
                          </tr>
                          <tr class="secndrow">
                            <td>Fan:<button type="button" id="fan" class="btn btn-sm btn-toggle btn-primary" data-toggle="button" aria-pressed="true" autocomplete="off">
							<div class="handle"></div>
                            <td>Pump:<button type="button" id="pump" class="btn btn-sm btn-toggle btn-primary" data-toggle="button" aria-pressed="true" autocomplete="off">
							<div class="handle"></div>
                            <td>Spray:<button type="button" id="spray" class="btn btn-sm btn-toggle btn-primary" data-toggle="button" aria-pressed="true" autocomplete="off">
							<div class="handle"></div>
						  </button></td>
                          </tr>
                          <tr>
                            <td>
                                Temp. Range <input type="number" step="0.1" class="form-control" id="tempon" >
                            </td>
                            <td>
                                Pump <input type="number" step="0.1" class="form-control" id="pumpon" >
                            </td>
                            <td>
                                Spray <input type="number" step="0.1" class="form-control" id="sprayon" >
                            </td>

                          </tr>
						
						</tbody>
					  </table>
					</div>
	                
	              
	            </div>
	        </div>
	    </div>
	</section>
</div>

@endsection

@push('css')
<style>
    tr.secndrow td {
        width: 33.33%;
}

tr.firstrow td {
    width: 25%;
   
}
</style>
@endpush

@push('js')
<script>
      $(document).ready(function() {
            function getData() {
                $.ajax({
                    url: "{{ route('recievedata') }}",
                    type: "GET",
                    success: function(response) {
                        // Update your HTML with the received data
                        console.log(response);
                        $("#humdity").text(response.humidity);
                        $("#temp").text(response.temperature);
                        $("#smoke").text(response.smoke);
                        $("#moisture").text(response.moisture);
                        $("#light").text(response.light);
                    },
                    error: function(error) {
                        console.log("Error:", error);
                    }
                });
            }

            // Call the getData function every second
            setInterval(getData, 1000);
        });
</script>
@endpush