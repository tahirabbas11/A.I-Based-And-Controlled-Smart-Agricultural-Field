@extends('admin.layouts.app')
@section('title', 'Upload Plant Picture')
@section('content')
    <div class="container-full">
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Upload Plant Picture</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                
                                <li class="breadcrumb-item active" aria-current="page">Upload Plant Picture</li>
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
                            <h4 class="box-title">Upload Plant Picture</h4>
                        </div>
                        @if ($errors->any())
                            {{ implode('', $errors->all('<div>:message</div>')) }}
                        @endif
                        <form class="form" method="post" action="{{ route('plant.disease.upload') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="file" name="plant" class="dropify">
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
                <div class="col-lg-12 col-12" id="resultbox" style="display: none">
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title">Result</h4>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="table-responsive-sm">
                                   <div id="resulttd"></div>
                                </div>
                            </div>
                        </div>
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
    <script>
        $('form').submit(function(e) {
            loaderShow()
            e.preventDefault();
            $('#resultbox').slideUp();

            let formData = new FormData(this)
            $.ajax({
                url: "{{ route('plant.disease.upload') }}",
                type: "POST",
                data: formData,
                success: function(response) {
                    console.log(response);
                    if (response.data) {
                        $('#resulttd').text(
                            `This plant${response.data.status}with ${response.data.prediction}`
                            )
                        $('#resultbox').slideDown();    
                        loaderHide()
                    }
                },
                cache: false,
                contentType: false,
                processData: false
            });
        })
    </script>
@endpush
