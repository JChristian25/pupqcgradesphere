@extends('layouts.app')

@section('header')
<div class="page-header d-print-none mt-5">
    <div class="container-xl">
        <div class="d-flex flex-row">
            <div class="row g-2 align-items-center">
                <div class="col">
                  <!-- Page pre-title -->
                  <div class="page-pretitle">
                    Gradesheets
                  </div>
                  <h2 class="page-title">
                    Edit Gradesheet
                  </h2>
                </div>
                <!-- Page title actions -->
              </div>
              <div class="ms-auto">
                <a href="{{ route('gradesheets') }}" class="btn btn-secondary ms-auto d-flex items-center">
                    <span>
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-narrow-left"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l14 0" /><path d="M5 12l4 4" /><path d="M5 12l4 -4" /></svg>
                    </span>
                    <span>Back</span>
                </a>
              </div>
        </div>
    </div>
  </div>
@endsection

@section('content')
<div class="col-md-12 mb-3">

    <div class="card">

        <div class="card-header">

            <h3 class="card-title">

                Gradesheet Details

            </h3>

            <div class="ms-auto d-flex align-items-center space-x-1">

                <a id="save-temp-btn" class="btn btn-success d-flex align-items-center" aria-label="Save">
                    <span>Save</span>
                </a>

                <a id="update_gradesheet" class="btn btn-primary d-flex align-items-center" aria-label="Send for Checking">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-2">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M10 20.777a8.942 8.942 0 0 1 -2.48 -.969"/>
                        <path d="M14 3.223a9.003 9.003 0 0 1 0 17.554"/>
                        <path d="M4.579 17.093a8.961 8.961 0 0 1 -1.227 -2.592"/>
                        <path d="M3.124 10.5c.16 -.95 .468 -1.85 .9 -2.675l.169 -.305"/>
                        <path d="M6.907 4.579a8.954 8.954 0 0 1 3.093 -1.356"/>
                        <path d="M12 9v6"/>
                        <path d="M15 12l-3 3l-3 -3"/>
                    </svg>
                    <span>Send for Checking</span>
                </a>

            </div>


        </div>

        <div class="card-body">

            <div class="col-md-12">

                <div class="d-flex flex-row gap-3">
                    <div class="col-md-6">
                        <div class="d-flex flex-row gap-3">
                            <div class="col-md-8">
                                <label class="form-label" for="g_subject">Subject Description</label>
                                <input class="form-control" id="g_subject" value="{{ $gradesheet->g_subject }}">
                            </div>
                            <div class="col-md-4 d-flex flex-column justify-content-end">
                                <label class="form-label" for="subject_code">Subject Number</label>
                                <input id="subject_code" class="form-control" value="{{ $gradesheet->g_subject_code }}"> <!-- To add: Advanced Selector -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 ms-3">
                        <label class="form-label" for="year_and_section">Year & Section</label>
                        <input class="form-control" id="year_and_section" value="{{ $gradesheet->year_and_section }}">
                    </div>
                    <div class="col-md-1">
                        <label class="form-label" for="g_subject_units">Units</label>
                        <input class="form-control" id="g_subject_units" value="{{ $gradesheet->g_subject_units }}">
                    </div>
                </div>

                <div class="d-flex flex-row gap-3 mt-3">

                    <div class="col-lg-2">
                        <label class="form-label" for="block_time">Time</label>
                        <input class="form-control" id="block_time" value="{{ $gradesheet->block_time }}">
                    </div>
                    <div class="col-lg-3">
                        <label class="form-label" for="block_room">Room</label>
                        <input class="form-control" id="block_room" value="{{ $gradesheet->block_room }}">
                    </div>
                    <div class="col-lg-3">
                        <label class="form-label" for="select-semester" >Semester</label>
                        <select type="text" class="form-control" id="g_subject_semester">
                            <option value="">Select Semester</option>
                            <option value="1st Semester" {{ $gradesheet->g_subject_semester === '1st Semester' ? 'selected' : '' }}>1st Semester</option>
                            <option value="2nd Semester" {{ $gradesheet->g_subject_semester === '2nd Semester' ? 'selected' : '' }}>2nd Semester</option>
                            <option value="Summer" {{ $gradesheet->g_subject_semester === 'Summer' ? 'selected' : '' }}>Summer</option>
                        </select>
                    </div>
                    <div class="col-lg-3">
                        <label class="form-label" for="school_year">School Year</label>
                        <input class="form-control" id="school_year" value="{{ $gradesheet->school_year }}">
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<div class="card col-md-12">

    <div class="col-md-12">

        <div class="card-header">
            <h3 class="card-title">Students added to Gradesheet: <span id="count">0</span></h3>
        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table id="studentsGradesheetTable" class="table card-table table-vcenter text-nowrap datatable">

                    <thead>

                        <tr>

                            <th>Student Number</th>
                            <th>Student Name</th>
                            <th class="text-center col-sm-1">First Grading</th>
                            <th class="text-center col-sm-1">Second Grading</th>
                            <th class="text-center col-sm-1">Final Rating</th>
                            <th class="text-center">Remarks</th>
                            <th hidden>id</th>

                        </tr>

                    </thead>

                    <tbody>

                        @foreach ($studentGradesheet as $student)

                            <tr>
                                <td>{{ $student->student_number }}</td>
                                <td>{{ $student->last_name }}, {{ $student->first_name }} {{ $student->middle_name }}</td>
                                <td class="text-center">
                                    <input class="form-control text-center firstgrading" value="{{ $student->first_grading }}">
                                </td>
                                <td class="text-center">
                                    <input class="form-control text-center secondgrading" value="{{ $student->second_grading }}">
                                </td>
                                <td class="text-center col-sm-2">
                                    <input class="form-control text-center finalgrading" value="{{ $student->final_rating }}">
                                </td>
                                <td class="text-center col-sm-2">
                                    <input class="form-control text-center remarks" value="{{ $student->remarks }}">
                                </td>
                                <td hidden>{{ $student->id }}</td>
                            </tr>

                        @endforeach

                    </tbody>

                </table>
                <div class="text-center mt-3">
                    <span><p><strong>*** Nothing Follows ***</strong></p></span>
                </div>
            </div>

        </div>
        <div class="card-footer">

        </div>
    </div>

