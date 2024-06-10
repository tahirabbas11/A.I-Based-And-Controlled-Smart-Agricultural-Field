@extends('admin.layouts.app')
@section('title', 'Add Product')
@section('sidebar_content')
    <div class="box no-shadow box-bordered border-light" id="image">

        <h5 class="pro-img-head">Product Image</h5>


        <div class="form-group box-footer">
            <input type="file" class="dropify" name="image"
                {{ $data != null ? 'data-default-file = ' . asset($data->image) : '' }}>
            <span id="imageerror" class="d-none error-span "></span>


        </div>

    </div>
    <div class="box no-shadow box-bordered border-light">

        <h5 class="pro-img-head">Product Gallery</h5>
        <input type="hidden" id="productimages"
            value="{{ $data ? ($data->images ? json_encode($data->images) : '') : '' }}">
        <div class="file-loading">
            <input id="image-file" name="input-ficons-5[]" multiple type="file">
        </div>

    </div>
@endsection
@section('content')
    <div class="container-full">
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">{{ $data == null ? 'Add' : 'Update ' }} Product
                        {{ $data == null ? '' : '#' . $data->id }}</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="#"><i class="mdi mdi-home-outline">Product Management</i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    {{ $data == null ? 'Add' : 'Update ' }} Product</li>
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
                            <h4 class="box-title">{{ $data == null ? 'Upload' : 'Update ' }} Product Details</h4>
                        </div>
                        <div class="box-body">

                            <!-- /.box-header -->
                            <form class="form" method="post"
                                action="{{ $data == null ? route('product.store') : route('product.update', $data->id) }}"
                                enctype="multipart/form-data" id="productform">
                                @csrf
                                {{ $data != null ? method_field('PUT') : method_field('POST') }}
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="font-weight-700 font-size-16">Product Title</label>

                                                <input type="text" id="name" name="name"
                                                    value="{{ $data == null ? old('name') : $data->name }}"
                                                    class="form-control" placeholder="Product Title" required>
                                                <span id="nameerror" class="d-none error-span "></span>
                                            </div>
                                        </div>
                                        @php
                                            $category = App\Models\Category::all();
                                        @endphp
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="font-weight-700 font-size-16">Category</label>
                                                <select class="form-control" id="category" name="category"
                                                    data-placeholder="Choose a Category" tabindex="1">
                                                    @foreach ($category as $item)
                                                        <option
                                                            {{ $data != null ? ($data->category_id == $item->id ? 'selected' : '') : '' }}
                                                            value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach

                                                </select>
                                                <span id="categoryerror" class="d-none error-span "></span>
                                            </div>
                                        </div>

                                        <!--/span-->
                                    </div>
                                    <!--/row-->
                                    <!--/row-->
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="font-weight-700 font-size-16">Price</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="ti-money"></i></div>

                                                    <input type="number" id="price" name="price" step="0.01"
                                                        value="{{ $data == null ? old('price') : $data->price }}"
                                                        class="form-control" placeholder="270.00">
                                                    <span id="priceerror" class="d-none error-span "></span>


                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="font-weight-700 font-size-16">Discount</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="ti-cut"></i></div>
                                                    <input type="number" id="discount" name="discount" step="0.01"
                                                        value="{{ $data == null ? old('discount') : $data->discount }}"
                                                        class="form-control" placeholder="Type '50' for 50%">
                                                    <span id="discounterror" class="d-none error-span "></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="font-weight-700 font-size-16">Stock (in units)</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="ti-cut"></i></div>
                                                    <input type="number" id="stock" name="stock" step="0.01"
                                                        value="{{ $data == null ? old('discount') : $data->stock }}"
                                                        class="form-control" placeholder="10">
                                                    <span id="stockerror" class="d-none error-span "></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>

                                    <!--/row-->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="font-weight-700 font-size-16">Featured Product</label>
                                                <div class="radio-list">
                                                    <label class="radio-inline p-0 mr-10">
                                                        <div class="radio radio-info">
                                                            <input type="radio" name="featured" id="featured_yes"
                                                                value="1"
                                                                {{ $data != null ? ($data->featured == 1 ? 'checked' : '') : '' }}>
                                                            <label for="featured_yes">Yes</label>
                                                        </div>
                                                    </label>
                                                    <label class="radio-inline">
                                                        <div class="radio radio-info">
                                                            <input type="radio" name="featured" id="featured_no"
                                                                value="0"
                                                                {{ $data != null ? ($data->featured == 0 ? 'checked' : '') : '' }}>
                                                            <label for="featured_no">No</label>
                                                        </div>
                                                    </label>

                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="font-weight-700 font-size-16">Status</label>
                                                <div class="radio-list">
                                                    <label class="radio-inline p-0 mr-10">
                                                        <div class="radio radio-info">
                                                            <input type="radio" name="status" id="radio1"
                                                                value="1"
                                                                {{ $data != null ? ($data->status == 1 ? 'checked' : '') : '' }}>
                                                            <label for="radio1">Published</label>

                                                        </div>
                                                    </label>
                                                    <label class="radio-inline">
                                                        <div class="radio radio-info">
                                                            <input type="radio" name="status" id="radio2"
                                                                value="0"
                                                                {{ $data != null ? ($data->status == 0 ? 'checked' : '') : '' }}>
                                                            <label for="radio2">Draft</label>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="font-weight-700 font-size-16">Product
                                                    Short Description</label>
                                                <textarea value={{ $data == null ? old('short_desc') : $data->short_desc }} id="short_desc" name="short_desc"
                                                    class="editor" required>{{ $data == null ? old('short_desc') : $data->short_desc }}</textarea>
                                                <span id="short_descerror" class="d-none error-span"></span>

                                            </div>
                                        </div>
                                    </div>
                                    <!--/row-->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="font-weight-700 font-size-16">Product
                                                    Short Description</label>
                                                <textarea value={{ $data == null ? old('description') : $data->description }} id="description" name="description"
                                                    class="editor" required>{{ $data == null ? old('description') : $data->description }}</textarea>
                                                <span id="descriptionerror" class="d-none error-span"></span>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row no-gutters">
                                        <div class="col-md-12">
                                            <a id="addproatt" class="text-right">Add Product Attrbuites</a>

                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions mt-10">
                                    <button type="button" id="saveSubmit" class="btn btn-primary"> <i
                                            class="fa fa-check"></i> Save /
                                        Add</button>
                                    <button type="button" class="btn btn-danger">Cancel</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection

