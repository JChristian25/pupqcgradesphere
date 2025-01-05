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
            Subjects
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

                <a href="{{route('subjects.add')}}" class="btn btn-primary ms-auto d-flex items-center">
                    <span>
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-file-description"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" /><path d="M9 17h6" /><path d="M9 13h6" /></svg>                    </span>
                    <span>Add Subjects</span>
                </a>

            </div>

        </div>

        <div class="card-body border-bottom py-3">

            <div class="table-responsive">

                <table id="coursesTable" class="table card-table table-vcenter text-nowrap datatable">

                    <thead>

                        <tr>
                          <th>Subject Code</th>
                          <th>Desription</th>
                          <th>Units</th>


                        </tr>

                    </thead>

                    <tbody>
                      @foreach ($subjects as $subject)
                        <tr>
                          <td>{{$subject->subject_code}}</td>
                          <td>{{$subject->subject_description}}</td>
                          <td>{{$subject->subject_units}}</td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>

            </div>

        </div>

    </div>
  </div>

</div>
@endsection

@section('scripts')

@endsection
