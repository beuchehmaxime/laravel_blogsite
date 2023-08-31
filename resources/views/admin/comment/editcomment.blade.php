@extends('admin.layout')

@section('admin') 
 
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Edit {{$comment->username}} Post </h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item active">Edit {{$comment->username}} Post </li>
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
              <h5 class="card-title">Edit {{$comment->username}} Comment on <a href="{{route('post',$comment->post->id)}}" target="_blank" rel="noopener noreferrer">View Post</a> </h5>

              <!-- General Form Elements -->
              <form method="POST" action="{{route('admin.comment.update',$comment->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
               
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Comment Message</label>
                    <div class="col-sm-10">
                       <textarea name="comment_message" id="comment_message" class="form-control  @error('comment_message') is-invalid @enderror" cols="30" rows="10" placeholder="">{{$comment->message}}</textarea>
                    </div>
                    @error('comment_message')
                    <div class="text-danger">{{$message}}</div>                      
                  @enderror
                  </div>

                <div class="row mb-3">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Update Posts</button>
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