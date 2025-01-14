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
                    View Gradesheet
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

            <div class="ms-auto">

                <a href="{{ route('gradesheet.generate', ['id' => $gradesheet->id]) }}" class="btn btn-success ms-auto d-flex items-center">
                    <span>
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-file-type-pdf"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M5 12v-7a2 2 0 0 1 2 -2h7l5 5v4" /><path d="M5 18h1.5a1.5 1.5 0 0 0 0 -3h-1.5v6" /><path d="M17 18h2" /><path d="M20 15h-3v6" /><path d="M11 15v6h1a2 2 0 0 0 2 -2v-2a2 2 0 0 0 -2 -2h-1z" /></svg>                    </span>
                    <span>Generate PDF</span>
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
                                <input class="form-control" id="g_subject" value="{{ $gradesheet->g_subject }}" disabled>
                            </div>
                            <div class="col-md-4 d-flex flex-column justify-content-end">
                                <label class="form-label" for="subject_code">Subject Number</label>
                                <input id="subject_code" class="form-control" value="{{ $gradesheet->g_subject_code }}" disabled> <!-- To add: Advanced Selector -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 ms-3">
                        <label class="form-label" for="year_and_section">Year & Section</label>
                        <input class="form-control" id="year_and_section" value="{{ $gradesheet->year_and_section }}" disabled>
                    </div>
                    <div class="col-md-1">
                        <label class="form-label" for="g_subject_units">Units</label>
                        <input class="form-control" id="g_subject_units" value="{{ $gradesheet->g_subject_units }}" disabled>
                    </div>
                </div>

                <div class="d-flex flex-row gap-3 mt-3">

                    <div class="col-lg-2">
                        <label class="form-label" for="block_time">Time</label>
                        <input class="form-control" id="block_time" value="{{ $gradesheet->block_time }}" disabled>
                    </div>
                    <div class="col-lg-3">
                        <label class="form-label" for="block_room">Room</label>
                        <input class="form-control" id="block_room" value="{{ $gradesheet->block_room }}" disabled>
                    </div>
                    <div class="col-lg-3">
                        <label class="form-label" for="select-semester" >Semester</label>
                        <select type="text" class="form-control" id="select-semester" disabled>
                            <option value="" disabled {{ !$gradesheet->g_subject_semester ? 'selected' : '' }}>Select Semester</option>
                            <option value="1st Semester" {{ $gradesheet->g_subject_semester === '1st Semester' ? 'selected' : '' }}>1st Semester</option>
                            <option value="2nd Semester" {{ $gradesheet->g_subject_semester === '2nd Semester' ? 'selected' : '' }}>2nd Semester</option>
                            <option value="Summer" {{ $gradesheet->g_subject_semester === 'Summer' ? 'selected' : '' }}>Summer</option>
                        </select>
                    </div>
                    <div class="col-lg-3">
                        <label class="form-label" for="school_year">School Year</label>
                        <input class="form-control" id="school_year" value="{{ $gradesheet->school_year }}" disabled>
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
                                <td>{{ $student->student_lname }}, {{ $student->student_fname }} {{ $student->student_mname }}</td>
                                <td class="text-center">
                                    <input class="form-control text-center firstgrading" value="{{ $student->first_grading }}" disabled>
                                </td>
                                <td class="text-center">
                                    <input class="form-control text-center secondgrading" value="{{ $student->second_grading }}" disabled>
                                </td>
                                <td class="text-center col-sm-2">
                                    <input class="form-control text-center finalgrading" value="{{ $student->final_rating }}" disabled>
                                </td>
                                <td class="text-center remarks">
                                    <input class="form-control text-center" value="{{ $student->remarks }}" disabled>
                                </td>
                                <td hidden></td>
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

        $(document).ready(function (){

                        //Advanced Select Tag
            var el = $('#select-course')[0];
            var eg = $('#select-semester')[0];

            if (window.TomSelect) {
                new TomSelect(el, {
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

        });

    </script>


    <script>
        $(document).ready(function () {

            $('#code_number').val($('#select-course').find('option:selected').val());

        });
    </script>

@endsection
