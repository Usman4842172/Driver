@extends('admin.layouts.app')

@section('content')
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card custom">
                <div class="card-body">
                    <h6 class="card-title">Add Driver</h6><br>
                    <form class="forms-sample" action="{{ route('driver.store')}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('POST') }}
                        <div class="row">
                        <div class=" col-md-6 mb-3">
                            <label for="name" class="form-label">Name<span class="text-danger">*</span></label>
                            <input type="text" class="form-control"  placeholder="name" name="name"  required>
                        </div>
                        <div class=" col-md-6 mb-3">
                            <label for="name" class="form-label">Email<span class="text-danger">*</span></label>
                            <input type="email" class="form-control"  placeholder="email" name="email"  required>
                        </div>
                        </div>

                        <div class="row">
                            <div class=" col-md-6 mb-3">
                                <label for="name" class="form-label">Password<span class="text-danger">*</span></label>
                                <input type="password" class="form-control"  placeholder="password" name="password"  required>
                            </div>
                            <div class=" col-md-6 mb-3">
                                <label for="name" class="form-label">Ven Number<span class="text-danger">*</span></label>
                                <input type="text" class="form-control"  placeholder="ven_number" name="ven_number"  required>
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-md-6 mb-3">
                                <label for="name" class="form-label">Licence Number<span class="text-danger">*</span></label>
                                <input type="text" class="form-control"  placeholder="licence number" name="licence_number"  required>
                            </div>
{{--                            <div class=" col-md-6 mb-3">--}}
{{--                                <label for="role" class="form-label">Role<span class="text-danger">*</span></label>--}}
{{--                                <input type="text" class="form-control"  placeholder="role" name="role"  required>--}}
{{--                            </div>--}}
                        </div>
{{--                        <div class=" col-md-6 mb-3">--}}
{{--                            <label for="image" class="form-label">Image<span class="text-danger">*</span></label>--}}
{{--                            <input type="file" class="form-control"  placeholder="image" name="image"  required>--}}
{{--                        </div>--}}
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
