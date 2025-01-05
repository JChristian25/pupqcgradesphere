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
                    Add Students to Gradesheet
                  </h2>
                </div>
                <!-- Page title actions -->
              </div>
              <div class="ms-auto">
                <a href="{{ route('gradesheets') }}" class="btn btn-secondary">
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

            <div class="ms-auto">

                <a id="save-temp-btn" class="btn btn-success">
                    <span>Save</span>
                </a>

                <a id="for-checking-btn" class="btn btn-primary ms-auto">
                    <span>

                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-progress-down"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 20.777a8.942 8.942 0 0 1 -2.48 -.969" /><path d="M14 3.223a9.003 9.003 0 0 1 0 17.554" /><path d="M4.579 17.093a8.961 8.961 0 0 1 -1.227 -2.592" /><path d="M3.124 10.5c.16 -.95 .468 -1.85 .9 -2.675l.169 -.305" /><path d="M6.907 4.579a8.954 8.954 0 0 1 3.093 -1.356" /><path d="M12 9v6" /><path d="M15 12l-3 3l-3 -3" /></svg>

                    </span>
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
                                <input class="form-control" id="g_subject" placeholder="...">
                            </div>
                            <div class="col-md-4 d-flex flex-column justify-content-end">
                                <label class="form-label" for="subject_code">Subject Number</label>
                                <input id="subject_code" class="form-control" placeholder="Subject Code"> <!-- To add: Advanced Selector -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 ms-3">
                        <label class="form-label" for="year_and_section">Year & Section</label>
                        <input class="form-control" id="year_and_section" placeholder="Year & Section">
                    </div>
                    <div class="col-md-1">
                        <label class="form-label" for="g_subject_units">Units</label>
                        <input class="form-control" id="g_subject_units" placeholder="Units">
                    </div>
                </div>

                <div class="d-flex flex-row gap-3 mt-3">

                    <div class="col-lg-2">
                        <label class="form-label" for="block_time">Time</label>
                        <input class="form-control" id="block_time" placeholder="_:__ AM/PM - _:__ AM/PM">
                    </div>
                    <div class="col-lg-3">
                        <label class="form-label" for="block_room">Room</label>
                        <input class="form-control" id="block_room" placeholder="ACAD 103">
                    </div>
                    <div class="col-lg-3">
                        <label class="form-label" for="g_subject_semester">Semester</label>
                        <select type="text" class="form-control" id="g_subject_semester" value="">
                            <option value="" disabled selected>Select Semester</option>
                            <option value="1st Semester">1st Semester</option>
                            <option value="2nd Semester">2nd Semester</option>
                            <option value="Summer">Summer</option>
                        </select>
                    </div>
                    <div class="col-lg-3">
                        <label class="form-label" for="school_year">School Year</label>
                        <input class="form-control" id="school_year" placeholder="2021-2022">
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<div class="col-md-12 mb-3">

    <div class="card col-md-12">
        <div class="card-header">
            <div class="flex-row me-auto">
                <div class="input-icon">
                    <input id="students_gradesheet_searchbar" class="form-control" placeholder="Search…">
                    <span class="input-icon-addon">
                      <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path><path d="M21 21l-6 -6"></path></svg>
                    </span>
                  </div>
            </div>
        </div>
        <div class="card-body">

            <div class="table-responsive">

                <table id="studentsTable" class="table card-table table-vcenter text-nowrap datatable">

                    <thead>

                        <tr>

                            <th>Student Number</th>
                            <th>Student Name</th>
                            <th class="text-center">Program</th>
                            <th class="text-center">Curriculum</th>
                            <th class="text-center">Actions</th>
                            <th hidden>id</th>

                        </tr>

                    </thead>

                    <tbody>

                        @foreach ($students as $student)

                            <tr>

                                <td>{{ $student->student_number }}</td>
                                <td>{{ $student->student_lname }}, {{ $student->student_fname }} {{ $student->student_mname }}</td>
                                <td class="text-center">{{ $student->student_program }}</td>
                                <td class="text-center">{{ $student->student_curriculum }}</td>
                                <td class="d-flex flex-row justify-content-center">
                                    <button id="addStudent" class="btn btn-warning">Add</button>
                                </td>
                                <td hidden>{{ $student->id }}</td>

                            </tr>

                        @endforeach

                    </tbody>
                </table>

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
                            <th class="text-center">Actions</th>
                            <th hidden>id</th>

                        </tr>

                    </thead>

                    <tbody></tbody>

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

        $(document).ready(function () {

            var students_table = $('#studentsTable').DataTable({
                paging: true,        // Enable paging
                pageLength: 5,       // Set the limit to 5 entries per page
                info: false,         // Hide info (optional)
                lengthChange: false  // Hide the options for choosing page length
            });

            $('#studentsTable_paginate').hide();

            // Hide table rows initially
            students_table.rows().nodes().to$().hide();

            $('#students_gradesheet_searchbar').keyup(function() {
                students_table.search(this.value).draw();
            });

            $('#students_gradesheet_searchbar').on('input', function() {
                if (this.value) {
                    students_table.search(this.value).draw();
                    students_table.rows({ filter: 'applied' }).nodes().to$().show();
                } else {
                    students_table.search('').draw();
                    students_table.rows().nodes().to$().hide();
                }
            });

            $('#studentsTable tbody').html('<tr class="no-data"><td colspan="5" class="text-center">Search to view student record/s</td></tr>');

            students_table.on('draw', function() {
                if (students_table.rows({ filter: 'applied' }).data().length === 0) {
                    $('#studentsTable tbody').html('<tr class="no-data"><td colspan="5" class="text-center">Search to view student record/s</td></tr>');
                } else {
                    // Remove the placeholder message if data is displayed
                    $('#studentsTable tbody .no-data').remove();
                }
            });

            $('#studentsTable_paginate').hide();

            $('.dataTables_filter').hide();

            // end Datatable initialization

            //Repeater
            let count = 0;

            $(document).on('click', '#addStudent', function() {

                count++;

                let row = $(this).closest("tr")
                let student_number = $(row.find("td")[0]).text();
                let student_name = $(row.find("td")[1]).text();
                let student_id = $(row.find("td")[5]).text();

                let newRow = `
                    <tr>
                        <td>${student_number}</td>
                        <td>${student_name}</td>
                        <td class="text-center">
                            <input class="form-control text-center firstgrading">
                        </td>
                        <td class="text-center">
                            <input class="form-control text-center secondgrading">
                        </td>
                        <td class="text-center">
                            <input class="form-control text-center finalgrading">
                        </td>
                        <td class="text-center remarks">
                            <div>
                                <select name="curriculum" class="form-control">
                                <option value="Passed">Passed</option>
                                <option value="Passed">Failed</option>
                                <option value="Withdrawn">Withdrawn</option>
                                <option value="INC">INC</option>
                                </select>
                            </div>
                        </td>
                        <td class="d-flex flex-row justify-content-center">
                            <button id="removeBtn" class="btn btn-danger">Remove</button>
                        </td>
                        <td hidden>${student_id}</td>
                    </tr>
                `;

                $('#studentsGradesheetTable tbody').append(newRow);

                $('#count').text(count);
            });

            $(document).on('click', '#removeBtn', function() {
                count--;
                $(this).closest("tr").remove();

                $('#count').text(count);
            });

            //Advanced Select Tag
            var el = $('#g_subject')[0];
            var eg = $('#g_subject_semester')[0];
            var ef = $('#subject_code')[0];

            if (window.TomSelect) {
            new TomSelect(el, {
                copyClassesToDropdown: false,
                dropdownParent: 'body',
                controlInput: '<input>',
                render: {
                    item: function(data, escape) {
                        if (data.customProperties) {
                            return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
                        }
                        return '<div>' + escape(data.text) + '</div>';
                    },
                    option: function(data, escape) {
                        if (data.customProperties) {
                            return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
                        }
                        return '<div>' + escape(data.text) + '</div>';
                    },
                },
                options: [
                    @foreach($subjects as $subject)
                        { value: '{{ $subject->subject_description }}', text: '{{ $subject->subject_description }}' },
                    @endforeach
                ]
            });
        }

         if (window.TomSelect) {
             new TomSelect(eg, {
                 copyClassesToDropdown: false,
                 dropdownParent: 'body',
                 controlInput: '<input>',
                 render: {
                     item: function (data, escape) {
                         if (data.customProperties) {
                             return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
                         }
                         return '<div>' + escape(data.text) + '</div>';
                     },
                     option: function (data, escape) {
                         if (data.customProperties) {
                             return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
                         }
                         return '<div>' + escape(data.text) + '</div>';
                     },
                 },
             });
         }

            //End Advanced Select Tag


            $(document).on('change', '#select-course', function (){

                var code = $('#select-course').find('option:selected').val()

                $('#code_number').val(code);

            });

            $(document).on('click', '#for-checking-btn', function () {

                // Collecting form data from fields outside the table
                // let course = $('#select-course').find('option:selected').text();
                let g_subject = $('#g_subject').val();
                let subject_code = $('#subject_code').val();
                let year_and_section = $('#year_and_section').val();
                let g_subject_units = $('#g_subject_units').val();
                let block_time = $('#block_time').val();
                let block_room = $('#block_room').val();
                let g_subject_semester = $('#g_subject_semester').find('option:selected').val();
                let school_year = $('#school_year').val();
                let g_status = 'For Checking';

                // Array to store students' grades
                let students_in_gradesheet = [];

                // Collecting data from each row in the students table
                $('#studentsGradesheetTable tbody tr').each(function() {
                    let row = $(this);

                    let id = $(row.find("td")[7]).text();
                    let firstGradeValue = row.find('.firstgrading').val();
                    let secondGradeValue = row.find('.secondgrading').val();
                    let finalGradeValue = row.find('.finalgrading').val();
                    let remarksValue = row.find('.remarks select').val();

                    // Append the student data to the array
                    students_in_gradesheet.push({
                        id: id,
                        firstGrade: firstGradeValue,
                        secondGrade: secondGradeValue,
                        finalGrade: finalGradeValue,
                        remarks: remarksValue
                    });
                });

                // Create FormData object to prepare for AJAX
                let formData = new FormData();
                formData.append('g_subject', g_subject);
                formData.append('subject_code', subject_code);
                formData.append('year_and_section', year_and_section);
                formData.append('g_subject_units', g_subject_units);
                formData.append('block_time', block_time);
                formData.append('block_room', block_room);
                formData.append('g_subject_semester', g_subject_semester);
                formData.append('school_year', school_year);
                formData.append('students', JSON.stringify(students_in_gradesheet));  // Add students as JSON
                formData.append('g_status', g_status);

                for (let pair of formData.entries()) {
                    console.log(pair[0]+ ': ' + pair[1]);
                }

                // AJAX request to submit the data
                $.ajax({
                    url: '{{ route("gradesheets.store") }}',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  // Adding CSRF token manually
                    },
                    success: function(response) {

                        Swal.fire({
                            title: 'Success!',
                            text: 'Gradesheet added successfully',
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

                        Swal.fire({
                            title: 'Oops!',
                            text: 'Error adding gradesheet :(',
                            icon: 'error',
                            confirmButtonText: 'Continue'
                        }).then((result) => {

                            window.location.reload();

                        });

                    }
                });
            });

            $(document).on('click', '#save-temp-btn', function () {

                // Collecting form data from fields outside the table
                // let course = $('#select-course').find('option:selected').text();
                let g_subject = $('#g_subject').val();
                let subject_code = $('#subject_code').val();
                let year_and_section = $('#year_and_section').val();
                let g_subject_units = $('#g_subject_units').val();
                let block_time = $('#block_time').val();
                let block_room = $('#block_room').val();
                let g_subject_semester = $('#g_subject_semester').find('option:selected').val();
                let school_year = $('#school_year').val();
                let g_status = 'Unfinished';

                // Array to store students' grades
                let students_in_gradesheet = [];

                // Collecting data from each row in the students table
                $('#studentsGradesheetTable tbody tr').each(function() {
                    let row = $(this);

                    let id = $(row.find("td")[7]).text();
                    let firstGradeValue = row.find('.firstgrading').val();
                    let secondGradeValue = row.find('.secondgrading').val();
                    let finalGradeValue = row.find('.finalgrading').val();
                    let remarksValue = row.find('.remarks select').val();

                    // Append the student data to the array
                    students_in_gradesheet.push({
                        id: id,
                        firstGrade: firstGradeValue,
                        secondGrade: secondGradeValue,
                        finalGrade: finalGradeValue,
                        remarks: remarksValue
                    });
                });

                // Create FormData object to prepare for AJAX
                let formData = new FormData();
                formData.append('g_subject', g_subject);
                formData.append('subject_code', subject_code);
                formData.append('year_and_section', year_and_section);
                formData.append('g_subject_units', g_subject_units);
                formData.append('block_time', block_time);
                formData.append('block_room', block_room);
                formData.append('g_subject_semester', g_subject_semester);
                formData.append('school_year', school_year);
                formData.append('students', JSON.stringify(students_in_gradesheet));  // Add students as JSON
                formData.append('g_status', g_status);

                for (let pair of formData.entries()) {
                    console.log(pair[0]+ ': ' + pair[1]);
                }

                // AJAX request to submit the data
                $.ajax({
                    url: '{{ route("gradesheets.store") }}',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  // Adding CSRF token manually
                    },
                    success: function(response) {

                        Swal.fire({
                            title: 'Success!',
                            text: 'Gradesheet added successfully',
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

                        Swal.fire({
                            title: 'Oops!',
                            text: 'Error adding gradesheet :(',
                            icon: 'error',
                            confirmButtonText: 'Continue'
                        }).then((result) => {

                            window.location.reload();

                        });

                    }
                });
                });

        });

    </script>

@endsection
