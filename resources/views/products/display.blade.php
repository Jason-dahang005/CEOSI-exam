@extends('index')
@section('title', 'Products')
@section('content')

<div>
        <a href="/create-product">Add new product</a>
        <table id="data-table">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>

@endsection