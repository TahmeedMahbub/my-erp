@extends('imports.main.layout')

@section('title', 'Contact Edit')

@section('head')
<style>
    .image-container {
        position: relative;
        display: inline-block;
    }
    .deleted-image {
        position: relative;
        display: inline-block;
    }

    .image-container img {
        margin: 5px;
        max-height: 120px;
        width: auto;
    }

    .deleted-image img {
        filter: grayscale(100%);
        opacity: 0.5;
        margin: 5px;
        max-height: 120px;
        width: auto;
    }

    .file_remove {
        position: absolute;
        bottom: 5px;
        right: 5px;
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
                        <div class="card-header">
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
                        </div>

                        @if ($contact->files)
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h5>Attachments:</h5>


                                        <div id="file_div_0" class="image-container">
                                            <img src="https://media.sproutsocial.com/uploads/2017/02/10x-featured-social-media-image-size.png" alt="" class="img-thumbnail">
                                            <button class="btn btn-danger p-0 ps-2 pe-2 pt-1 pb-1 file_remove"><i class="mdi mdi-delete-forever fs-4"></i></button>
                                        </div>
                                        <div id="file_div_1" class="image-container">
                                            <img src="https://simpsonscreative.co.uk/wp-content/uploads/2022/01/2022-Dimensions.jpg" alt="" class="img-thumbnail" style="filter: grayscale(100%); opacity: 0.5;">
                                            <button class="btn btn-success p-0 ps-2 pe-2 pt-1 pb-1 file_remove"><i class="mdi mdi-restore fs-4"></i></button>
                                        </div>
                                        <div id="file_div_2" class="image-container">
                                            <img src="https://img.freepik.com/free-icon/picture_318-315168.jpg" alt="" class="img-thumbnail">
                                            <button class="btn btn-danger p-0 ps-2 pe-2 pt-1 pb-1 file_remove"><i class="mdi mdi-delete-forever fs-4"></i></button>
                                        </div>
                                        <div id="file_div_3" class="image-container">
                                            <img src="https://img.freepik.com/premium-vector/illustration-vector-graphic-cartoon-character-image-upload_516790-1872.jpg" alt="" class="img-thumbnail">
                                            <button class="btn btn-danger p-0 ps-2 pe-2 pt-1 pb-1 file_remove"><i class="mdi mdi-delete-forever fs-4"></i></button>
                                        </div>
                                        <div id="file_div_0" class="image-container">
                                            <img src="https://img.freepik.com/free-vector/social-media-post-with-picture-blogger-video-like-sharing-repost-flat-vector-illustration-communication-marketing-influencer_74855-8589.jpg" alt="" class="img-thumbnail">
                                            <button class="btn btn-danger p-0 ps-2 pe-2 pt-1 pb-1 file_remove"><i class="mdi mdi-delete-forever fs-4"></i></button>
                                        </div>
                                        <div id="file_div_1" class="image-container">
                                            <img src="https://img.freepik.com/free-vector/landing-page-concept-new-message_52683-25720.jpg" alt="" class="img-thumbnail" style="filter: grayscale(100%); opacity: 0.5;">
                                            <button class="btn btn-success p-0 ps-2 pe-2 pt-1 pb-1 file_remove"><i class="mdi mdi-restore fs-4"></i></button>
                                        </div>
                                        <div id="file_div_2" class="image-container">
                                            <img src="https://img.freepik.com/free-vector/new-message-concept-landing-page_23-2148322667.jpg" alt="" class="img-thumbnail" style="filter: grayscale(100%); opacity: 0.5;">
                                            <button class="btn btn-success p-0 ps-2 pe-2 pt-1 pb-1 file_remove"><i class="mdi mdi-restore fs-4"></i></button>
                                        </div>
                                        <div id="file_div_3" class="image-container">
                                            <img src="https://img.freepik.com/premium-vector/imposter-syndromewoman-standing-number-one-imposter-syndrome-woman-get-reward-social-with-anxiety-lack-selfconfidence-work-person-fakes-is-someone-else-concept-vector-illustrator_101179-2256.jpg" alt="" class="img-thumbnail">
                                            <button class="btn btn-danger p-0 ps-2 pe-2 pt-1 pb-1 file_remove"><i class="mdi mdi-delete-forever fs-4"></i></button>
                                        </div>


                                        {{-- @foreach (json_decode($contact->files) as $key => $file)
                                            <div id="file_div_{{ $key }}" class="image-container">
                                                <img src="{{ asset('assets\files\\' . $file) }}" alt="" class="img-thumbnail">
                                                <button class="btn btn-danger p-0 ps-2 pe-2 pt-1 pb-1 file_remove"><i class="mdi mdi-delete-forever fs-4"></i></button>
                                            </div>
                                        @endforeach --}}
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="row justify-content-center mt-3">
                            <div class="col-lg-3">
                                <input type="hidden" name="id" value="{{ $contact->id }}" id="">
                                <input class="form-control btn btn-secondary" type="Submit" value="Edit Contact">
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
