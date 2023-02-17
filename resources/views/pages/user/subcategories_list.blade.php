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
    <div class="container mt-3">
        <div class="product-list-box">
            <div class="text-center">
                <h1>{{__('Subcategories')}}</h1>
            </div>
            <hr>
            <div class="row mt-4 mb-4">
                <div class="text-left">
                    <a class="btn btn-success" href="{{ url('/')}}">{{__('Back')}}</a>
                </div>
            </div>
            <div class="listing container">
                <div class="row text-center">
                    @if (count($subcategories) > 0)
                        @foreach ($subcategories as $subcategory)
                            <div class="col-3 pt-4">
                                <a href="{{route('user.products_list', ['category_id' => $category_id, 'subcategory_id' => $subcategory->id])}}">
                                    <div class="card shadow border-0" style="width: 18rem;">
                                        <div class="card-body">
                                            <div class="card-image">
                                                <img class="card-img-top" height="200px" width="100px" src="{{ $subcategory->subcategoryImage() }}" alt="Card image cap">
                                            </div>
                                        <h5 class="card-title mt-3">{{$subcategory->name}}</h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @else
                        <h5>{{__('No Subcategories Found')}}</h5>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom-scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
@endpush
