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
                            <h4 class="card-title">{{$drivers->name}} Driver</h4>
                            @if(Auth::user()->role == 'admin')
                            <a href="{{route('dustbin.create')}}" class="btn btn-primary btn-rounded btn-fw mb-2">Add New</a>
                                @endif
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>
                                        Dustbin Number
                                    </th>
                                    <th>
                                        Dustbin Address
                                    </th>
                                    <th>Status</th>
                                    @if(Auth::user()->role == 'admin')
                                    <th>
                                        Action
                                    </th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($drivers->dustbins as $key => $item)
                                    <tr>

                                        <td> {{$item->dus_number}}</td>

                                        <td>
                                            {{$item->dus_address}}
                                        </td>
<td>

    <form class="forms-sample" action="{{ route('assigne-dustbin.store')}}" method="POST" >
        @csrf()
{{--        @method('PUT')--}}
        <input type="hidden" name="user_id" value="{{$drivers->id}}"/>
        <input type="hidden" name="dustbin_id" value="{{$item->id}}"/>

        <div class="form-group">
        <select  class="form-control select2bs4" name="status"  onchange="this.form.submit()" style="width: 100%;">
            <option >Select Status </option>
                <option value="Fill" {{isset($item->pivot) && $item->pivot->status =='Fill' ?'selected="selected"' : ''}}>Fill </option>

                <option vlaue="Empty" {{isset($item->pivot) && $item->pivot->status =='Empty' ?'selected="selected"' : ''}}>Empty </option>
        </select>
    </div>
    </form>
</td>
                                        <td>
                                            @if(Auth::user()->role == 'admin')
                                            <form class="d-inline" method="post" action="{{ route('delete.user.dustbin',['dustbin'=>$item->id,'user_id'=>$drivers->id])}}">
                                                @csrf()
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-primary btn-sm" onclick="return confirm('Are you sure?')">
                                                    <i class=" btn-icon-prepend" data-feather="trash"></i> Delete
                                                </button>
                                            </form>
                                                @endif
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

