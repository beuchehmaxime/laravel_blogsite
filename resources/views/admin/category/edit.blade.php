@extends('admin.layout')

@section('admin')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Edit {{$category->name}} Category </h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item active">Edit {{$category->name}} Category </li>
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
              <h5 class="card-title">Edit {{$category->name}} Category </h5>

              <!-- General Form Elements -->
              <form method="POST" action="{{route('admin.updatecategory')}}">
                @csrf
                
                <input type="hidden" name="category_id" value="{{$category->id}}">
                <div class="row mb-3">

                  <label for="inputText" class="col-sm-2 col-form-label">Category Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$category->name}}" id="name"> 
                  </div>
                  @error('name')
                  <div class="text-danger">{{$message}}</div>                      
                @enderror
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Category Icon</label>
                  <div class="col-sm-10">
                    <input type="text" name="icon" class="form-control @error('icon') is-invalid @enderror" value="{{$category->icon}} " id="icon">
                  </div>
                  @error('icon')
                      <div class="text-danger">{{$message}}</div>                      
                  @enderror 
                </div>
               
                <div class="row mb-3">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Update Category</button>
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