@extends('admin.layout.app')
@section('title', 'Category Manage')
@section('content')
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Category manage</a>
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
                            <th>Category Name</th>
                            <th>Parent</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                    @forelse($categories as $category)
                        <tr>
                            <td>
                                <label class="ckbox mg-b-0">
                                    <input type="checkbox"><span></span>
                                </label>
                            </td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->parent_category }}</td>
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
                </div>
            </div>
        </div><!-- sl-page-title -->

    </div><!-- sl-pagebody -->
@endsection
