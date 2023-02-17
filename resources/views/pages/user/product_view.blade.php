@extends('layouts.app_guest')

@push('custom-styles')

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

    <style>
        .other-images-box,
        .main-image-box {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .other-images-box img{
            padding: 0 10px 0 10px;
            border-radius: 15px;
        }
    </style>
@endpush

@section('content')
    <div class="container mt-4">
        <div class="header-box container text-center">
            <h1>{{$product->name ?? '--'}}</h1>
            <hr>
        </div>
        <div class="row mt-4 mb-4">
            <div class="text-left">
                <a class="btn btn-success" href="{{ url()->previous()}}">{{__('Back')}}</a>
            </div>
        </div>
        <div class="product-details-box row">
            <div class="col-md-6">
                <div class="row">
                    <div class="main-image-box">
                        <img style="height: 300px; width: 500px; border-radius:10px; object-fit: cover;" src="{{ asset('/storage/products/'.$product->coverImage->image) }}" alt="">
                    </div>
                </div>
                <div class="row">
                    <div class="other-images-box mt-3">
                        @if (count($product->otherProductImages) > 0)
                            @foreach ($product->otherProductImages as $otherImage)
                                <img style="height: 50px; width: 100px; object-fit: cover;" src="{{ asset('/storage/products/'.$otherImage->image) }}" alt="">
                            @endforeach
                        @else
                            <h5>{{__('No Other Images Found')}}</h5>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="container text-center">
                    <h4>Product Details</h4>
                </div>
                <hr>
                <div class="product-details">
                    <div class="row">
                        <div class="col-md-3">
                            <p><b>{{__('Product Name :')}}</b></p>
                        </div>
                        <div class="col-md-9">
                            <p>{{$product->name ?? '--'}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <p><b>{{__('Description :')}}</b></p>
                        </div>
                        <div class="col-md-9">
                            <p>{{$product->description ?? '--'}}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <p><b>{{__('Price (Rs.) :')}}</b></p>
                        </div>
                        <div class="col-md-9">
                            <p>{{$product->price ?? '--'}}</p>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="inquery-btn-block">
                    <button class="btn btn-primary">{{__('Inquery Now')}}</button>
                </div>
            </div>
        </div>
        <br>
        <div class="product-list-box">
            
            <hr>
        </div>
    </div>
@endsection

@push('custom-scripts')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

@endpush