@extends('index')
@section('title', 'Update Product')
@section('content')

    <div>
        <form id="updateFormData">
            @csrf
            <label for="product_name">Product name</label>
            <input type="text" name='product_name' id='product_name'>
            <button type="submit">Update</button>
        </form>
    </div>

@endsection