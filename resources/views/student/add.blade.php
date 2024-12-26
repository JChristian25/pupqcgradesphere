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
                <a href="{{ route('students') }}" class="btn btn-secondary">
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
                <label class="form-label" for="lastname">Student No.</label>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <input class="form-control" name="student_number" placeholder="2021-00027-CM-0">
                    </div>
                </div>

                <label class="form-label" for="lastname">Student Name</label>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <input class="form-control" name="firstname" placeholder="First Name">
                    </div>
                    <div class="col-md-4">
                        <input class="form-control" name="middlename" placeholder="Middle Name/Initial">
                    </div>
                    <div class="col-md-4">
                        <input class="form-control" name="lastname" placeholder="Last Name">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-label">Course</div>
                        <input class="form-control" name="course" placeholder="Course">

                        {{-- <select name="course" class="form-control">
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                        </select> --}}
                    </div>

                    <div class="col-md-6">
                        <div class="form-label">Curriculum</div>
                        <input class="form-control" name="curriculum" placeholder="Curriculum">
                        {{-- <select name="curriculum" class="form-control">
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                        </select> --}}
                    </div>
                </div>

                <div>
                    <button type="submit" class="btn btn-primary">
                        <span>
                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-user-plus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" /><path d="M16 19h6" /><path d="M19 16v6" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4" /></svg>
                        </span>
                        <span>
                            Add
                        </span>
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
