@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <div class="row justify-content-center">

        <div class="col-12">
            <div class="card">
                <div class="card-header">{{ __('All Products') }}</div>

                <div class="card-body table-responsive">
                    <table class="table">
                        <tr style="height: 50px">
                            <th>User</th>
                            <th>Category</th>
                            <th>title</th>
                            <th>Image</th>
                            {{-- <th>Shot Description</th>
                            <th>Description</th> --}}
                            <th>Regular Price</th>
                            <th>Sell Price</th>
                            <th>SKU</th>
                            <th>Quantity</th>
                            <th>Image Gallery</th>
                            <th>Stock Status</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                        @foreach ($productes as $producte)
                        <tr>
                            <td>{{ $producte->user->name }}</td>
                            <td>{{ $producte->category->name }}</td>
                            <td>{{ $producte->title }}</td>
                            <td><img width="40" src="{{ $producte->image }}" alt="{{ $producte->user->name }}"></td>
                            {{-- <td>{{ Str::limit($producte->shot_description, 10, '...') }}</td>
                            <td>{{ Str::limit($producte->description, 10, '...') }}</td> --}}
                            <td>{{ $producte->regular_price }}</td>
                            <td>{{ $producte->sell_price }}</td>
                            <td>{{ $producte->sku }}</td>
                            <td>{{ $producte->quantity }}</td>
                            <td>{{ $producte->image_gallery }}</td>
                            <td>{{ $producte->stock_status }}</td>
                            <td>{{ $producte->status }}</td>
                            <td>
                                <a href="#">Edit</a>
                            </td>
                        </tr>
                        @endforeach

                    </table>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection
