@extends('layouts.admin')

@section('title', 'Unit')
@section('content-header', 'Unit')
@section('content-actions')
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css') }}">
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('unit.update',$unit->id)}}" method="POST">

                @csrf
                @method('PUT')
                <div class="row">
                <div class="form-group col-6">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" value="{{$unit->name}}">
                    @error('name')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group col-6">
                    <label for="">Shot Name</label>
                    <input type="text" name="shot_name" class="form-control" value="{{$unit->shot_name}}">
                    @error('shot_name')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
            <button class="btn btn-success">Update</button>
            </form>
        </div>
    </div>
@endsection
