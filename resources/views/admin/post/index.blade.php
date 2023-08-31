@extends('admin.layout')
@section('admin')
<main id="main" class="main">

    <div class="pagetitle">
      <div class="">
        <h1>All Posts</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Posts</li>
          </ol>
        </nav>
      </div>
      <a href="posts/create" class="btn btn-primary"> <i class="bx bx-plus"></i> Add New Post</a>
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
                    <h5 class="card-title">All Posts</span></h5>          
                  </div>

                  <div class="table-responsive"> 
                    <table id="example" class="table table-striped table-hover" style="width:100%">
                      <thead>
                          <tr>
                              <th>#</th>
                              <th>Posts Title</th>
                              <th>Posts Image</th>
                              <th>Post Category</th>
                              <th>Post Author</th>
                              <th>Featured Post</th>
                              <th>Popular Post</th>
                              <th>Actions</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($posts as $key => $type)                            
                          <tr>
                            <th scope="row"><a href="#"> {{$key+1}} </a></th>
                            <td>{{$type->title}}</td>
                            <td>
                                <img src="{{ (!empty($type->photo))? url('assets/img/posts/'.$type->photo) : url('https://via.placeholder.com/100x100')}}" alt="" srcset="" width="100px" height="auto">
                            </td>
                            <td>{{$type->category->name}}</td>
                            <td>{{$type->user->name}}</td>
                            <td>{{ !$type->featured_post ? 'No' : 'Yes' }}</td>
                            <td>{{ !$type->popular_post ? 'No' : 'Yes' }}</td>

                            <td>
                                <a href="{{route('posts.edit',$type->id)}}" class="btn btn-info mb-2">Edit</a>
                                <form action="{{route('posts.destroy',$type->id)}}" method="post" style="display: inline-block" class="mb-2">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                </form>
                                <a href="{{route('post',$type->id)}}" target="_blank" class="btn btn-success">View Post</a>
                            </td>
                          </tr>                             
                        @endforeach
                                               
                      </tbody>
                      <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Posts Title</th>
                            <th>Posts Image</th>
                            <th>Post Category</th>
                            <th>Post Author</th>                            
                            <th>Featured Post</th>
                            <th>Popular Post</th>
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