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
        .header-box{
            height: 150px;
            background: #aaa8a8;
            border-radius: 10px;
            color: #fff;
        }
    </style>
@endpush

@section('content')
    <div class="container">
        <div class="header-box container text-center mt-2">
            <div class="pt-3">
                <h1 class="">{{__('Welcome!')}}</h1>
                <h3>{{__('You can browse our categories')}}</h3>
            </div>
        </div>
        <br>
        <div class="product-list-box listing">
            <div class="text-center">
                <h1>{{__('Categories')}}</h1>
            </div>
            <hr>
            <div class="container">
                <div class="row text-center">
                    @if (count($categories) > 0)
                        @foreach ($categories as $category)
                            <div class="col-3 pt-4">
                                <a href="{{route('user.subcategory_list', $category->id)}}">
                                    <div class="card shadow border-0" style="width: 100%;">
                                        <div class="card-body">
                                            <div class="card-image">
                                                <img class="card-img-top" height="200px" width="100px" src="{{ $category->categoryImage() }}" alt="Card image cap">
                                            </div>
                                        <h5 class="card-title mt-3">{{$category->name}}</h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @else
                        <h5>{{__('No Categories Found')}}</h5>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom-scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> 
@endpush
