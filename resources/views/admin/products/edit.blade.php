@extends('admin.layouts.master')
@section('page')
Edit products
@endsection

@section('content')

<div class="row">
    <div class="col-lg-10 col-md-10">
        @include('admin.layouts.message')
        <div class="card">
            <div class="header">
                <h4 class="title">Edit Product</h4>
            </div>

            <div class="content">
                {!! Form::open(['url' => ['admin/products',$product->id], 'files'=>'true', 'method'=>'put']) !!}
                <div class="row">
                    <div class="col-md-12">
                        @include('admin.products._fields')
                        <div class="form-group">
                            {{ Form::submit('Update product',['class'=>'btn btn-primary']) }}
                        </div>
                        <div class="clearfix"></div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection