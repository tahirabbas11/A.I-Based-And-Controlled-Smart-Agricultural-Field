@extends('admin.layouts.app')
@section('title', 'Product List')
@section('content')
    <div class="container-full">
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Product List</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="#"><i class="mdi mdi-home-outline">Product Management</i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Product List</li>
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
                        <h4 class="card-title">Product Lists</h4>
                    </div>
                    <div class="col-md-6">
                        <form method="get" action="{{ route('product.index') }}">
                            <div class="input-group">
                                <input type="search" id="search" class="form-control" placeholder="Search"
                                    aria-label="Search" aria-describedby="button-addon2" name="search"
                                    value="{{ Request::get('search') }}">
                                <div class="input-group-append">
                                    <button class="btn" type="submit" id="button-addon3"><i
                                            class="ti-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row fx-element-overlay" id="section-content">
                @foreach ($data as $key => $product)
                    <div class="col-12 col-lg-6 col-xl-4">
                        <div class="box box-default">
                            <div class="fx-card-item">
                                <div class="fx-card-avatar fx-overlay-1"> <img src="{{ asset($product->image) }}"
                                        alt="user">
                                    <div class="fx-overlay scrl-up">
                                        <ul class="fx-info">
                                            <li><a class="btn btn-outline image-popup-vertical-fit"
                                                    href="{{ asset($product->image) }}"><i class="ti-search"></i></a>
                                            </li>
                                            <li class="delete">
                                                <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline"><i
                                                            class="ti-trash"></i></button>
                                                </form>
                                            </li>
                                            <li><a class="btn btn-outline"
                                                    href="{{ route('product.edit', $product->id) }}"><i
                                                        class="ti-settings"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="fx-card-content text-left mb-0">
                                    <div class="product-text">
                                        <h4 class="box-title mb-0">{{ $product->name }}</h4>
                                        <h2 class="pro-price text-blue">${{ $product->price }}</h2>

                                    </div>
                                    <p class="text-muted db productdesc">{{ Str::limit($product->short_desc, 490) }}</p>
                                </div>
                            </div>
                        </div>
                        <!-- /.box -->
                    </div>
                @endforeach

            </div>

            <div id="pagination">
                {{-- {{ $data->links("pagination::custom-pagination") }} --}}
                <div id="pagination">
        </section>
    </div>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('admin/css/magnific-popup.css') }}">
    <style>
        p.text-muted.db.productdesc {
            font-size: 11px;
            margin-top: 19px;
            padding: 15px;
            text-align: justify;
            padding-top: 0;
            margin: 0;
        }

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
    <script src="{{ asset('admin/js/product-search.js') }}"></script>
    <script src="{{ asset('admin/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('admin/js/jquery.magnific-popup-init.js') }}"></script>
@endpush
