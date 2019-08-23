@extends('layouts.app', ['title' => __('Locations Management')])

@section('content')
    @include('layouts.headers.default')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Management Locations') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addLoc">
                                {{__('Add Location')}}
                            </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('ID Location') }}</th>
                                    <th scope="col">{{ __('Name Location') }}</th>
                                    <th scope="col">{{ __('Actions') }}</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($locations as $location)
                                    <tr>
                                        <td>{{ $location->id }}</td>
                                        <td>{{ $location->location_name }}</td>
                                        <td>
                                            <a href="/items/edit/{{$location->id}}" ><button type="button" class="btn btn-primary">{{__('Edit')}}</button></a>
                                            <a href="/items/delete/{{$location->id}}" ><button type="button" class="btn btn-danger">{{__('Delete')}}</button></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="addLoc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form method="post" action="/items/add"> 
            @csrf
            <div class="modal-dialog modal-dialog-centered" role="document">   
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="exampleModalLabel">Add Item</h3>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="text" class="form-control" name="nameItem" placeholder="Item Name">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </div>
            </div>
            </form>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection