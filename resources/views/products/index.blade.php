@extends('layout.layout')
@section('content')
    <div class="card p-24">
        <h4>Products</h4>
        <form method="POST" action="{{ route('products.store') }}">@csrf
            <input name="name" placeholder="Name">
            <input name="sku" placeholder="SKU">
            <input name="unit" placeholder="Unit">
            <input name="default_price" placeholder="Default price">
            <button type="submit">Add</button>
        </form>
        <table class="table">
            <thead><tr><th>ID</th><th>Name</th><th>Unit</th><th>Price</th></tr></thead>
            <tbody>
                @foreach($products as $p)
                <tr>
                    <td>{{ $p->id }}</td>
                    <td>{{ $p->name }}</td>
                    <td>{{ $p->unit }}</td>
                    <td>{{ $p->default_price }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $products->links() }}
    </div>
@endsection
