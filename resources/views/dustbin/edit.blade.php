@extends('admin.layouts.app')

@section('content')
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card custom">
                <div class="card-body">
                    <h6 class="card-title">Add Dustbin</h6><br>
                    <form class="forms-sample" action="{{ route('dustbin.update', $dustbin->id)}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label for="dus_number" class="form-label">Dustbin Number<span class="text-danger">*</span></label>
                                <input type="text" class="form-control"  placeholder="dustbin number" name="dus_number" value="{{$dustbin->dus_number}}"  required>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="dus_address" class="form-label">Dustbin Address<span class="text-danger">*</span></label>
                                <input type="text" class="form-control"  placeholder="dus address" name="dus_address" value="{{$dustbin->dus_address}}" required>
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                            {{--                            <a href="{{route('subject.index')}}" class="btn btn-secondary">Cancel</a>--}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
