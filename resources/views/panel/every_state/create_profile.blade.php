@extends('panel.master.master')

@section('content')

    <main>
        <header
            class="page-header page-header-compact page-header-light border-bottom bg-white mb-4"
        >
            <div class="container-xl px-4">
                <div class="page-header-content">
                    <div
                        class="row align-items-center justify-content-between pt-3"
                    >
                        <div class="col-auto mb-3">
                            <h1 class="page-header-title">
                                <div class="page-header-icon">
                                    <i data-feather="user"></i>
                                </div>
                                Account Settings - Profile
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main page content-->
        <div class="container-xl px-4 mt-4">
            <!-- Account page navigation-->
            <div class="row">
                <div class="col-xl-4">
                    <!-- Profile picture card-->
                    <div class="card mb-4 mb-xl-0">
                        <div class="card-header">Profile Picture</div>
                        <div class="card-body text-center">
                            <!-- Profile picture image-->
                            <img
                                class="img-account-profile rounded-circle mb-2"
                                src="{{ asset('assets/img/illustrations/profiles/profile-1.png') }}"
                                alt=""
                            />
                            <!-- Profile picture help block-->
                            <div class="small font-italic text-muted mb-4">
                                JPG or PNG no larger than 5 MB
                            </div>
                            <!-- Profile picture upload button-->
                            {{--                            <button class="btn btn-primary" type="button">--}}
                            {{--                                Upload new image--}}
                            {{--                            </button>--}}
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <!-- Account details card-->
                    <div class="card mb-4">
                        <div class="card-header">Create Account Details</div>

                        {{-- ------------- Store profile form ------------- --}}

                        <div class="card-body">


                            @if(session('create'))
                                <div class="alert alert-success">{{ session('create') }}</div>
                            @endif

                            <form action="{{ route('store_profile') }}" method="post" enctype="multipart/form-data">

                                {{ csrf_field() }}

                                <!-- Form Group (profile_photo)-->
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputUsername"
                                    >Profile Photo</label>
                                    <input
                                        class="form-control"
                                        id="inputUsername"
                                        type="file"
                                        name="profile_photo"
                                    />
                                </div>

                                @error('profile_photo')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div>

                                </div>

                                <div class="mb-3">
                                    <label class="small mb-1" for="inputUsername"
                                    >Address</label>
                                    <input
                                        class="form-control"
                                        id="inputUsername"
                                        type="text"
                                        placeholder="Enter your address"
                                        name="address"
                                        value="{{ old('address') }}"
                                    />
                                </div>

                                @error('address')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror


                                <!-- Form Row-->
                                <div class="row">
                                    <!-- Form Group (phone)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputFirstName"
                                        >Phone No</label
                                        >
                                        <input
                                            class="form-control"
                                            id="inputFirstName"
                                            type="text"
                                            placeholder="Enter your number"
                                            name="phone"
                                            value="{{ old('phone') }}"
                                        />

                                        <br>
                                        @error('phone')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                    </div>
                                    <!-- Form Group (Card ID Info)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLastName"
                                        >Card ID NO</label
                                        >
                                        <input
                                            class="form-control"
                                            id="inputLastName"
                                            type="text"
                                            placeholder="Card ID No"
                                            name="card_id_info"
                                        />

                                        <br>
                                        @error('card_id_info')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="row">
                                    <!-- Form Group (Position)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputOrgName"
                                        >Enter Company Role</label
                                        >
                                        <input
                                            class="form-control"
                                            id="inputOrgName"
                                            type="text"
                                            placeholder="Enter your organization name"
                                            name="position"
                                        />


                                        <br>
                                        @error('position')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <!-- Form Group (dob)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLocation"
                                        >Date Of Birth</label
                                        >
                                        <input
                                            class="form-control"
                                            id="inputLocation"
                                            type="date"
                                            placeholder="Enter date"
                                            name="dob"
                                            min="1970-01-01"
                                            max="2005-01-01"
                                        />

                                        <br>
                                        @error('dob')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="row">
                                    <!-- Form Group (gender)-->
                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputEmailAddress"
                                        >Enter Gender</label
                                        >

                                        <select class="form-select" name="gender">
                                            <option disabled selected>Select Gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">female</option>
                                        </select>

                                        <br>
                                        @error('gender')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                                <!-- Save changes button-->
                                <button class="btn btn-primary" type="submit">
                                    Save changes
                                </button>
                            </form>

                            {{-- ------------- Store profile form ------------- --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection

