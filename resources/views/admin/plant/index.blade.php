@extends('admin.layouts.app')
@section('title', 'Plant Disease History')
@section('content')
<div class="container-full">
	<div class="content-header">
	    <div class="d-flex align-items-center">
	        <div class="mr-auto">
	            <h3 class="page-title">Plant Disease History</h3>
	            <div class="d-inline-block align-items-center">
	                <nav>
	                    <ol class="breadcrumb">
	                       
	                        <li class="breadcrumb-item active" aria-current="page">Plant Disease History</li>
	                    </ol>
	                </nav>
	            </div>
	        </div>
	    </div>
	</div>
	<section class="content">
		<div class="card">
		    <div class="card-header">
	    		<div class="col-md-6 pl-0">
	    			<h4 class="card-title">Plant Disease Historys</h4>
	    		</div>
	    		
		    </div>
		</div>
		<div class="row">
			@foreach($data as $key => $value)
			<div class="col-md-12 col-lg-4">
			    <div class="card">
			        <img class="card-img-top" src="{{ $value->image != null ? asset($value->image) : asset('admin/image/no-image.jpg') }}" >
			        <div class="card-body">
			            <p>This plant {{ $value->disease }} with accuracy of {{ $value->prediction }} </p>
                        <span class="badge badge-sm badge-warning">{{ Carbon\Carbon::parse($value->created_at)->format('d M, Y') }}</span>
                        <span class="badge badge-sm badge-info">{{ Carbon\Carbon::parse($value->created_at)->format('h:i A') }}</span>
			           
			        </div>
			        <div class="card-footer justify-content-between d-flex">
			           
			            <ul class="list-inline mb-0">
			                
			                <li>
			                	<form action="{{ route('plant.delete',['plant'=> $value->id]) }}" method="POST">
			                		@csrf
			                		@method('DELETE')
			                		<button type="submit" class="delete">Delete</button>
			                	</form>
			                </li>
			            </ul>
			        </div>
			    </div>
			</div>
			@endforeach
		</div>
	</section>
</div>
@endsection

@push('css')
<style></style>
@endpush

@push('js')
<script></script>
@endpush