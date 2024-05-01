@extends('layouts.app')

@section('title', 'Edit Doctor Schedules')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
    <style>
        /* Style for the table */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
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
                    <div class="card-body">
                        <button id="addScheduleBtn" class="btn btn-primary">Add Schedule</button>
                        <table id="scheduleTable">
                            <thead>
                                <tr>
                                    <th>Doctor Name</th>
                                    <th>Day</th>
                                    <th>Time</th>
                                    <th>Status</th>
                                    <th>Note</th>
                                </tr>
                            </thead>
                            <tbody id="scheduleBody"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const addScheduleBtn = document.getElementById('addScheduleBtn');
            const scheduleBody = document.getElementById('scheduleBody');

            addScheduleBtn.addEventListener('click', function() {
                // Assuming you have the schedule data available
                const scheduleData = {
                    doctor_name: '{{ $doctorSchedule->doctor->doctor_name }}',
                    day: '{{ $doctorSchedule->day }}',
                    time: '{{ $doctorSchedule->time }}',
                    status: '{{ $doctorSchedule->status }}',
                    note: '{{ $doctorSchedule->note }}'
                };

                // Create a new row for the schedule table
                const newRow = document.createElement('tr');
                newRow.innerHTML = `
                    <td>${scheduleData.doctor_name}</td>
                    <td>${scheduleData.day}</td>
                    <td>${scheduleData.time}</td>
                    <td>${scheduleData.status}</td>
                    <td>${scheduleData.note}</td>
                `;

                // Append the new row to the table body
                scheduleBody.appendChild(newRow);
            });
        });
    </script>
@endpush
