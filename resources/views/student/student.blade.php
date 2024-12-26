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

            <div class="flex-row ms-auto">

                <a href="{{ route('students.add') }}" class="btn btn-primary ms-auto">
                    <span>
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-user-plus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" /><path d="M16 19h6" /><path d="M19 16v6" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4" /></svg>
                    </span>
                    <span>Add Student</span>
                </a>

                <button class="btn btn-warning ms-auto" data-bs-toggle="modal" data-bs-target="#importxlsx">
                    <span>
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-file-type-csv"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M5 12v-7a2 2 0 0 1 2 -2h7l5 5v4" /><path d="M7 16.5a1.5 1.5 0 0 0 -3 0v3a1.5 1.5 0 0 0 3 0" /><path d="M10 20.25c0 .414 .336 .75 .75 .75h1.25a1 1 0 0 0 1 -1v-1a1 1 0 0 0 -1 -1h-1a1 1 0 0 1 -1 -1v-1a1 1 0 0 1 1 -1h1.25a.75 .75 0 0 1 .75 .75" /><path d="M16 15l2 6l2 -6" /></svg>                    </span>
                    <span>Import XLSX</span>
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
                                <td>{{ $student->last_name }}, {{ $student->first_name }} {{ $student->middle_name }}</td>
                                <td class="text-center">{{ $student->program }}</td>
                                <td class="text-center">{{ $student->curriculum }}</td>
                                <td class="d-flex flex-row justify-content-center">
                                    <button class="btn btn-secondary">View</button>
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
        var students_table = $('#studentsTable').DataTable({
            paging: true,        // Enable paging
            pageLength: 5,       // Set the limit to 5 entries per page
            info: false,         // Hide info (optional)
            lengthChange: false  // Hide the options for choosing page length
        });

        $('#studentsTable_paginate').hide();

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
        $('#import-btn').on('click', function() {
            $('#import-progress').show();
            importFile().done(function() {
                $('#import-progress').hide();
            });
        });

        // Simulated import function to mimic file processing delay
        function importFile() {
            return $.Deferred(function(deferred) {
                setTimeout(function() {
                    deferred.resolve();
                }, 2000); // Simulate a 2-second delay for file import
            }).promise();
        }

    });

</script>

@endsection
