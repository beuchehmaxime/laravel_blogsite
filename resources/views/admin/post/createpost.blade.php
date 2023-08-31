@extends('admin.layout')

@section('admin') 
 
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Add New Post </h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item active">Add New Post </li>
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
              <h5 class="card-title">Add New Post </h5>

              <!-- General Form Elements -->
              <form method="POST" action="{{route('posts.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Post title</label>
                  <div class="col-sm-10">
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title"> 
                  </div>
                  @error('title')
                  <div class="text-danger">{{$message}}</div>                      
                @enderror
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Post Photo</label>
                  <div class="col-sm-10">
                    <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror" id="photo"> 
                  </div>
                  @error('photo')
                  <div class="text-danger">{{$message}}</div>                      
                @enderror
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Post Category</label>
                  <div class="col-sm-10">
                    <select name="category_id" id="category_id" class="form-control  @error('category_id') is-invalid @enderror">
                        <option value="#">Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}"> {{$category->name}} </option>
                        @endforeach
                    </select>
                  </div>
                  @error('category_id')
                  <div class="text-danger">{{$message}}</div>                      
                @enderror
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Post Description</label>
                  <div class="col-sm-10">
                      <textarea name="description" id="description" class="form-control  @error('description') is-invalid @enderror" cols="30" rows="10" placeholder="Enter post description here"></textarea>
                  </div>
                  @error('description')
                  <div class="text-danger">{{$message}}</div>                      
                @enderror
                </div>
                <div class="d-flex justify-between mt-4">
                  <div class="row mb-5 ml-3" style="margin-right: 2rem; margin-left: 3rem">
                    <div class="form-check">
                      <label class="form-check-label" for="gridCheck1">
                        Featured Product
                      </label>
                      <input class="form-check-input" type="checkbox" id="gridCheck1" name="featured_post" value="1">                   
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="form-check">
                      <label class="form-check-label" for="gridCheck">
                        Popular Product
                      </label>
                      <input class="form-check-input" type="checkbox" id="gridCheck" name="popular_post" value="1">                   
                    </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Add Posts</button>
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