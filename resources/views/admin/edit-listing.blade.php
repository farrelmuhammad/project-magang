@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="post" action="{{ url('admin/editing/'.$id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                    <div class="box_general padding_bottom">
                        <div class="header_box version_2">
                            <h2><i class="fa fa-file"></i>Basic info</h2>
                        </div>
                  <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Listing Title</label>
                                    <input type="text" name="name" class="form-control" placeholder="Hotel Mariott">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Category</label>
                                    <div class="styled-select">
                                    <select name="category_id">
                                    @foreach($category as $cat)
                                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endforeach
                                    </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /row-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <input name="description" type="text" class="editor">
                                </div>
                            </div>
                        </div>
                        <!-- /row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Product Type</label>
                                    <input type="text" name="product_type" class="form-control" placeholder="Type">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="text" name="price" class="form-control" placeholder="Price">
                                </div>
                            </div>
                        </div>
                        <!-- /row-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Photos</label>
                                    <input type="file" name="image" class="dropzone">
                                </div>
                            </div>
                        </div>
                        <!-- /row-->
                    </div>
                    <!-- /box_general-->
                    
                    {{-- <div class="box_general padding_bottom">
                        <div class="header_box version_2">
                            <h2><i class="fa fa-map-marker"></i>Location</h2>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select City</label>
                                    <div class="styled-select">
                                    <select>
                                        <option>Miami</option>
                                        <option>New York</option>
                                        <option>Los Angeles</option>
                                        <option>San Francisco</option>
                                    </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" class="form-control" placeholder="ex. 250, Fifth Avenue...">
                                </div>
                            </div>
                        </div>
                        <!-- /row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>State</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Zip Code</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <!-- /row-->
                    </div>
                    <!-- /box_general--> --}}
                    <input type="submit" class="btn_1 medium" value="Save">
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
