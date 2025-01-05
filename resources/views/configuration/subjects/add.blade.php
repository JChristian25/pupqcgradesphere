@extends('layouts.app')

@section('header')
<div class="page-header d-print-none mt-5">
    <div class="container-xl">
      <div class="row g-2 align-items-center">
        <div class="col">
          <!-- Page pre-title -->
          <div class="page-pretitle">
            Subjects
          </div>
          <h2 class="page-title">
            Add Subjects
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



        </div>

        <div class="card-body border-bottom py-3">
        <form method="POST" action="{{ route('subject.store') }}" novalidate>
            @csrf
            <div class="flex gap-1 my-2">
                <div class="col-md-4">
                    <label class="form-label" for="subject_code">Subject Code</label>
                    <input type="text" name="subject_code" class="form-control" id="subject_code" placeholder="COMP001">
                </div>

                <div class="col-md-3">
                    <label class="form-label" for="subject_description">Description</label>
                    <input type="text" name="subject_description" class="form-control" id="subject_description" placeholder="Computer Programming 001">
                </div>

                <div class="col-sm-1">
                    <label class="form-label" for="subject_units">Units</label>
                    <input type="text" name="subject_units" class="form-control" id="subject_units" placeholder="3.00">
                </div>
            </div>
            <div>
                <button type="submit" class="btn btn-primary d-flex items-center">
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