@push('css')
    <link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/css/fileinput.min.css" media="all"
        rel="stylesheet" type="text/css" />

    <style>
        .file-caption .input-group {
            display: none;
        }

        .dropzone {
            background: white;
            border-radius: 5px;
            border: 2px dashed #fd683e;
            border-image: none;
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
        }

        h5.pro-img-head {
            padding: 10px 10px;
            margin: 0;
        }
    </style>
@endpush

@push('js')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.min.css"
        crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/fileinput.min.js"></script>
    <script>
        var productImages = $('#productimages').val().length > 0 ? JSON.parse($('#productimages').val()) : []
        var urls = [],
            initialPreviewConfig = [],
            initialPreviewAsData = false;
        if (Object.keys(productImages).length > 0) {
            productImages.forEach(function(obj) {
                urls.push(window.location.origin + '/' + obj);
                initialPreviewConfig.push({
                    caption: obj.split('/').slice(-1)[0],
                    downloadUrl: window.location.origin + '/' + obj,
                    url: "{{ route('product.delete_img') }}",
                    key: '{{ $data ? $data->id : '0' }}',
                    extra: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        path: obj
                    }
                })
            });

            initialPreviewAsData = true

        }

        var formData = new FormData();
        $("#image-file").fileinput({
            showUpload: false,
            uploadUrl: "{{ $data == null ? route('product.store') : route('product.update', $data->id) }}",
            theme: 'fa',
            initialPreview: urls,
            initialPreviewAsData: initialPreviewAsData,
            initialPreviewConfig: initialPreviewConfig,
            uploadAsync: false,
            browseOnZoneClick: true,
            initialPreviewShowDelete: true,
            dropZoneEnabled: true,
            overwriteInitial: false,
            maxFileSize: 20000000,
            maxFilesNum: 20,
            uploadExtraData: function() {
                return {
                    created_at: $('.created_at').val()
                };
            }
        }).on('filebatchselected', function(event, files) {

            $.each(files, function(index, value) {
                formData.append('productgalleries[]', value['file'])
            });
        });
    </script>
    <script>
        $(document).ready(function() {

            $('#saveSubmit').click(function(e) {
                removeAllErrors();
                var productForm = new FormData($('#productform').get(0));
                formData.forEach(function(value, key) {
                    productForm.append('gallery[]', value)
                });

                if ($('.dropify')[0].files[0]) {
                    productForm.append('image', $('.dropify')[0].files[0])
                }
                $.ajax({
                    xhr: function() {
                        var xhr = new window.XMLHttpRequest();
                        xhr.upload.addEventListener("progress", function(evt) {
                            loaderShow()
                        }, false);
                        return xhr;
                    },
                    method: 'post',
                    processData: false,
                    contentType: false,
                    cache: false,

                    data: productForm,
                    enctype: 'multipart/form-data',
                    url: $('#productform').attr('action'),
                }).done(function(response) {
                    loaderHide()
                    if ($('input[name="_method"]').val() == 'POST') {
                        $('#image-file').fileinput('clear');
                        $(".dropify").trigger("click");
                    }
                    swal("SUCCESS!", "Product Added Successfully", "success");


                }).fail(function(jqxhr, textStatus, error) {

                    $.each(jqxhr.responseJSON.errors, function(key, value) {
                        $('#' + key).addClass('error-control');
                        $("#" + key + 'error').text(value[0]);
                        $("#" + key + 'error').removeClass('d-none');
                    });
                    loaderHide()
                    swal("ERROR!", "Failed to update product.", "error");
                });



            });

        })
    </script>
    <script type="text/javascript"></script>
@endpush
