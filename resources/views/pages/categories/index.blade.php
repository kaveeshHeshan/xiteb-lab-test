@extends('layouts.app_staff_member')

@push('custom-styles')

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    {{-- Sweet alert CSS CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.16/dist/sweetalert2.min.css" rel="stylesheet">

    <!-- Datatables CDN Link -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.13.1/b-2.3.3/b-html5-2.3.3/r-2.4.0/datatables.min.css"/>
    
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

        .page-link {
            border-radius: 50% !important;
            height: 35px !important;
            width: 35px !important;
            text-align: center !important;
        }

        .page-link a i {
            
        }

        .page-link:nth-child(n+1) {
            margin-left: 5px !important;
        }

        .paginate_button.current{
            background: #10023f !important;
            /* color: rgb(241, 8, 8) !important; */
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
            <!-- Data Table Section -->
        <div class="table-section">
            <div class="section-heading " style="display: flex;justify-content: space-between;">
                <div class="">
                    <h2>{{__('Categories Management')}}</h2>
                </div>
                @can('category.create')
                    <div class="" style="">
                        <a href="{{url('/categories/create')}}" class="btn btn-primary float-right">
                            <i class='bx bx-plus'></i>
                            &nbsp;{{__('Add Category')}}
                        </a>
                    </div>
                @endcan
            </div>
            <hr>
            <div class="col-12 custom-datatable-div">
                @if (count($categories) > 0)
                    <div class="table mb-4">
                        <div class="table-responsive">
                            <table id="posts-table" class="table align-items-center table-flush booking_table" cellspacing="0" width="100%">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">{{__('No :')}}</th>
                                        <th scope="col">{{__('Image :')}}</th>
                                        <th scope="col" class="">{{__('Name')}}</th>
                                        <th scope="col">{{__('Created On')}}</th>
                                        <th scope="col">{{__('')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($categories as $category)
                                            <tr>
                                                <td class="">{{$i}}</td>
                                                <td class="">
                                                    <img class="rounded" style="background: transparent; width: 80px; height: 50px; object-fit: cover;" src="{{ $category->categoryImage() }}" alt="">
                                                </td>
                                                <td>{{$category->name ?? '--'}}</td>
                                                <td>{{$category->created_at->format('Y-M-d H:m A') ?? '--'}}</td>
                                                <td class="text-right">
                                                    <div class="dropdown">
                                                        <button class="btn btn-sm btn-icon-only" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class='bx bx-dots-vertical-rounded'></i>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-end">
                                                            @can('category.edit')
                                                                <a class="dropdown-item"
                                                                    href="{{ url('/categories', $category->id) }}/edit">
                                                                    <i class='bx bx-message-square-edit'></i>
                                                                    &nbsp; {{__('Edit')}}
                                                                </a>
                                                            @endcan
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            @php
                                                $i++;
                                            @endphp
                                        @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div>
                @else
                    <h5>{{__('No Categories found.')}}</h5>
                @endif
            </div>
            <!-- Data Table Section -->
        </div>
    </div>
</section>

@endsection

@push('custom-scripts')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    {{-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/v/bs5/dt-1.13.1/datatables.min.js"></script> --}}
    {{-- <script type="text/javascript" src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script> --}}
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.13.1/b-2.3.3/b-html5-2.3.3/r-2.4.0/datatables.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.16/dist/sweetalert2.all.min.js"></script>
    
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.16/dist/sweetalert2.min.js"></script> --}}

    <!-- Laravel Javascript Validation -->
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

    <script>
        $(document).ready( function () {
        // $('').DataTable();
            $('#posts-table').DataTable({
                    responsive: true,
                    columnDefs: [
                        {
                            responsivePriority: 1,
                            targets: 0
                        },
                        {
                            responsivePriority: 2,
                            targets: 1
                        },
                        {
                            responsivePriority: 3,
                            targets: 2
                        },
                        {
                            responsivePriority: 6,
                            targets: -1
                        },
                    ],
                    language: {
                        oPaginate: {
                            sNext: '<i class="bx bx-chevron-right" ></i>',
                            sPrevious: '<i class="bx bx-chevron-left" ></i>',
                            sFirst: '<i class="bx bxs-chevrons-left" ></i>',
                            sLast: '<i class="bx bxs-chevrons-right" ></i>'
                        }
                    }
                });
        });
    </script>

    <script type="text/javascript">

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let APP_URL = {!! json_encode(url('/')) !!};

        function postRemove(e, post_id) {
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'POST',
                        url: APP_URL+'/posts/remove',
                        data: {
                            id: post_id,
                        },
                        success: function(response) {
                            console.log(response);
                            if (response.status == 'success') {
                                Swal.fire({
                                    toast: true,
                                    position: 'bottom-end',
                                    icon: 'success',
                                    title: response.message,
                                    text:'Wait for the page reload.',
                                    showConfirmButton: false,
                                    timer: 3500
                                });

                            } else {
                                Swal.fire({
                                    toast: true,
                                    position: 'bottom-end',
                                    icon: 'error',
                                    title: response.message,
                                    showConfirmButton: false,
                                    timer: 3500
                                })
                            }

                            //close alert
                            Swal.hideLoading();

                            // Delay page reload untile the sweet alert is closed
                            setTimeout(function() {
                                location.reload();
                            }, 4000);
                        },
                        error: function(response) {

                            Swal.fire({
                                toast: true,
                                position: 'bottom-end',
                                icon: 'error',
                                title: "Something went wrong!",
                                showConfirmButton: false,
                                timer: 3500
                            });
                            //close alert
                            Swal.hideLoading();
                        }
                    });
                }
            });

        }
    </script>

@endpush