</div>
@endsection

@section('scripts')

<script>
    $(document).on('click', '#update_gradesheet', function() {
        console.log("Hello, world!");

        let gradesheetId = {{$gradesheet->id}};
        let g_subject = $('#g_subject').val();
        let subject_code = $('#subject_code').val();
        let year_and_section = $('#year_and_section').val();
        let g_subject_units = $('#g_subject_units').val();
        let block_time = $('#block_time').val();
        let block_room = $('#block_room').val();
        let g_subject_semester = $('#g_subject_semester').find('option:selected').val();
        let school_year = $('#school_year').val();
        let g_status = 'For Checking';

        // Array to store students
        let students_in_gradesheet = [];

        $('#studentsGradesheetTable tbody tr').each(function() {
            let row = $(this);

            let id = $(row.find("td")[6]).text();
            let firstGradeValue = row.find('.firstgrading').val();
            let secondGradeValue = row.find('.secondgrading').val();
            let finalGradeValue = row.find('.finalgrading').val();
            let remarksValue = row.find('.remarks').val();

            students_in_gradesheet.push({
                id: id,
                firstGrade: firstGradeValue,
                secondGrade: secondGradeValue,
                finalGrade: finalGradeValue,
                remarks: remarksValue
            });
        });

        // Data to be sent as JSON
        let data = {
            gradesheetId: gradesheetId,
            g_subject: g_subject,
            subject_code: subject_code,
            year_and_section: year_and_section,
            g_subject_units: g_subject_units,
            block_time: block_time,
            block_room: block_room,
            g_subject_semester: g_subject_semester,
            school_year: school_year,
            students: students_in_gradesheet,
            g_status: g_status
        };

        // Logging data to check what is being sent
        console.log(data);

        $.ajax({
            url: '{{ route("gradesheet.update") }}',
            type: 'PUT',
            data: JSON.stringify(data), // Send the data as JSON
            contentType: 'application/json', // Set the content type to JSON
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  // Adding CSRF token manually
            },
            success: function(response) {
                Swal.fire({
                    title: 'Success!',
                    text: 'Gradesheet updated successfully',
                    icon: 'success',
                    confirmButtonText: 'Continue'
                }).then((result) => {
                    window.location.reload();
                });
            },
            error: function(xhr, status, error) {
                console.error('Error in request:', error);
                // Log detailed error information
                console.error('Status:', status);
                console.error('Status Code:', xhr.status);
                console.error('Response Text:', xhr.responseText);
                console.error('Validation Errors:', xhr.responseJSON.errors);

                Swal.fire({
                    title: 'Oops!',
                    text: 'Error updating gradesheet :(',
                    icon: 'error',
                    confirmButtonText: 'Continue'
                }).then((result) => {
                    window.location.reload();
                });
            }
        });
    });

    $(document).on('click', '#save-temp-btn', function() {
        console.log("Hello, world!");

        let gradesheetId = {{$gradesheet->id}};
        let g_subject = $('#g_subject').val();
        let subject_code = $('#subject_code').val();
        let year_and_section = $('#year_and_section').val();
        let g_subject_units = $('#g_subject_units').val();
        let block_time = $('#block_time').val();
        let block_room = $('#block_room').val();
        let g_subject_semester = $('#g_subject_semester').find('option:selected').val();
        let school_year = $('#school_year').val();
        let g_status = 'Unfinished';

        // Array to store students
        let students_in_gradesheet = [];

        $('#studentsGradesheetTable tbody tr').each(function() {
            let row = $(this);

            let id = $(row.find("td")[6]).text();
            let firstGradeValue = row.find('.firstgrading').val();
            let secondGradeValue = row.find('.secondgrading').val();
            let finalGradeValue = row.find('.finalgrading').val();
            let remarksValue = row.find('.remarks').val();

            students_in_gradesheet.push({
                id: id,
                firstGrade: firstGradeValue,
                secondGrade: secondGradeValue,
                finalGrade: finalGradeValue,
                remarks: remarksValue
            });
        });

        // Data to be sent as JSON
        let data = {
            gradesheetId: gradesheetId,
            g_subject: g_subject,
            subject_code: subject_code,
            year_and_section: year_and_section,
            g_subject_units: g_subject_units,
            block_time: block_time,
            block_room: block_room,
            g_subject_semester: g_subject_semester,
            school_year: school_year,
            students: students_in_gradesheet,
            g_status: g_status
        };

        // Logging data to check what is being sent
        console.log(data);

        $.ajax({
            url: '{{ route("gradesheet.update") }}',
            type: 'PUT',
            data: JSON.stringify(data), // Send the data as JSON
            contentType: 'application/json', // Set the content type to JSON
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  // Adding CSRF token manually
            },
            success: function(response) {
                Swal.fire({
                    title: 'Success!',
                    text: 'Gradesheet updated successfully',
                    icon: 'success',
                    confirmButtonText: 'Continue'
                }).then((result) => {
                    window.location.reload();
                });
            },
            error: function(xhr, status, error) {
                console.error('Error in request:', error);
                // Log detailed error information
                console.error('Status:', status);
                console.error('Status Code:', xhr.status);
                console.error('Response Text:', xhr.responseText);
                console.error('Validation Errors:', xhr.responseJSON.errors);

                Swal.fire({
                    title: 'Oops!',
                    text: 'Error updating gradesheet :(',
                    icon: 'error',
                    confirmButtonText: 'Continue'
                }).then((result) => {
                    window.location.reload();
                });
            }
        });
    });
</script>



@endsection
