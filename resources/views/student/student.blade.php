@extends('layouts.app')

@section('header')
<div class="page-header d-print-none mt-5">
    <div class="container-xl">
      <div class="row g-2 align-items-center">
        <div class="col">
          <!-- Page pre-title -->
          <div class="page-pretitle">
            Overview
          </div>
          <h2 class="page-title">
            Students
          </h2>
        </div>
        <!-- Page title actions -->
      </div>
    </div>
  </div>
@endsection

@section('content')

<div class="col-12">

    <div class="card">

        <div class="card-header">

            <div class="flex-row me-auto">
                <div class="input-icon">
                    <input id="students_searchbar" class="form-control" placeholder="Search…">
                    <span class="input-icon-addon">
                      <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path><path d="M21 21l-6 -6"></path></svg>
                    </span>
                  </div>
            </div>

            <div class="d-flex ms-auto">
                <!-- Add Button -->
                <a href="{{ route('students.add') }}" class="btn btn-primary d-flex items-center me-2" aria-label="Add Student">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-2">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"/>
                        <path d="M16 19h6"/>
                        <path d="M19 16v6"/>
                        <path d="M6 21v-2a4 4 0 0 1 4 -4h4"/>
                    </svg>
                    <span>Add</span>
                </a>



                <!-- Import Button -->
                <button class="btn btn-warning d-flex items-center" data-bs-toggle="modal" data-bs-target="#importxlsx" aria-label="Import CSV">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-2">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M14 3v4a1 1 0 0 0 1 1h4"/>
                        <path d="M5 12v-7a2 2 0 0 1 2 -2h7l5 5v4"/>
                        <path d="M7 16.5a1.5 1.5 0 0 0 -3 0v3a1.5 1.5 0 0 0 3 0"/>
                        <path d="M10 20.25c0 .414 .336 .75 .75 .75h1.25a1 1 0 0 0 1 -1v-1a1 1 0 0 0 -1 -1h-1a1 1 0 0 1 -1 -1v-1a1 1 0 0 1 1 -1h1.25a.75 .75 0 0 1 .75 .75"/>
                        <path d="M16 15l2 6l2 -6"/>
                    </svg>
                    <span>Import</span>
                </button>

            </div>

        </div>

        <div class="card-body border-bottom py-3">

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
                                <td class="d-flex flex-row justify-content-center gap-x-1">
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewStudent-{{$student->id}}"><i class="fas fa-eye"></i></button>
                                    <button class="btn btn-danger delete-student" data-student-id="{{ $student->id }}"><i class="fas fa-trash-alt"></i></button>
                                </td>
                                <td hidden>{{ $student->id }}</td>
                                <div class="modal modal-blur fade" id="viewStudent-{{$student->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-primary text-white">
                                                <h5 class="modal-title">{{$student->student_lname}}, {{$student->student_fname}} {{$student->student_mname}}</h5>
                                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row g-3">
                                                    <div class="col-md-6">
                                                        <label class="form-label fw-bold" for="student_suffix">Suffix</label>
                                                        <input type="text" class="form-control" id="student_suffix" value="{{$student->student_suffix}}" disabled>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label fw-bold" for="has_hscard">Has Highschool Card</label>
                                                        <input type="text" class="form-control" id="has_hscard" value="{{$student->has_hscard}}" disabled>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label fw-bold" for="has_goodmoral">Has Good Moral</label>
                                                        <input type="text" class="form-control" id="has_goodmoral" value="{{$student->has_goodmoral}}" disabled>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label fw-bold" for="has_birthcert">Has Birth Certificate</label>
                                                        <input type="text" class="form-control" id="has_birthcert" value="{{$student->has_birthcert}}" disabled>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label fw-bold" for="has_f137">Has f137</label>
                                                        <input type="text" class="form-control" id="has_f137" value="{{$student->has_f137}}" disabled>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label fw-bold" for="honorable_dismissal">Honorable Dismissal</label>
                                                        <input type="text" class="form-control" id="honorable_dismissal" value="{{$student->honorable_dismissal}}" disabled>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label fw-bold" for="with_tor">With TOR?</label>
                                                        <input type="text" class="form-control" id="with_tor" value="{{$student->with_tor}}" disabled>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label fw-bold" for="with_diploma">With Diploma?</label>
                                                        <input type="text" class="form-control" id="with_diploma" value="{{$student->with_diploma}}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </tr>

                        @endforeach

                    </tbody>
                </table>

            </div>

        </div>

    </div>

</div>

<div class="modal modal-blur fade" id="importxlsx" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Import XLSX</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="input-group mb-2">
                        <input id="file-name" class="form-control" placeholder="File" disabled>
                        <button id="upload-btn" class="btn" type="button">Upload File</button>
                    </div>
                    <input id="xlsx-file" type="file" hidden>
                </div>
                <div class="progress" id="import-progress" style="display: none;">
                    <div class="progress-bar progress-bar-indeterminate bg-green"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                <button id="import-btn" class="btn btn-primary">Import</button>
            </div>
        </div>
    </div>
</div>


@endsection

@section('scripts')

<script>

    $(document).ready(function (){
        // Datatable initialization
        $('.delete-student').on('click', function() {
            var studentId = $(this).data('student-id');
            var url = '{{ route("students.destroy", ":id") }}';
            url = url.replace(':id', studentId);

            if (confirm('Are you sure you want to delete this student?')) {
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        alert('Student deleted successfully.');
                        location.reload();
                    },
                    error: function(xhr) {
                        alert('An error occurred while deleting the student.');
                    }
                });
            }
        });

        var students_table = $('#studentsTable').DataTable({
            searching: true,     // Disable search functionality
            info: false,          // Disable table information (e.g., "Showing 1 to 10 of 100")
            lengthChange: false,  // Disable the option to change the page length
            pageLength: 10,       // Set the table to display 10 rows at once
            autoWidth: false,
        });

        $('.dt-search').hide();

        $('.dt-paging').hide();
        $('.dataTables_filter').hide();

        $('#students_searchbar').keyup(function() {
            students_table.search(this.value).draw();
        });
        // end Datatable initialization

        $('#upload-btn').on('click', function() {
            $('#xlsx-file').click();
        });

        // Display selected file name
        $('#xlsx-file').on('change', function() {
            const fileName = $(this).prop('files')[0] ? $(this).prop('files')[0].name : "";
            $('#file-name').val(fileName);
        });

        // Handle Import button click
        $('#import-btn').on('click', function () {
            //const file = $('#xlsx-file').prop('files')[0];
            const fileInput = $('#xlsx-file')[0];
            const file = fileInput.files && fileInput.files[0]; // Get the selected file

            if (!file) {
                alert("Please select a file before importing.");
                return;
            }

            const formData = new FormData();
            formData.append('file', file);

            $('#import-progress').show();

            $.ajax({
                url: "{{ route('students.import') }}",
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Include CSRF token
                },
                success: function (response) {
                    alert("File imported successfully!");
                    $('#import-progress').hide();
                },
                error: function (xhr, status, error) {
                    alert("An error occurred during import: " + xhr.responseText);
                    $('#import-progress').hide();
                }
            });
        });

    });

</script>

@endsection
