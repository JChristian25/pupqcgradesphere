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
            Curriculum
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
                    <input id="gradesheet_searchbar" class="form-control" placeholder="Search…">
                    <span class="input-icon-addon">
                      <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path><path d="M21 21l-6 -6"></path></svg>
                    </span>
                  </div>
            </div>

            <div class="d-flex ms-auto">

                <!-- Add Curriculum Button -->
                <a href="{{route('curriculums.add')}}" class="btn btn-primary d-flex align-items-center me-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-2">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M14 3v4a1 1 0 0 0 1 1h4"/>
                        <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"/>
                        <path d="M9 17h6"/>
                        <path d="M9 13h6"/>
                    </svg>
                    <span>Add Curriculum</span>
                </a>

                <!-- Import XLSX Button -->
                <button class="btn btn-warning d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#importxlsx">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-2">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M14 3v4a1 1 0 0 0 1 1h4"/>
                        <path d="M5 12v-7a2 2 0 0 1 2 -2h7l5 5v4"/>
                        <path d="M7 16.5a1.5 1.5 0 0 0 -3 0v3a1.5 1.5 0 0 0 3 0"/>
                        <path d="M10 20.25c0 .414 .336 .75 .75 .75h1.25a1 1 0 0 0 1 -1v-1a1 1 0 0 0 -1 -1h-1a1 1 0 0 1 -1 -1v-1a1 1 0 0 1 1 -1h1.25a.75 .75 0 0 1 .75 .75"/>
                        <path d="M16 15l2 6l2 -6"/>
                    </svg>
                    <span>Import XLSX</span>
                </button>

            </div>


        </div>

        <div class="card-body border-bottom py-3">

            <table id="coursesTable" class="table card-table table-vcenter text-nowrap datatable">

                <thead>

                    <tr>
                      <th>Curriculum</th>
                      <th>Year</th>


                    </tr>

                </thead>

                <tbody>

                </tbody>
            </table>

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
                    <form action="{{ route('curriculum.import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="input-group mb-2">
                                <input id="file-name" class="form-control" placeholder="File" disabled>
                                <button id="upload-btn" class="btn" type="button">Upload File</button>
                            </div>
                            <input id="xlsx-file" name="file" type="file" hidden required>
                        </div>
                        <div class="progress" id="import-progress" style="display: none;">
                            <div class="progress-bar progress-bar-indeterminate bg-green"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Import</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        // Handle Upload button click
        $('#upload-btn').on('click', function() {
            $('#xlsx-file').click();
        });

        // Display selected file name
        $('#xlsx-file').on('change', function() {
            const fileName = $(this).prop('files')[0] ? $(this).prop('files')[0].name : "";
            $('#file-name').val(fileName);
        });
    });
</script>
@endsection
