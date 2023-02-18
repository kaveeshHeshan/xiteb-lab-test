@extends('layouts.app_guest')

@push('custom-styles')

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    
    {{-- Sweet alert CSS CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.16/dist/sweetalert2.min.css" rel="stylesheet">
    
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
                    <button onclick="inqueryPopUp(event, {{$product->id}})" class="btn btn-primary">{{__('Inquery Now')}}</button>
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.16/dist/sweetalert2.min.js"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let APP_URL = {!! json_encode(url('/')) !!};

        function inqueryPopUp(e, productId) {
            e.preventDefault();
            Swal.fire({
                title: 'Inquery Form',
                html: `<input type="text" id="username-input" class="swal2-input text-left" placeholder="Username" required>
                        <input type="email" id="email-input" class="swal2-input" placeholder="E-mail" required>
                        <input type="text" id="contact-input" class="swal2-input" placeholder="Contact Number" required>
                        <textarea id='question-input' class='swal2-textarea' placeholder="Question"></textarea>`,
                confirmButtonText: 'Send',
                focusConfirm: false,
                preConfirm: () => {
                    const username = Swal.getPopup().querySelector('#username-input').value
                    const email = Swal.getPopup().querySelector('#email-input').value
                    const contactNumber = Swal.getPopup().querySelector('#contact-input').value
                    const question = Swal.getPopup().querySelector('#question-input').value
                    if (!username || !email || !contactNumber || !question) {
                        Swal.showValidationMessage(`Please fill the fields`);
                    }
                    return { username: username, email: email, contactNumber:contactNumber, question:question }
                }
                }).then((result) => {

                    if (result.isConfirmed) {
                        Swal.fire({
                            toast: true,
                            position: 'bottom-end',
                            iconHtml: "<i style='border:none !important; outline:none !important;' class='bx bx-loader-alt bx-spin'></i>",
                            title: "{{ __('Your inquiry is being submitted...') }}",
                            showConfirmButton: false,
                            allowEscapeKey: false,
                            allowOutsideClick: false,
                            onOpen: () => {
                                swal.showLoading();
                            }
                        });

                        $.ajax({
                            type: 'POST',
                            url: APP_URL+'/inquery',
                            data: {
                                productId: productId,
                                username: result.value.username,
                                email: result.value.email,
                                contactNumber: result.value.contactNumber,
                                question: result.value.question,
                            },
                            success: function(response) {
                                Swal.fire({
                                    toast: true,
                                    position: 'bottom-end',
                                    icon: 'success',
                                    title: response.message,
                                    showConfirmButton: false,
                                    timer: 3500
                                });

                                //close alert
                                Swal.hideLoading();
                            },
                            error: function(response) {
                                Swal.fire({
                                    toast: true,
                                    position: 'bottom-end',
                                    icon: 'error',
                                    title: response.message,
                                    showConfirmButton: false,
                                    timer: 3500
                                });

                                //close alert
                                Swal.hideLoading();
                            }
                        });
                    } else {

                        Swal.fire({
                            toast: true,
                            position: 'bottom-end',
                            icon: 'info',
                            title: "{{ __('Your inquiry submission is canceled.') }}",
                            showConfirmButton: false,
                            allowEscapeKey: false,
                            allowOutsideClick: false,
                            timer:3500,
                        });

                    }

                })
        }
    </script>

@endpush