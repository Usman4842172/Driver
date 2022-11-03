@extends('admin.layouts.app')

@section('content')

    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Driver</h4>
                            @if(Auth::user()->role == 'admin')
                            <a href="{{route('dustbin.create')}}" class="btn btn-primary btn-rounded btn-fw mb-2">Add New</a>
                                @endif
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        Dustbin Number
                                    </th>
                                    <th>
                                        Dustbin Address
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($dustbins as $key => $dustbin)
                                    <tr>
                                        <td> {{$dustbin->id}}</td>
                                        <td>
                                            {{$dustbin->dus_number}}
                                        </td>
                                        <td>
                                            {{$dustbin->dus_address}}
                                        </td>
                                        <td>
                                            <a href="{{ route('dustbin.edit', $dustbin->id) }}" class="btn btn-outline-success btn-sm">Edit</a>
                                            <form class="d-inline" method="post" action="{{ route('dustbin.destroy',$dustbin->id)}}">
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
