@extends('admin.layouts.app')
@section('title', 'Config Settings')
@section('content')
<div class="container-full">
	<div class="content-header">
	    <div class="d-flex align-items-center">
	        <div class="mr-auto">
	            <h3 class="page-title">Config</h3>
	            <div class="d-inline-block align-items-center">
	                <nav>
	                    <ol class="breadcrumb">
	                        <li class="breadcrumb-item">
	                        	<a href="#"><i class="mdi mdi-home-outline">Website Setting</i></a>
	                        </li>
	                        <li class="breadcrumb-item active" aria-current="page">Config</li>
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
	                    <h4 class="box-title">Upload Config Details</h4>
	                </div>
	                <!-- /.box-header -->
	                <form class="form" method="post" action="{{ route('admin.config.post') }}" enctype="multipart/form-data">
	                	@csrf
	                    <div class="box-body">
	                        <div class="row">
	                            <div class="col-md-12">
	                            	@foreach($data as $key => $value)
	                                <div class="form-group">
	                                    <label>{{ ucwords(str_replace("_", ' ', $value->flag_type)) }}</label>
	                                    @if($value->has_image == 0)
	                                    <input type="text" class="form-control" name="{{ $value->flag_type }}" value="{{ $value->flag_value }}">
	                                    @elseif($value->has_image == 1)
	                                    <input type="file" class="dropify" name="{{ $value->flag_type }}" value="{{ $value->flag_value }}" data-default-file = "{{ asset($value->flag_value) }}">

	                                    @elseif($value->has_image == 2)
	                                    <textarea class="editor" id="editor-{{ $value->id }}" name="{{ $value->flag_type }}" rows="10" cols="80">{!! $value->flag_value !!}</textarea>
	                                    @endif
	                                </div>
	                                @endforeach
	                            </div>
	                        </div>
	                    </div>
	                    <!-- /.box-body -->
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