@extends('admin.layouts.app')
@section('title', 'Attribute List')
@section('content')
    <div class="container-full">
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Attribute List</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="#"><i class="mdi mdi-home-outline">Attribute Management</i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Attribute List</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">

            <div class="col-12">
                <div class="box">
                    <div class="box-header">
                        <h4 class="box-title">Attribute List</h4>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="complex_header" class="table table-striped table-bordered display"
                                style="width:100%">
                                <thead>

                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key => $item)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->slug }}</td>
                                            <td>
                                                <a class="waves-effect waves-light btn btn-sm btn-info"
                                                    href="{{ route('attribute.edit',$item->id) }}">Edit</a>
                                                <form method="POST" action="{{ route('attribute.destroy',$item->id) }}"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button
                                                        class="waves-effect waves-light btn btn-sm btn-primary">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.content -->
            <div id="pagination">
                {{ $data->links() }}
                <div id="pagination">
        </section>
    </div>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('admin/css/datatables.min.css') }}">
    <style>
        .error {
            margin: 0 auto;
        }

        ul.pagination {
            position: relative;
        }

        li.page-item {
            display: inline;
            text-align: center;
        }

        ul.pagination {
            /* background: #666; */
            /* display: inline-block; */
        }

        ul.pagination li {
            background: #fff;
            /* display: flex; */
            color: black !important;
        }

        ul.pagination span {
            background: transparent !important;
            color: #737373 !important;
        }

        ul.pagination {
            display: flex;
            justify-content: center;
        }

        li.page-item.active {
            background: #fd683e;
            border-color: coral !important;
        }

        .page-item.active .page-link {
            border-color: #fd683e;
            color: white !important;
        }
    </style>
@endpush

@push('js')
    <script src="{{ asset('admin/js/data-table.js') }}"></script>
    <script src="{{ asset('admin/js/datatables.min.js') }}"></script>
@endpush
