@extends('layouts.app_guest')

@push('custom-styles')
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

    <style>
        .listing a{
            text-decoration: none;
            color: #000;
        }
    </style>
@endpush

@section('content')
    <div class="container">
        <div class="product-list-box mt-4">
            <div class="text-center">
                <h1>{{__('Products')}}</h1>
            </div>
            <hr>
            <div class="row mt-4 mb-4">
                <div class="text-left">
                    <a class="btn btn-success" href="{{route('user.subcategory_list', $category_id)}}">{{__('Back')}}</a>
                </div>
            </div>
            <div class="listing container">
                <div class="row text-center">
                    @if (count($products) > 0)
                        @foreach ($products as $product)
                            <div class="col-3 pt-4">
                                <a href="{{route('user.product_view', $product->id)}}">
                                    <div class="card shadow border-0" style="width: 18rem;">
                                        <div class="card-body">
                                            <div class="card-image">
                                                <img class="card-img-top" height="200px" width="100px" style="border-radius:10px; object-fit: cover;" src="{{ asset('/storage/products/'.$product->coverImage->image) }}" alt="Card image cap">
                                            </div>
                                        <h5 class="card-title mt-3">{{$product->name}}</h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @else
                        <h5>{{__('No Products Found')}}</h5>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom-scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
@endpush
