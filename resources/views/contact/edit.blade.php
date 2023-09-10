@extends('imports.main.layout')

@section('title', 'Contact Edit')

@section('head')
<style>
    .gallery{
        display: grid;
        grid-template-columns: repeat( 4, auto);
        gap: 10px;
        justify-content: flex-start;
        align-items: flex-start;
    }
    .gallery__image{
        position: relative;
        height: 120px;
        overflow: hidden;
    }
    .gallery__image img{
        width: 100%;
        height: 100%;
        /* border-radius: 10px; */
        object-fit: cover;
        transition: transform 0.3s ease;
    }
    .food__image-overlay{
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        opacity: 0;
        transition: opacity 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
    }

    .gallery__image:hover .food__image-overlay{
        opacity: 1;
        /* border-radius: 10px; */
    }

    .food__info{
        color: white;
        padding: 20px;
    }

    .add-to-cart {
        background-color: var(--bs-red);
        color: white;
        border: none;
        height: 50px;
        width: 50px;
        border-radius: 50%;
        padding: 10px 15px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .add-to-cart:hover {
        background-color: var(--bs-red);
    }
</style>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-end">
                    <a href="{{route('contact')}}" class="btn btn-de-primary btn-sm"><i class="mdi mdi-view-list"></i> All Contact List</a>
                </div>
                <h4 class="page-title">Edit Contact</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <form action="{{ route('contact_update') }}" id="contact_form" method="post" enctype="multipart/form-data">
            @csrf
            {{-- {{ dd($errors) }} --}}
            <div class="col-md-12 col-lg-12">
                <div class="card overflow-hidden">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-lg-3">
                                    <center>
                                        <h5>Image of {{ $contact->name }}</h5>
                                        <img src="{{ asset('assets\images\\' . $contact->image) }}" alt="" class="img-thumbnail" style="height: 120px;"><br>
                                    </center>
                                </div>
                                @if ($contact->files)
                                    <div class="col-lg-9">
                                        <h5>Attachments:</h5>
                                            <div class="gallery">
                                                @foreach (json_decode($contact->files) as $key => $file)
                                                {{-- <div id="file_div_{{ $key }}" class="image-container"> --}}
                                                    {{-- <img src="{{ asset('assets\files\\' . $file) }}" alt="Image" style="height: 120px;">
                                                    <div class="overlay">
                                                        <i class="mdi mdi-delete-forever delete-icon"></i>
                                                    </div> --}}
                                                    <div class="gallery__image">
                                                        <img src="{{ asset('assets\files\\' . $file) }}" alt="gallery image">
                                                        <div class="food__image-overlay">
                                                            <div class="food__info">
                                                                {{-- <h3>Food Name</h3> --}}
                                                                <button class="add-to-cart"><i class="mdi mdi-delete-forever fs-4"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    {{-- <button class="btn btn-danger p-0 ps-2 pe-2 pt-1 pb-1 file_remove" style="position: absolute;"><i class="mdi mdi-delete-forever fs-4"></i></button>
                                                    <img src="{{ asset('assets\files\\' . $file) }}" alt="" class="img-thumbnail" style="height: 120px;">&emsp; --}}
                                                    {{-- </div> --}}
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="card-header">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="row mb-3">
                                        <label for="category_select" class="col-sm-4 col-form-label text-end"><span class="text-danger font-weight-bold">*</span> Category</label>
                                        <div class="col-sm-8">
                                            <select id="category_id" class="form-select" name="category_id" required>
                                                <option value="">Select Recent Category</option>
                                                @foreach ($categories as $category)
                                                    <option class="form-select" value="{{ $category->id }}" {{ $contact->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger">{{ $errors->first('category_id') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="row mb-3">
                                        <label for="branch_select" class="col-sm-4 col-form-label text-end">Branch</label>
                                        <div class="col-sm-8">
                                            <select id="default1" class="form-select" name="branch_id">
                                                <option class="form-select" value="">Select Branch</option>
                                                @foreach ($branches as $branch)
                                                    <option class="form-select" value="{{ $branch->id }}" {{ $contact->branch_id == $branch->id ? 'selected' : '' }}>{{ $branch->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-sm-4 col-form-label text-end"><span class="text-danger font-weight-bold">*</span> Full Name</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="text" name="name" placeholder="Enter Full Name" value="{{ $contact->name }}" required>
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3 row">
                                        <label for="example-url-input" class="col-sm-4 col-form-label text-end">Contact Code</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input class="form-control" type="text" value="{{ $contact->code }}" placeholder="Enter Unique Contact Code" name="code" readonly>
                                                <span class="input-group-text text-warning" id="basic-addon2"><i class="mdi mdi-alert-circle-outline"></i>Cannot Change</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3 row">
                                        <label for="example-email-input" class="col-sm-4 col-form-label text-end"><span class="text-danger font-weight-bold">*</span> Phone</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <div class="input-group-text">+880</div>
                                                <input class="form-control" type="number" value="{{ $contact->phone }}" step="1" name="phone" placeholder="Enter Phone Number" min="1000000000" max="9999999999" maxlength="10" required>
                                            </div>
                                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3 row">
                                        <label for="example-date-input" class="col-sm-4 col-form-label text-end">Secondary Phone</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="text" value="{{ $contact->phone_1 }}" name="phone_1" placeholder="Enter Emergency Phone Number">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3 row">
                                        <label for="example-tel-input" class="col-sm-4 col-form-label text-end">Email</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="email" value="{{ $contact->email }}" placeholder="Enter Email Address" name="email">
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-sm-4 col-form-label text-end">Company</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="text" value="{{ $contact->company }}" name="company" placeholder="Enter Company Name">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3 row">
                                        <label for="example-month-input" class="col-sm-4 col-form-label text-end">Image</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="file" name="image" accept="image/*">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3 row">
                                        <label for="example-month-input" class="col-sm-4 col-form-label text-end">Attachments</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="file" name="files[]" multiple>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3 row">
                                        <label for="example-month-input" class="col-sm-4 col-form-label text-end">Address</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" name="address" id="" cols="30" rows="5">{{ $contact->address }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3 row">
                                        <label for="example-month-input" class="col-sm-4 col-form-label text-end" name="details">Details</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" name="details" id="" cols="30" rows="5">{{ $contact->details }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-center mt-3">
                                <div class="col-lg-3">
                                    <input type="hidden" name="id" value="{{ $contact->id }}" id="">
                                    <input class="form-control btn btn-secondary" type="Submit" value="Edit Contact">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection


@section('script')
    <script>
        $(document).ready(function() {
        // Function to handle the "Remove File" button click
        $("#removeFileButton").click(function() {
            // Clear the file input by setting its value to an empty string
            $("#fileInput").val('');

            // You can perform additional actions if needed after removing the file
        });
        });
    </script>
@endsection
