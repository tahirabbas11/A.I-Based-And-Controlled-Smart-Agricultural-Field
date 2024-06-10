@extends('admin.layouts.app')
@section('title', 'Config Option')
@section('content')
<div class="container-full">
	<div class="content-header">
	    <div class="d-flex align-items-center">
	        <div class="mr-auto">
	            <h3 class="page-title">Config Option</h3>
	            <div class="d-inline-block align-items-center">
	                <nav>
	                    <ol class="breadcrumb">
	                        <li class="breadcrumb-item">
	                        	<a href="#"><i class="mdi mdi-home-outline">Website Setting</i></a>
	                        </li>
	                        <li class="breadcrumb-item active" aria-current="page">Config Option</li>
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
	                    <h4 class="box-title">Add Config Option</h4>
	                </div>
	                <form action="{{ route('admin.config.option.update') }}" method="post">
	                	@csrf
	                	<input type="hidden" value="0" name="action">
	                	<div class="box-body">
	                		<div class="row">
	                			<div class="col-md-4">
	                				<div class="form-group">
		                				<label for="">flag_type</label>
		                				<input type="text" name="flag_type" class="form-control">
		                			</div>
	                			</div>
	                			<div class="col-md-4">
	                				<div class="form-group">
		                				<label for="">flag_value</label>
		                				<input type="text" name="flag_value" class="form-control">
		                			</div>
	                			</div>
	                			<div class="col-md-4">
	                				<div class="form-group">
		                				<label for="">has_image</label>
		                				<select name="has_image" id="" class="form-control">
		                					<option value="1">Image</option>
		                					<option value="0">Text</option>
		                					<option value="2">Textarea</option>
		                				</select>
		                			</div>
	                			</div>
	                			<div class="col-md-4">
	                				<div class="form-group">
		                				<label for="">is_config</label>
		                				<select name="is_config" id="" class="form-control">
		                					<option value="1">YES</option>
		                					<option value="0">NO</option>
		                				</select>
		                			</div>
	                			</div>
	                			<div class="col-md-2">
	                				<div class="form-group">
		                				<label for="">Action</label>
		                				<button class="btn btn-primary btn-sm btn-block" type="submit">ADD</button>
		                			</div>
		                		</div>
	                		</div>
	                	</div>
	                </form>
				</div>
			</div>
		</div>
	    <div class="row">
	        <div class="col-lg-12 col-12">
	            <div class="box">
	                <div class="box-header with-border">
	                    <h4 class="box-title">Upload Config Option</h4>
	                </div>
	                <!-- /.box-header -->
	                @foreach($data as $key => $value)
	                <form action="{{ route('admin.config.option.update') }}" method="post">
	                	@csrf
	                	<input type="hidden" value="1" name="action">
	                	<input type="hidden" value="{{ $value->id }}" name="config_id">
	                	<div class="box-body">
	                		<div class="row">
	                			<div class="col-md-4">
	                				<div class="form-group">
		                				<label for="">flag_type</label>
		                				<input type="text" name="flag_type" class="form-control" value="{{ $value->flag_type }}">
		                			</div>
	                			</div>
	                			<div class="col-md-4">
	                				<div class="form-group">
		                				<label for="">flag_value</label>
		                				<input type="text" name="flag_value" class="form-control" value="{{ $value->flag_value }}">
		                			</div>
	                			</div>
	                			<div class="col-md-4">
	                				<div class="form-group">
		                				<label for="">has_image</label>
		                				<select name="has_image" id="" class="form-control">
		                					<option value="1" {{ $value->has_image == 1 ? 'selected' : '' }}>Image</option>
		                					<option value="0" {{ $value->has_image == 0 ? 'selected' : '' }}>Text</option>
		                					<option value="2" {{ $value->has_image == 2 ? 'selected' : '' }}>Textarea</option>
		                				</select>
		                			</div>
	                			</div>
	                			<div class="col-md-4">
	                				<div class="form-group">
		                				<label for="">is_config</label>
		                				<select name="is_config" id="" class="form-control">
		                					<option value="1" {{ $value->is_config == 1 ? 'selected' : '' }}>YES</option>
		                					<option value="0" {{ $value->is_config == 0 ? 'selected' : '' }}>NO</option>
		                				</select>
		                			</div>
	                			</div>
	                			<div class="col-md-2">
	                				<div class="form-group">
		                				<label for="">Action</label>
		                				<button class="btn btn-primary btn-sm btn-block" type="submit">UPDATE</button>
		                			</div>
		                		</div>
	                		</div>
	                	</div>
	                </form>
	                <hr class="form-hrm">
	                @endforeach
	            </div>
	            <!-- /.box -->			
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