@extends('admin.layouts.app')
@section('title', 'Add Customer')
@section('content')
<div class="container-full">
	<div class="content-header">
	    <div class="d-flex align-items-center">
	        <div class="mr-auto">
	            <h3 class="page-title">{{ $data == null ? 'Add' : 'Update ' }} Customer {{ $data == null ? '' :'#'.$data->id }}</h3>
	            <div class="d-inline-block align-items-center">
	                <nav>
	                    <ol class="breadcrumb">
	                        <li class="breadcrumb-item">
	                        	<a href="#"><i class="mdi mdi-home-outline">Customer</i></a>
	                        </li>
	                        <li class="breadcrumb-item active" aria-current="page">{{ $data == null ? 'Add' : 'Update ' }} Customer</li>
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
	                    <h4 class="box-title">{{ $data == null ? 'Upload' : 'Update ' }} Customer Details</h4>
	                </div>
	                @if($errors->any())
					    {{ implode('', $errors->all('<div>:message</div>')) }}
					@endif
	                <!-- /.box-header -->
	                <form class="form" method="post" action="{{ $data == null ? route('customer.store') : route('customer.update', $data->id) }}" enctype="multipart/form-data">
                	@csrf
                	{{ $data != null ? method_field('PUT') : '' }}
	                    <div class="box-body">
	                        <div class="row">
	                            <div class="col-md-12">
	                            	<div class="form-group">
	                            		<label for="">Name</label>	                            		
	                            		<input type="text" name="name" value="{{ $data == null ? old('name') : $data->name }}" class="form-control">
	                            	</div>
	                            	<div class="form-group">
	                            		<label for="">Email</label>	                            		
	                            		<input type="text" name="email" value="{{ $data == null ? old('email') : $data->email }}" class="form-control">
	                            	</div>
	                            	<div class="form-group">
	                            		<label for="">Password</label>	                            		
	                            		<input type="password" name="password" class="form-control">
	                            	</div>
	                            	<div class="form-group">
	                            		<label for="">Password Confirmation</label>
	                            		<input type="password" name="password_confirmation" class="form-control">
	                            	</div>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="box-footer">
	                        <button type="button" class="btn btn-rounded btn-warning btn-outline mr-1">
	                        <i class="ti-trash"></i> Cancel
	                        </button>
	                        <button type="submit" class="btn btn-rounded btn-primary btn-outline">
	                        <i class="ti-save-alt"></i> Save
	                        </button>
	                    </div>
	                </form>
	            </div>
	        </div>
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