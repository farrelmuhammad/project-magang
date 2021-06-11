@extends('layouts.app')

@section('content')

                                    <div class="card-body">
                                        @if (session('status'))
                                            <div class="alert alert-success" role="alert">
                                                {{ session('status') }}
                                            </div>
                                        @endif
                    <div class="row mb-3">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-right">
                                <a class="btn btn-success" href="{{ url('admin/add') }}"> Create New Item</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive-sm">
                    <table class="table table-bordered">
                        <tr class="thead-light text-center">
                            <th>Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Product Type</th>
                            <th>Description</th>
                            <th>User</th>
                            <th>Gambar</th>
                            <th width="180px">Action</th>
                        </tr>
                        @foreach ($product as $prod)
                        <tr class="text-center">
                            <td>{{ $prod->name }}</td>
                            <td>{{ $prod->category->name }}</td>
                            <td>{{ $prod->price }}</td>
                            <td>{{ $prod->product_type }}</td>
                            <td>{{ $prod->description }}</td>
                            <td>{{ $prod->user->name }}</td>
                            <td width="180px"><img src="{{ Storage::url('public/images/'.$prod->image) }}" width="100px" height="100px"></td>
                            <td>
                                <form action="{{url('admin/destroy/'.$prod->id)}}" method="POST">
                                    <a class="btn btn-primary" href="{{url('admin/'.$prod->id.'/edit')}}">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    </div>
                                  
@endsection
