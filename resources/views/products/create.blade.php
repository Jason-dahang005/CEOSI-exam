@extends('index')
@section('title', 'Products')
@section('content')

    <div>
        <form id="formData">
            @csrf
            <label for="product_name">Product name</label>
            <input type="text" name='product_name' id='product_name' placeholder='Enter product name'>
            <button type="submit">Submit</button>
        </form>
    </div>

@endsection