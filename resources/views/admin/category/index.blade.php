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
        <div class="col-lg-2"></div>
        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">
          
            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">
                <div class="card-body">
                  <div class="col-12 d-flex justify-between m-2">
                    <h5 class="card-title">All Categories</span></h5>          
                  </div>

                  <div class="table-responsive"> 
                    <table id="example" class="table table-striped table-hover" style="width:100%">
                      <thead>
                          <tr>
                              <th>#</th>
                              <th>Category Name</th>
                              <th>Category Icon</th>
                              <th>Actions</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($categories as $key => $type)                            
                          <tr>
                            <th scope="row"><a href="#"> {{$key+1}} </a></th>
                            <td>{{$type->name}}</td>
                            <td>
                              <span class="bg-primary text-white"  style="height: 4rem; width: auto; font-size: 2rem">
                                <i class="{{$type->icon}} p-3"></i> <br>
                              </span>
                              
                              {{$type->icon}}
                            </td>
                            <td>
                                <a href="{{ route('admin.editcategory',[$type->id])}}" class="btn btn-info">Edit</a>
                                <a href="{{ route('admin.deletecategory',$type->id) }}" id="deletepropertytype" class="btn btn-danger">Delete</a>
                            </td>
                          </tr>                             
                        @endforeach
                                               
                      </tbody>
                      <tfoot>
                          <tr>
                            <th>#</th>
                            <th>Category Name</th>
                            <th>Category Icon</th>
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
        <div class="col-lg-2"></div>


      </div>
    </section>

  </main><!-- End #main -->

@endsection