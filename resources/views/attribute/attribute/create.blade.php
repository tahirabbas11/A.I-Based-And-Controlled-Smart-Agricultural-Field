@extends('admin.layouts.app')
@section('title', 'Add Attribute ')
@section('content')
    <div class="container-full">
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">{{ $data == null ? 'Add' : 'Update ' }} Attribute
                        {{ $data == null ? '' : '#' . $data->id }}</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="#"><i class="mdi mdi-home-outline">Attribute Management</i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    {{ $data == null ? 'Add' : 'Update ' }} Attribute</li>
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
                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <div class="box-header with-border">
                            <h4 class="box-title">{{ $data == null ? 'Upload' : 'Update ' }} Attribute Details</h4>
                        </div>
                        <!-- /.box-header -->
                        <form class="form" method="post"
                            action="{{ $data == null ? route('attribute.store') : route('attribute.update', $data->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            {{ $data != null ? method_field('PUT') : '' }}
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group{{ $errors->has('name') ? 'has-error' : '' }}">
                                            <label for="name" class="control-label">{{ 'Name' }}</label>
                                            <input class="form-control" name="name" type="text" id="name"
                                                value="{{ $data == null ? old('name') : $data->name }}">

                                            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                                        </div>
                                        <div class="form-group">
                                            <label for="">Status</label>
                                            <select name="status" id="" class="form-control">
                                                <option value="0"
                                                    {{ $data != null && $data->status == 0 ? 'selected' : '' }}>Active
                                                </option>
                                                <option value="1"
                                                    {{ $data != null && $data->status == 1 ? 'selected' : '' }}>
                                                    Deactive</option>
                                            </select>
                                        </div>
                                        <div class="form-group border-primary">
                                            <h4 class="text-center mb-3">Add New Variations</h4>
                                            <hr style="width: 75%">
                                            <div id="repeater">
                                                <!-- Repeater Items -->
                                                <div class="items" data-group="attrbiute">
                                                    <div class="item-content">
                                                        @if ($data)
                                                            @foreach ($data->attrValues as $item)
                                                                <div class="form-group">
                                                                    <label for="">Attrbuite Value</label>
                                                                    <div class="class-attr d-flex">
                                                                        <input disabled type="text"   name="value[]"
                                                                            class="form-control"
                                                                            value="{{ $item->name }}">
                                                                        <button type="button"
                                                                            onclick="deleteAttribute(this,{{ $item->id }})"
                                                                            class="waves-effect waves-light btn btn-sm btn-rounded btn-primary-light mb-5">
                                                                            <i class="ti-trash"></i>
                                                                            Delete</button>
                                                                    </div>

                                                                </div>
                                                            @endforeach
                                                        @endif

                                                        <div class="form-group">
                                                            <label for="">Attrbuite Value</label>
                                                            <div class="class-attr d-flex">
                                                                <input type="text" name="value[]" class="form-control">
                                                                <button type="button"
                                                                    onclick="$(this).parent().parent().remove()"
                                                                    class="waves-effect waves-light btn btn-sm btn-rounded btn-primary-light mb-5">
                                                                    <i class="ti-trash"></i>
                                                                    Delete</button>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="repeater-heading">
                                                        <button type="button"
                                                            class="waves-effect waves-light btn btn-danger-light btn-sm btn-rounded repeater-add-btn">
                                                            <i class="ti-plus"></i>
                                                            Add
                                                        </button>
                                                    </div>
                                                </div>

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
    <style>
        .form-group.border-primary::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.9);
            border-radius: 10px;
            background-color: #CCCCCC;
        }

        .form-group.border-primary::-webkit-scrollbar {
            width: 12px;
            background-color: #F5F5F5;
        }

        .form-group.border-primary::-webkit-scrollbar-thumb {
            border-radius: 10px;
            background: rgb(255, 255, 255);
            background: linear-gradient(351deg, rgba(255, 255, 255, 1) 0%, rgba(253, 104, 62, 1) 23%, rgba(253, 225, 62, 1) 100%)
        }

        .form-group.border-primary {
            height: 350px;
            overflow-y: scroll;
        }

        div.border-primary {
            border: 1px solid #fd683e;
            border-radius: 13px;
            padding: 12px;
        }


        div#repeater {
            margin: 0 auto;
            width: 50%;
            display: flex;
            flex-direction: column-reverse;
        }

        .class-attr input {
            width: 200px;
            margin-right: 5px;
        }

        .toggle.switch {
            float: right;
            border-radius: 23px;
        }

        span.toggle-handle.btn.btn-light.btn-sm {
            border-radius: 50%;
        }

        .toggle.btn.btn-sm.switch.btn-primary span {
            margin-right: 15px;
        }

        .toggle.btn.btn-sm.switch.btn-light.off span {
            margin-left: 15px;
        }
    </style>
@endpush

@push('js')
    <script>
        $('input[type="checkbox"]').change(function() {
            ($(this).prop("checked")) ? $(this).val(1): $(this).val(0);
        })
    </script>

    <script>
        deleteAttribute = (element, id) => {
            alert("her")
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                _token: "{{ csrf_token() }}",
                url: "{{ route('attribute.deleteAttrValue') }}",
                type: "post",
                data: {
                    id: id
                },
                dataType: "json",
                success: function(response) {
                    if (response.status) {
                        $(element).parent().parent().remove();
                        toastrShow('Deleted!', response.message, 'success');
                    }
                }
            })

        }
        $(document).ready(function() {
            var entryClone = $('.item-content .form-group:last');
            $('.repeater-heading button').click(function(e) {
                e.preventDefault()
                entryClone.clone().appendTo('.item-content');
            })
        });
    </script>
@endpush
