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
            Gradesheets
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

            <div class="flex-row ms-auto">

                <a href="{{ route('gradesheets.add') }}" class="btn btn-primary ms-auto">
                    <span>
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-file-description"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" /><path d="M9 17h6" /><path d="M9 13h6" /></svg>                    </span>
                    <span>Add Gradesheet</span>
                </a>

            </div>

        </div>

        <div class="card-body border-bottom py-3">

            <div class="table-responsive">

                <table id="gradesheetTable" class="table card-table table-vcenter text-nowrap datatable">

                    <thead>

                        <tr>

                            <th>Course</th>
                            <th>Year and Section</th>
                            <th class="text-center">Semester</th>
                            <th class="text-center">School Year</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Actions</th>
                            <th hidden>id</th>

                        </tr>

                    </thead>

                    <tbody>

                        @foreach ($gradesheets as $gradesheet)


                            <tr>

                                <td>{{ $gradesheet->course }}</td>
                                <td>{{ $gradesheet->year_and_section }}</td>
                                <td class="text-center">{{ $gradesheet->semester }}</td>
                                <td class="text-center">{{ $gradesheet->school_year }}</td>
                                <td class="text-center">{{ $gradesheet->status }}</td> <!-- Status Here -->
                                <td class="col-sm-1 gap-3">
                                    <button id="viewBtn" class="btn btn-secondary"><i class="fas fa-eye"></i></button>
                                    <button id="editBtn" class="btn btn-secondary"><i class="fas fa-edit"></i></button>

                                    <a id="generatePDF" class="btn btn-success">
                                        <i class="fas fa-file-pdf"></i>
                                        {{-- <span>
                                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-file-type-pdf"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M5 12v-7a2 2 0 0 1 2 -2h7l5 5v4" /><path d="M5 18h1.5a1.5 1.5 0 0 0 0 -3h-1.5v6" /><path d="M17 18h2" /><path d="M20 15h-3v6" /><path d="M11 15v6h1a2 2 0 0 0 2 -2v-2a2 2 0 0 0 -2 -2h-1z" /></svg>                    </span> --}}
                                            {{-- <span>Generate PDF</span> --}}
                                    </a>
                                </td>
                                <td hidden>{{ $gradesheet->id }}</td>

                            </tr>

                        @endforeach

                    </tbody>
                </table>

            </div>

        </div>

    </div>

</div>

@endsection

@section('scripts')

    <script>


        var gradesheet_table = $('#gradesheetTable').DataTable({
            paging: true,        // Enable paging
            pageLength: 5,       // Set the limit to 5 entries per page
            info: false,         // Hide info (optional)
            lengthChange: false  // Hide the options for choosing page length
        });

        $('.dataTables_filter').hide();

        $('#gradesheetTable_paginate').hide();


        $('#gradesheet_searchbar').keyup(function() {
            gradesheet_table.search(this.value).draw();
        });

        $(document).on('click', '#viewBtn', function () {
            // Get the ID from the 6th column (0-based index, so it's index 5)
            var id = $(this).closest("tr").find("td").eq(6).text().trim();

            // Construct the route URL using JavaScript string concatenation
            var url = "{{ route('gradesheets.show', ':id') }}".replace(':id', id);

            // Redirect to the constructed URL
            window.location.href = url;
        });

        $(document).on('click', '#editBtn', function () {
            var id = $(this).closest("tr").find("td").eq(6).text().trim();
            var url = "{{ route('gradesheet.edit', ':id') }}".replace(':id', id);
            window.location.href = url;
        });

    </script>

@endsection
