@extends('admin.layouts.app')

@section('content')
    <style>
*{
    margin: 0;
    padding: 0;
}
    </style>
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Driver</h4>
                            <a href="{{route('driver.create')}}" class="btn btn-primary btn-rounded btn-fw mb-2">Add New</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Eamil
                                    </th>
                                    <th>
                                        Ven Number
                                    </th>
                                    <th>
                                        Licence Number
                                    </th>
{{--                                    <th>--}}
{{--                                        Role--}}
{{--                                    </th>--}}

                                    <th>
                                        Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($drivers as $key => $driver)
                                    <tr>
                                        <td> {{$driver->id}}</td>

                                        <td>
                                            {{$driver->name}}
                                        </td>
                                        <td>
                                            {{$driver->email}}
                                        </td>
                                        <td>
                                            {{$driver->ven_number}}
                                        </td>
                                        <td>
                                            {{$driver->licence_number}}
                                        </td>
{{--                                        <td>--}}
{{--                                            {{$driver->role}}--}}
{{--                                        </td>--}}

                                        <td>
                                            <a href="{{ route('driver.show', $driver->id) }}" class="btn btn-outline-success btn-sm">{{$driver->name}} Dustbin</a>
                                            <a href="{{ route('driver.edit', $driver->id) }}" class="btn btn-outline-success btn-sm">Edit</a>

                                            <form class="d-inline" method="post" action="{{ route('driver.destroy',$driver->id)}}">
                                                @csrf()
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-primary btn-sm" onclick="return confirm('Are you sure?')">
                                                    <i class=" btn-icon-prepend" data-feather="trash"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

