@extends('layouts.app_staff_member')

@push('custom-styles')

    {{-- Select2 CSS CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    {{-- Sweet alert CSS CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.16/dist/sweetalert2.min.css" rel="stylesheet">

    {{-- datetime picker CSS CDN --}}
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/eonasdan-bootstrap-datetimepicker/4.17.49/css/bootstrap-datetimepicker.min.css"
        integrity="sha512-ipfmbgqfdejR27dWn02UftaAzUfxJ3HR4BDQYuITYSj6ZQfGT1NulP4BOery3w/dT2PYAe3bG5Zm/owm7MuFhA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    {{-- Image Uploader CSS --}}
    <link rel="stylesheet" href="{{ asset('/css/image-uploader.min.css') }}" />

    <style>
        .profile-image-input {
            position: relative;
            top: 50%;
            right: -50%;
            background: #10023f;
            width: 100%;
            height: 30px;
            line-height: 32px;
            text-align: center;
            border-radius: 20px;
            overflow: hidden;
            cursor: pointer;
            transform: translate(-50%, -50%);
            box-shadow: 0px 3px 8px 0px gray;
        }
        .profile-image-input input[type='file']{
             position: absolute;
             transform: scale(1);
             opacity: 0;
        }

        .profile-image-input input[type='file']::-webkit-file-upload-button {
            cursor: pointer;
        }

        .profile-image-input i {
            color: #fff;
            font-size: 19px;
            padding-top: 7px;
        }
        .profile-image-input span {
            color: #fff;
            font-size: 17px;
            padding-top: -17px;
            /* margin-top: 7%; */
        }

        .select2-selection__choice{
            color: #fff;
            background: #10023f !important;
        }
        .form-section {
            margin: 30px 0 20px 0;
        }
    </style>
@endpush

@section('content')

@include('include.sidebar')

<section class="dashboard-body">

    @include('include.navs.admin_navbar')
            
    {{-- Navbar Here --}}
   
    <div class="dashboard-inner-content shadow">

        <!-- Profile -->
        <div class="-section">
            <div class="section-heading align-in-row-left">
                <div class="back-button">
                    <a href="{{url('/products')}}"><i class='bx bxs-chevron-left' ></i></a>
                </div>
                <div class="section-title">
                    <h2>{{__('Product Information')}}</h2>
                </div>
            </div>
            <hr>
            <div class="">
                <form id="product_store_form" method="POST" action="{{route('products.store')}}" enctype="multipart/form-data">
                    @csrf
                    <!-- Profile -->
                    <div class="">
                        {{-- <form> --}}

                            <div class="row form-section">
                                <div class="col-md-6">
                                    <label for="product-title">{{__('Product Title')}} <span class="mandatory_indicator">*</span></label>
                                    <input type="text" id="product-title" class="form-control" name="name" placeholder="Product Title">
                                </div>

                                <div class="col-md-6">
                                    <label for="product-title">{{__('Subcategory')}} <span class="mandatory_indicator">*</span></label>
                                    <select class="form-select" aria-label="Default select example" name="subcategory_id">
                                        @if (count($subcategories) > 0)
                                            <option selected disabled>{{__('Select a Subcategory')}}</option>
                                            @foreach ($subcategories as $subcategory)
                                                <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                                            @endforeach
                                        @else
                                            <option selected disabled>{{__('No Subcategory found')}}</option>
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="row form-section">
                                <div class="col-md-12">
                                    <label for="product-description">{{__('Description')}} <span class="mandatory_indicator">*</span></label>
                                    <textarea class="form-control" name="description" id="product-description" cols="30" rows="5" placeholder="Description"></textarea>
                                </div>
                            </div>

                            <div class="row form-section">
                                <div class="col-md-6">
                                    <label for="product-price">{{__('Price')}} <span class="mandatory_indicator">*</span></label>
                                    <input type="number" id="product-price" class="form-control" name="price" placeholder="Price">
                                </div>
                            </div>

                            <div class="row form-section mt-3">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-control-label"
                                            for="product-images">{{__('Product Images')}}</label>
                                        <div class="product-images"></div>
                                        
                                    </div>
                                </div>
                            </div>

                            <!-- Submit button -->
                            <div class="text-center mt-5 form-section">
                                <button class="btn btn-submit" type="submit">{{__('Save')}}</button>
                            </div>
                        {{-- </form> --}}
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection

@push('custom-scripts')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    {{-- Select2 Js CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    {{-- Moment js CDN --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"
    integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ=="
    crossorigin="anonymous"></script>

    {{-- Datetimer picker js CDN --}}
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/eonasdan-bootstrap-datetimepicker/4.17.49/js/bootstrap-datetimepicker.min.js"
        integrity="sha512-jPwanAeILSRxZLeyP1XYBOo67+how4C1Ij54LQSa8xIOP3hKyeWRe24C0scI4QrTeQywKd1meF4Pak/Glv34vA=="
        crossorigin="anonymous"></script>

    {{-- Select2 Js CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.16/dist/sweetalert2.all.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.16/dist/sweetalert2.min.js"></script>

    {{-- <script src="{{ asset('js/tinymce.min.js') }}"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.10.0/tinymce.min.js" integrity="sha512-XNYSOn0laKYg55QGFv1r3sIlQWCAyNKjCa+XXF5uliZH+8ohn327Ewr2bpEnssV9Zw3pB3pmVvPQNrnCTRZtCg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.3.1/tinymce.min.js" integrity="sha512-eV68QXP3t5Jbsf18jfqT8xclEJSGvSK5uClUuqayUbF5IRK8e2/VSXIFHzEoBnNcvLBkHngnnd3CY7AFpUhF7w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}

    <!-- Laravel Javascript Validation -->
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

    <script src="{{ asset('/js/image-uploader.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            // 
        });
    </script>

<script>
    var APP_URL = {!! json_encode(url('/')) !!};

    var images_set = {!! json_encode($productImagesArray) !!};

    if (images_set != '') {

        var image_url_obj_arr = [];

        var images = {};

        $.each(images_set, function(index, value) {

            images = {
                ['id']: value.id,
                ['src']: value.value
            };

            image_url_obj_arr.push(images);

        });

    }

    $('.product-images').imageUploader({
        preloaded: image_url_obj_arr,
        imagesInputName: 'product-images',
        preloadedInputName: 'available_images',
        maxFiles:5,
    });
    //     Dropzone.options.myDropzone = {
    //     // Configuration options go here
    // };
</script>

    {!! JsValidator::formRequest('App\Http\Requests\StoreProductRequest', '#product_store_form'); !!}
@endpush
