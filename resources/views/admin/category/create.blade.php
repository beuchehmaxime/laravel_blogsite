@extends('admin.layout')

@section('admin') 
 
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Add New Category </h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item active">Add New Category </li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    @include('admin.include.message')

    <section class="section">
      <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Add New Category </h5>

              <!-- General Form Elements -->
              <form method="POST" action="{{route('admin.insertCategory')}}">
                @csrf
                <div class="row mb-3">

                  <label for="inputText" class="col-sm-2 col-form-label">Category Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name"> 
                  </div>
                  @error('name')
                  <div class="text-danger">{{$message}}</div>                      
                @enderror
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Category Icon</label>
                  <div class="col-sm-10">
                    <input type="text" name="icon" class="form-control @error('icon') is-invalid @enderror" id="icon">
                  </div>
                  @error('icon')
                      <div class="text-danger">{{$message}}</div>                      
                  @enderror 
                </div>
               
                <div class="row mb-3">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Add Category</button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>
        </div>
        <div class="col-lg-2"></div>
      </div>
    </section>

  </main><!-- End #main -->

@endsection