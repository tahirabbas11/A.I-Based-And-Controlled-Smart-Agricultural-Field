@extends('admin.layouts.app')
@section('title', 'Customer List')
@section('content')
<div class="container-full">
	<div class="content-header">
	    <div class="d-flex align-items-center">
	        <div class="mr-auto">
	            <h3 class="page-title">Customer List</h3>
	            <div class="d-inline-block align-items-center">
	                <nav>
	                    <ol class="breadcrumb">
	                        <li class="breadcrumb-item">
	                        	<a href="#"><i class="mdi mdi-home-outline">Customer Management</i></a>
	                        </li>
	                        <li class="breadcrumb-item active" aria-current="page">Customer List</li>
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
	    			<h4 class="card-title">Customer Lists</h4>
	    		</div>
	    		<div class="col-md-6">
	    			<form method="get" action="{{ route('customer.index') }}">
		                <div class="input-group">
		                    <input type="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="button-addon2" name="search" value="{{ Request::get('search') }}">
		                    <div class="input-group-append">
		                        <button class="btn" type="submit" id="button-addon3"><i class="ti-search"></i></button>
		                    </div>
		                </div>
		            </form>
	    		</div>	
		    </div>
		</div>
		<div class="row">
			@foreach($data as $key => $value)
			<div class="col-md-12 col-lg-4">
			    <div class="card">
			        <img class="card-img-top" src="{{ $value->image != null ? asset($value->image) : asset('admin/image/no-image.jpg') }}" alt="{{ $value->title }}">
			        <div class="card-body">
			            <h4 class="card-title">{{ $value->name }}</h4>
			            <p class="card-text">{{ \Illuminate\Support\Str::limit(strip_tags($value->email), 90, $end='...') }}</p>
			        </div>
			        <div class="card-footer justify-content-between d-flex">
			            <ul class="list-inline mb-0 mr-2">
			                <span class="badge {{ $value->status == 0 ? 'badge-primary' : 'badge-danger'}} ">{{ $value->status == 0 ? 'Active' : 'Deactive'}}</span>
			            </ul>
			            <ul class="list-inline mb-0">
			                <li><a href="{{ route('customer.edit', $value->id) }}">Edit</a></li>
			                <li>
			                	<form action="{{ route('customer.destroy', $value->id) }}" method="POST">
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