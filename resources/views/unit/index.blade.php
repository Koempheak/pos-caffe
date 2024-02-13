@extends('layouts.admin')

@section('title', 'Unit')
@section('content-header', 'Unit')
@section('content-actions')
    <a href="{{ route('unit.create') }}" class="btn btn-success"><i class="fas fa-plus"></i>Add Unit</a>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css') }}">
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr class="text-center">
                        <th>Name</th>
                        <th>Shot Names</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($units as $unit)
                        <tr>
                            <td>{{ $unit->name }}</td>
                            <td class="text-center">{{ $unit->shot_name }}</td>
                            <td>
                                <div style="position: relative;
                                left: 180px;">
                                    <span style="display: inline-flex">
                                        <a href="{{ route('unit.edit', $unit->id) }}"
                                            class=" btn btn-primary btn-sm text-uppercase"><i class="fas fa-edit"></i></a>
                                        <span class="dl">
                                            <form action="{{ route('unit.destroy', $unit->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger btn-sm ml-1 text-uppercase" type="submit"> <i
                                                        class="fas fa-trash"></i></button>
                                            </form>
                                        </span>
                                    </span>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
