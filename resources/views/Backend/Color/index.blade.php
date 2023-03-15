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


    <div class="row-fluid sortable">
        <div class="box span12">
            <p class="alert-success">
                @php

                    $message = Session::get('message');
                    if ($message) {
                        echo "$message";
                        Session::put('message', null);
                    }

                @endphp

            </p>

            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>

            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                    <thead>
                        <tr>
                            <th style="width:15%">ID</th>
                            <th style="width:45%">Color Name</th>

                            <th style="width:20%">Status</th>
                            <th style="width:20%">Actions</th>
                        </tr>
                    </thead>

                    @foreach ($colors as $color)
                        <tbody>
                            <tr>
                                <td>{{ $color->id }}</td>
                                <td>
                                    @foreach(json_decode($color->color) as $colors)

                                        <ul class="span3">{{$colors}}</ul>

                                    @endforeach
                                </td>


                                <td class="center">
                                    @if ($color->status == 1)
                                        <span class="label label-success">Active</span>
                                    @else
                                        <span class="label label-danger">Deactive</span>
                                    @endif
                                </td>


                                <td class="row">
                                    <div class="span3"></div>

                                    <div class="span2">

                                        @if ($color->status == 1)
                                            <a href="{{ url('/color_status' . $color->id) }}" class="btn btn-success">
                                                <i class="halflings-icon white thumbs-down"></i>
                                            </a>
                                    </div>
                                @else
                                    <a href="{{ url('/color_status' . $color->id) }}" class="btn btn-danger">
                                        <i class="halflings-icon white thumbs-up"></i>
                                    </a>
            </div>
            @endif


            <div class="span2">
                <a href="{{ url('/color/' . $color->id . '/edit') }}" class="btn btn-info">

                    <i class="halflings-icon white edit"></i>
                </a>

            </div>

            <div class="span2">
                <form action="{{ route('color.destroy', $color->id) }}" method="post">

                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit"> <i class="halflings-icon white trash"></i></button>
                </form>
            </div>

            <div class="span3">
            </div>

            </td>
            </tr>



            </tbody>
            @endforeach
            </table>

            <div class="pagination pagination-left">
                <ul>
                    <li><a href="#">Prev</a></li>
                    <li class="active">
                        <a href="#">1</a>
                    </li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">Next</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!--/span-->
    </div>
    <!--/row-->
@endsection
