@extends('layouts.app')

@section('header')
<div class="page-header d-print-none mt-5">
    <div class="container-xl">
      <div class="row g-2 align-items-center">
        <div class="col">
          <!-- Page pre-title -->
          <div class="page-pretitle">
            Courses
          </div>
          <h2 class="page-title">
            Add Courses
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

        <div class="card-body border-bottom py-3">
          <form method="POST" action="{{ route('course.store') }}" novalidate>
              @csrf
              <div class="flex gap-1 my-2">
                  <div class="col-md-4">
                      <label class="form-label" for="course_code">Course Code</label>
                      <input type="text" name="course_code" class="form-control" id="course_code" placeholder="e.g. GEED 004">
                  </div>
                  
                  <div class="col-md-3">
                      <label class="form-label" for="course_description">Description</label>
                      <input type="text" name="course_description" class="form-control" id="course_description" placeholder="Description">
                  </div>
              </div>
              <div>
                <button type="submit" class="btn btn-primary">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user-plus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" /><path d="M16 19h6" /><path d="M19 16v6" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4" /></svg>
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

@endsection