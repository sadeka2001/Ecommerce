@extends('Backend.master')

@section('admin_content')


@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<p class="alert-success">
@php

$message=Session::get('message');
                    if($message){

                    echo "$message";
                    Session::put('message',null);

                    }

 @endphp

    </p>

<div class="row-fluid sortable">
<div class="box span12">
    <div class="box-header" data-original-title>
        <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Product</h2>

    </div>

    <div class="box-content">
        <form class="form-horizontal" action="{{url('/products/' .$product->$id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <fieldset>

                <div class="control-group">
                    <label class="control-label" for="date01">Product code</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge" name="product_code" value="{{$product->product_code}}" required>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="date01">Product Name</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge" name="name" value="{{$product->name}}" required>
                    </div>
                </div>


                <div class="control-group">
                    <label class="control-label">Select Category Name</label>
                    <div class="control">
                        <select name="category" style="margin-left: 20px;">
                        <option>select category</option>

                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{implode(json_decode(',',$category->name))}}</option>

                        @endforeach
                    </select>
                    </div>
                </div>


                <div class="control-group">
                    <label class="control-label">Select Sub Category</label>
                    <div class="control">
                        <select name="subcategory" style="margin-left: 20px;">
                        <option>select sub category</option>

                        @foreach ($subcategories as $subcategory)
                            <option value="{{$subcategory->id}}">{{implode(json_decode(',',$subcategory->name))}}</option>

                        @endforeach
                    </select>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Select Brand</label>
                    <div class="control">
                        <select name="brand" style="margin-left: 20px;">
                        <option>select brand</option>

                        @foreach ($brands as $brand)
                            <option value="{{$brand->id}}">{{implode(json_decode(',',$brand->name))}}</option>

                        @endforeach
                    </select>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Select unit id</label>
                    <div class="control">
                        <select name="unit" style="margin-left: 20px;">
                        <option>select unit</option>

                        @foreach ($units as $unit)
                            <option value="{{$unit->id}}">{{implode(json_decode(',',$unit->name))}}</option>

                        @endforeach
                    </select>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Select Size</label>
                    <div class="control">
                        <select name="size" style="margin-left: 20px;">
                        <option>select size</option>

                        @foreach ($sizes as $size)
                            <option value="{{$size->id}}">{{implode(json_decode(',',$size->size))}}</option>

                        @endforeach
                    </select>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Select Color</label>
                    <div class="control">
                        <select name="color" style="margin-left: 20px;">
                        <option>select color</option>

                        @foreach ($colors as $color)
                            <option value="{{$color->id}}">{{implode(json_decode(',',$color->color))}}</option>

                        @endforeach
                    </select>
                    </div>
                </div>

              <div class="control-group hidden-phone">
                    <label class="control-label" for="textarea2">Category Description</label>
                    <div class="controls">
                        <textarea class="cleditor" name="description" rows="3" required>{{$product->description}}</textarea>
                    </div>

                </div>



                <div class="control-group">
                    <label class="control-label" for="date01">Product price</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge" name="price" value="{{$product->price}}" required>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">File Upload</label>
                    <div class="controls">
                        <input type="file" name="file[]" multiple required>
                    </div>
                </div>


                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Edit Product</button>
                </div>
            </fieldset>
        </form>

    </div>
</div><!--/span-->
</div><!--/row-->
</div><!--/row-->


@endsection
