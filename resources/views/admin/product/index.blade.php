@extends('admin.layout.app')
@section('title', 'Product Manage')
@section('content')
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Product manage</a>
        {{--        <a class="breadcrumb-item" href="index.html">Pages</a>--}}
        {{--        <span class="breadcrumb-item active">Blank Page</span>--}}
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <div class="card pd-20 pd-sm-40">

                <div class="table-responsive">
                    <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>
                                <label class="ckbox mg-b-0">
                                    <input type="checkbox"><span></span>
                                </label>
                            </th>
                            <th>Product Title</th>
                            <th>Category</th>
                            <th>Product Image</th>
                            <th>In Stock</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                    @forelse($products as $product)
                        <tr>
                            <td>
                                <label class="ckbox mg-b-0">
                                    <input type="checkbox"><span></span>
                                </label>
                            </td>
                            <td>{{ $product->title }}</td>
                            <td>{{ $product->category_id }}</td>
                            <td><img src="{{ $product->getFirstMediaUrl('products') }}" alt="" width="60" height="70"></td>
                            <td>{{ $product->in_stock }}</td>
                            <td>{{ $product->active }}</td>
                            <td>
                                <a href=""><i class="fa fa-edit"></i></a>

                                <a href=""class="ml-1"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                    @empty
                            <tr>
                                NO data found
                            </tr>
                    @endforelse
                    </tbody>

                </table>
                {{ $products->links() }}
                </div>


            </div>
        </div><!-- sl-page-title -->

    </div><!-- sl-pagebody -->
@endsection
