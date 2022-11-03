@extends('admin.layouts.app')

@section('content')
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card custom">
                <div class="card-body">
                    <h6 class="card-title">Add Dustbin</h6><br>
                    <form class="forms-sample" action="{{ route('assigne-dustbin.store')}}" method="POST" >
                        {{ csrf_field() }}
                        {{ method_field('POST') }}

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Driver</label>
                                    <select class="form-control select2bs4" name="user_id"  required style="width: 100%;">
                                        <option value>Select Driver</option>
                                        @foreach($drivers as $driver)
                                            <option @if(old('user_id') ==  $driver->id ) selected @endif value="{{ $driver->id }}"> {{$driver->name}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select Dustbins</label>
                                    <select  multiple class="form-control select2bs4" name="dustbin_id[]"  required style="width: 100%;">
                                        @foreach($dustbins as $dustbin)
                                            <option @if(old('dustbin_id') ==  $dustbin->id ) selected @endif value="{{ $dustbin->id }}">  ({{$dustbin->dus_number}}){{$dustbin->dus_address}} </option>
                                        @endforeach
                                    </select>
                                </div>
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
