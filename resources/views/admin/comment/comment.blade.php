@extends('admin.layout')
@section('admin')
<main id="main" class="main">

    <div class="pagetitle">
      <div class="">
        <h1>All Categories</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Categories</li>
          </ol>
        </nav>
      </div>
      <a href="{{route('admin.addcategory')}}" class="btn btn-primary"> <i class="bx bx-plus"></i> Add New Category</a>
    </div><!-- End Page Title -->

    @include('admin.include.message')

    <section class="section dashboard">
      <div class="row">
        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">
          
            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">
                <div class="card-body">
                  <div class="col-12 d-flex justify-between m-2">
                    <h5 class="card-title">All Comments</span></h5>          
                  </div>

                  <div class="table-responsive"> 
                    <table id="example" class="table table-striped table-hover" style="width:100%">
                      <thead>
                          <tr>
                              <th>#</th>
                              <th>Commenter Name</th>
                              <th>Commenter Email</th>
                              <th>Comment Message</th>
                              <th>Post Title</th>
                              <th>Actions</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($comments as $key => $comment)                            
                          <tr>
                            <th scope="row"><a href="#"> {{$key+1}} </a></th>
                            <td>{{ $comment->user_id == null ? $comment->username : $comment->user->name }}</td>
                            <td>{{ $comment->user_id == null ? $comment->email : $comment->user->email }}</td>
                            <td>{{ Illuminate\Support\Str::limit($comment->message, 50, '...') }}</td>
                            <td>{{ Illuminate\Support\Str::limit($comment->post->title, 50, '...') }}</td>
                            
                            <td>
                                <a href="{{ route('admin.editcomment',[$comment->id])}}" class="btn btn-info mb-2">Edit</a>
                                <a href="{{ route('admin.deletecomment',$comment->id) }}" id="deletepropertytype" class="btn btn-danger">Delete</a>
                            </td>
                          </tr>                             
                        @endforeach
                                               
                      </tbody>
                      <tfoot>
                          <tr>
                            <th>#</th>
                              <th>Commenter Name</th>
                              <th>Commenter Email</th>
                              <th>Comment Message</th>
                              <th>Post Title</th>
                              <th>Actions</th>
                          </tr>
                      </tfoot>
                  </table>    
                  </div>
                 
                </div>

              </div>
            </div><!-- End Recent Sales -->
          </div>
        </div><!-- End Left side columns -->

      </div>
    </section>

  </main><!-- End #main -->

@endsection