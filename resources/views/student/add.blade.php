@extends('layouts.app')

@section('header')
<div class="page-header d-print-none mt-5">
    <div class="container-xl">
        <div class="d-flex flex-row">
            <div class="row g-2 align-items-center">
                <div class="col">
                  <!-- Page pre-title -->
                  <div class="page-pretitle">
                    Students
                  </div>
                  <h2 class="page-title">
                    Add Student
                  </h2>
                </div>
                <!-- Page title actions -->
              </div>
              <div class="ms-auto">
                <a href="{{ route('students') }}" class="btn btn-secondary ms-auto d-flex items-center">
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

  <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('students.store') }}" novalidate>
                @csrf

                <div class="row g-3 mb-3">
                    <div class="col-md-4">
                        <label class="form-label" for="student_number">Student Number</label>
                        <input type="text" name="student_number" class="form-control" id="student_number" placeholder="e.g. 2024-00609-CM-0">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="student_fname">First Name</label>
                        <input type="text" name="student_fname" class="form-control" id="student_fname" placeholder="First Name">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="student_lname">Last Name</label>
                        <input type="text" name="student_lname" class="form-control" id="student_lname" placeholder="Last Name">
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-4">
                        <label class="form-label" for="student_mname">Middle Name</label>
                        <input type="text" name="student_mname" class="form-control" id="student_mname" placeholder="Middle Name">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="student_suffix">Suffix</label>
                        <input type="text" name="student_suffix" class="form-control" id="student_suffix" placeholder="Suffix">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="student_program">Program</label>
                        <input type="text" name="student_program" class="form-control" id="student_program" placeholder="Program">
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label" for="student_curriculum">Curriculum</label>
                        <input type="text" name="student_curriculum" class="form-control" id="student_curriculum" placeholder="Curriculum">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="has_goodmoral">Has Good Moral</label>
                        <input type="text" name="has_goodmoral" class="form-control" id="has_goodmoral" placeholder="Has Good Moral?">
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-4">
                        <label class="form-label" for="has_hscard">Has High School Card</label>
                        <input type="text" name="has_hscard" class="form-control" id="has_hscard" placeholder="Yes/No">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="honorable_dismissal">Honorable Dismissal</label>
                        <input type="text" name="honorable_dismissal" class="form-control" id="honorable_dismissal" placeholder="Yes/No">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="with_diploma">With Diploma</label>
                        <input type="text" name="with_diploma" class="form-control" id="with_diploma" placeholder="Yes/No">
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-4">
                        <label class="form-label" for="has_birthcert">Has Birth Certificate</label>
                        <select name="has_birthcert" class="form-select" id="has_birthcert">
                            <option selected>Open this select menu</option>
                            <option value="None">None</option>
                            <option value="Xerox">Xerox</option>
                            <option value="Original">Original</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="has_f137">Has f137</label>
                        <select name="has_f137" class="form-select" id="has_f137">
                            <option selected>Open this select menu</option>
                            <option value="None">None</option>
                            <option value="Transferee">Transferee</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="with_tor">With TOR?</label>
                        <select name="with_tor" class="form-select" id="with_tor">
                            <option selected>Open this select menu</option>
                            <option value="None">None</option>
                            <option value="Graduate">Graduate</option>
                            <option value="Undergraduate">Undergraduate</option>
                        </select>
                    </div>
                </div>

                <div class="text-end mt-4">
                    <button type="submit" class="btn btn-primary ms-auto d-flex items-center">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user-plus">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                <path d="M16 19h6" />
                                <path d="M19 16v6" />
                                <path d="M6 21v-2a4 4 0 0 1 4 -4h4" />
                            </svg>
                        </span>
                        <span>Add</span>
                    </button>
                </div>
            </form>

        </div>
   </div>

  </div>

@endsection

@section('scripts')

  <script>
    $(document).ready(function (){



    });
  </script>

@endsection
