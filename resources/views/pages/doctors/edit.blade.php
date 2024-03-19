@extends('layouts.app')

@section('title', 'Edit Doctor')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Advanced Forms</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Forms</a></div>
                    <div class="breadcrumb-item">Doctor</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Doctor</h2>



                <div class="card">
                    {{-- <form action="{{ route('doctors.update', $doctor) }}" method="POST"> --}}
                    {{-- ini produce error --}}
                    {{-- error  Object of class stdClass could not be converted to string
                        C:\Development\fic15b\laravel-clinic-backend\resources\views\pages\doctors\edit.blade
.php
 
: 33
require                    --}}


                    {{-- The error you're encountering is likely due to trying to use an instance of stdClass (which is an object) as a string. This often happens when you're trying to concatenate an object directly into a string.
                        In your Blade view, it seems like you are trying to use $doctor as a string in the route function, which might not be the correct usage.
                        Here's a possible solution:
                        Assuming $doctor is an instance of the Doctor model, you might want to use its id attribute in the route function. Modify the relevant part of your code like this: --}}

                    {{-- <form action="{{ route('doctors.update', $doctor->id) }}" method="POST"> --}}
                    <form action="{{ route('doctors.update', $doctor->id) }}" method="POST" enctype="multipart/form-data">


                        @csrf
                        @method('PUT')
                        <div class="card-header">
                            <h4>Edit Doctor Card</h4>
                        </div>
                        <div class="card-body">

                            <div class="photo doctor">
                                <td>
                                    {{-- {{ $doctor->photo }} --}}
                                    {{-- @if ($doctor->photo) --}}
                                    {{-- @if ($doctor->photo && Storage::disk('public')->exists('img/doctors/' . $doctor->photo))
                                        {{-- //<img src="{{ asset('img/doctors/' . $doctor->photo) }}" --}}
                                    @if ($doctor->photo && Storage::disk('public')->exists('img/doctors/' . $doctor->photo))
                                        <img src="{{ asset('storage/img/doctors/' . $doctor->photo) }}"
                                            alt="{{ old('doctor_name', $doctor->doctor_name) }} Photo" width="150">
                                    @else
                                        <img src="{{ asset('storage/img/doctors/none.png') }}"
                                            alt="{{ old('doctor_name', $doctor->doctor_name) }} Photo" width="150"
                                            style="margin: 10px;">
                                    @endif

                                </td>
                            </div>

                            <div class="form-group">
                                <label>Photo</label>
                                <input type="file" name="photo">

                                @error('photo')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>



                            <div class="form-group" style="margin-top: 37px;">
                                <label>Doctor Name</label>
                                <input type="text"
                                    class="form-control @error('doctor_name')
                                is-invalid
                            @enderror"
                                    name="doctor_name" value="{{ $doctor->doctor_name }}">
                                @error('doctor_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Doctor Specialist</label>
                                <input type="text"
                                    class="form-control @error('doctor_specialist')
                                is-invalid
                            @enderror"
                                    name="doctor_specialist" value="{{ $doctor->doctor_specialist }}">
                                @error('doctor_specialist')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label>Doctor Email</label>
                                <input type="text"
                                    class="form-control @error('doctor_email')
                                is-invalid
                            @enderror"
                                    name="doctor_email" value="{{ $doctor->doctor_email }}">
                                @error('doctor_email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control @error('address') is-invalid @enderror"
                                    name="address" value="{{ $doctor->address }}">

                                @error('address')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label>Doctor Phone</label>
                                <input type="text"
                                    class="form-control @error('doctor_phone')
                                is-invalid
                            @enderror"
                                    name="doctor_phone" value="{{ $doctor->doctor_phone }}">
                                @error('doctor_phone')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>SIP Surat Ijin Praktek</label>
                                <input type="text"
                                    class="form-control @error('sip')   //harus huruf kecil sesuai tabel
                                is-invalid
                            @enderror"
                                    name="sip" value="{{ $doctor->sip }}">
                                @error('sip')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>ID IHS (Indonesia Health Service)</label>
                                <input type="text"
                                    class="form-control @error('id_ihs')   //harus huruf kecil sesuai tabel
                                is-invalid
                            @enderror"
                                    name="id_ihs" value="{{ $doctor->id_ihs }}">
                                @error('id_ihs')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>NIK (Nomor Induk Kependudukan)</label>
                                <input type="number"
                                    class="form-control @error('nik')   //harus huruf kecil sesuai tabel
                                is-invalid
                            @enderror"
                                    name="nik" value="{{ $doctor->nik }}">
                                @error('nik')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- <div class="form-group">
                                <label for="photo">Doctor Photo</label>
                                <input type="file" name="photo" id="photo" accept="image/*">
                            </div> --}}

                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </section>
    </div>
@endsection





@push('scripts')
@endpush
