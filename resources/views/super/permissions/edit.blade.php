@extends('admin.layouts.app')

@section('content')
@section('title', 'Permission')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit Permission</div>
                    <div class="card-body">
                        <a href="{{ url('/permissions') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($permission, [
                            'method' => 'PATCH',
                            'url' => ['permissions', $permission->id],
                            'class' => 'form-horizontal'
                        ]) !!}

                        @include('super.permissions.form', ['formMode' => 'edit'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection