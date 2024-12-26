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

                <a id="update_gradesheet" class="btn btn-success">
                    <span>
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-file-type-pdf"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M5 12v-7a2 2 0 0 1 2 -2h7l5 5v4" /><path d="M5 18h1.5a1.5 1.5 0 0 0 0 -3h-1.5v6" /><path d="M17 18h2" /><path d="M20 15h-3v6" /><path d="M11 15v6h1a2 2 0 0 0 2 -2v-2a2 2 0 0 0 -2 -2h-1z" /></svg>                    </span>
                    <span>Save</span>
                </a>

            </div>

        </div>

        <div class="card-body">

            <div class="col-md-12">
                <div class="d-flex flex-row gap-3">
                    <div class="col-md-6">
                        <div class="d-flex flex-row gap-3">
                            <div class="col-md-8">
                                <label class="form-label" for="select-users">Subject Description</label>
                                <input type="text" class="form-control" id="edit_subjectDescription" value="{{$gradesheet->course}}">

                            </div>
                            <div class="col-md-4 d-flex flex-column justify-content-end">
                                <label class="form-label" for="code_number">Code Number</label>
                                <input id="code_number" class="form-control" disabled placeholder="Code Number" value="" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 ms-3">
                        <label class="form-label" for="year-section">Year & Section</label>
                        <input class="form-control" id="edit_yearSection" placeholder="Year & Section" value="{{ $gradesheet->year_and_section }}">
                    </div>
                    <div class="col-md-1">
                        <label class="form-label" for="units">Units</label>
                        <input class="form-control" id="edit_units" placeholder="Units" value="{{ $gradesheet->units }}">
                    </div>
                </div>

                <div class="d-flex flex-row gap-3 mt-3">
                    <div class="col-lg-2">
                        <label class="form-label" for="time">Time</label>
                        <input class="form-control" id="edit_time" placeholder="_:__ AM/PM - _:__ AM/PM" value="{{ $gradesheet->time }}">
                    </div>
                    <div class="col-lg-3">
                        <label class="form-label" for="room">Room</label>
                        <input class="form-control" id="edit_room" placeholder="ACAD 103" value="{{ $gradesheet->room }}">
                    </div>
                    <div class="col-lg-3">
                        <label class="form-label" for="select-semester" >Semester</label>
                        <select type="text" class="form-control" id="edit_semester">
                            <option value="" disabled {{ !$gradesheet->semester ? 'selected' : '' }}>Select Semester</option>
                            <option value="1st Semester" {{ $gradesheet->semester === '1st Semester' ? 'selected' : '' }}>1st Semester</option>
                            <option value="2nd Semester" {{ $gradesheet->semester === '2nd Semester' ? 'selected' : '' }}>2nd Semester</option>
                            <option value="Summer" {{ $gradesheet->semester === 'Summer' ? 'selected' : '' }}>Summer</option>
                        </select>
                    </div>
                    <div class="col-lg-3">
                        <label class="form-label" for="edit_schoolYear">School Year</label>
                        <input class="form-control" id="edit_schoolYear" placeholder="2021-2022" value="{{ $gradesheet->school_year }}">
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
        let course = $("#edit_subjectDescription").val();
        let yearSection = $("#edit_yearSection").val();
        let units = $("#edit_units").val();
        let time = $("#edit_time").val();
        let room = $("#edit_room").val();
        let semester = $("#edit_semester").val();
        let schoolYear = $("#edit_schoolYear").val();

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
            course: course,
            yearSection: yearSection,
            units: units,
            time: time,
            room: room,
            semester: semester,
            schoolYear: schoolYear,
            students: students_in_gradesheet
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
