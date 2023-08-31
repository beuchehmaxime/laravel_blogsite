@extends('layout.layout')
@section('name')


  <main id="main">

    <section class="single-post-content">
      <div class="container">
        <div class="row">
          <div class=" col-md-9 post-content" data-aos="fade-up">

            <!-- ======= Single Post Content ======= -->
            <div class="single-post">
                <h1 class="mb-5">{{$posts->title}}</h1>
              <div class="post-meta d-flex justify-between align-center">
               <div class="">
                <span class="date">Category: {{ $posts->category->name }}</span> <span class="mx-1">&bullet;</span> <span>{{$posts->updated_at}}</span>
               </div> 
               <span class="author" style="margin-left: 2rem">
                Author: <strong class="text-success text-uppercase">{{$posts->user->name}}</strong>
               </span>
              </div>
              <figure class="my-4">
                <img src="{{url('assets/img/posts/'.$posts->photo)}}" alt="" class="img-fluid" style="max-width: 60rem">
              </figure>
              <p><span class="firstcharacter">{{$posts->description[0]}}</span>{{$posts->description}}</p>
              </div><!-- End Single Post Content -->

            <!-- ======= Comments ======= -->
            <div class="comments">
              <h5 class="comment-title py-4">{{$commentcounts}} Comment(s)</h5>
              {{-- <div class="comment d-flex mb-4">
                <div class="flex-shrink-0">
                  <div class="avatar avatar-sm rounded-circle">
                    <img class="avatar-img" src="assets/img/person-5.jpg" alt="" class="img-fluid">
                  </div>
                </div>
                <div class="flex-grow-1 ms-2 ms-sm-3">
                  <div class="comment-meta d-flex align-items-baseline">
                    <h6 class="me-2">Jordan Singer</h6>
                    <span class="text-muted">2d</span>
                  </div>
                  <div class="comment-body">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Non minima ipsum at amet doloremque qui magni, placeat deserunt pariatur itaque laudantium impedit aliquam eligendi repellendus excepturi quibusdam nobis esse accusantium.
                  </div>

                  <div class="comment-replies bg-light p-3 mt-3 rounded">
                    <h6 class="comment-replies-title mb-4 text-muted text-uppercase">2 replies</h6>

                    <div class="reply d-flex mb-4">
                      <div class="flex-shrink-0">
                        <div class="avatar avatar-sm rounded-circle">
                          <img class="avatar-img" src="assets/img/person-4.jpg" alt="" class="img-fluid">
                        </div>
                      </div>
                      <div class="flex-grow-1 ms-2 ms-sm-3">
                        <div class="reply-meta d-flex align-items-baseline">
                          <h6 class="mb-0 me-2">Brandon Smith</h6>
                          <span class="text-muted">2d</span>
                        </div>
                        <div class="reply-body">
                          Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                        </div>
                      </div>
                    </div>
                    <div class="reply d-flex">
                      <div class="flex-shrink-0">
                        <div class="avatar avatar-sm rounded-circle">
                          <img class="avatar-img" src="assets/img/person-3.jpg" alt="" class="img-fluid">
                        </div>
                      </div>
                      <div class="flex-grow-1 ms-2 ms-sm-3">
                        <div class="reply-meta d-flex align-items-baseline">
                          <h6 class="mb-0 me-2">James Parsons</h6>
                          <span class="text-muted">1d</span>
                        </div>
                        <div class="reply-body">
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio dolore sed eos sapiente, praesentium.
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div> --}}

              @foreach ($comments as $comment)
              <div class="comment d-flex mb-5">
                <div class="flex-shrink-0">
                  <div class="avatar avatar-sm rounded-circle">
                    <img class="avatar-img" src="{{asset('assetss/img/person-2.jpg')}}" alt="" class="img-fluid">
                  </div>
                </div>
                <div class="flex-shrink-1 ms-2 ms-sm-3">
                  <div class="comment-meta d-flex">
                    <h6 class="me-2"> {{$comment->user_id == null ? $comment->username : $comment->user->name}}
                    </h6>
                    <span class="text-muted">{{$comment->created_at}}</span>
                  </div>
                  <div class="comment-body">
                    {{$comment->message}}
                  </div>
                </div>
              </div>
              @endforeach

             
            </div><!-- End Comments -->

            <!-- ======= Comments Form ======= -->
            <div class="row justify-content-center mt-5">

              <div class="col-lg-12">
                <h5 class="comment-title">Leave a Comment</h5>
                <form action="{{route('add.comment',$posts->id)}}" method="POST">
                    @csrf
                    <div class="row">
                        @if (!auth()->check())
                        <div class="col-lg-6 mb-3">
                        <label for="comment-name">Name</label>
                        <input type="text" class="form-control @error('comment_name')
                            is-invalid
                        @enderror" id="comment_name" placeholder="Enter your name" name="comment_name"> <br>
                        @error('comment_name')
                            <p class="text-danger">{{$message}}</p>                      
                        @enderror
                        </div>
                        <div class="col-lg-6 mb-3">
                        <label for="comment-email">Email</label>
                        <input type="text" class="form-control @error('comment_email')
                            is-invalid
                        @enderror" id="comment_email" name="comment_email" placeholder="Enter your email"> <br>
                        @error('comment_email')
                            <p class="text-danger">{{$message}}</p>                      
                        @enderror
                        </div>
                        @endif
                        <div class="col-12 mb-3">
                        <label for="comment-message">Message</label>    
                        <textarea class="form-control @error('comment_message') is-invalid @enderror" id="comment_message" name="comment_message" placeholder="Enter your name" cols="30" rows="10"></textarea> <br>
                        @error('comment_message')
                            <p class="text-danger">{{$message}}</p>                      
                        @enderror
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Post comment</button>
                        </div>
                    </div>
                </form>
              </div>
            </div><!-- End Comments Form -->

          </div>
          <div class="col-md-3 ml-5" >
            <!-- ======= Sidebar ======= -->
            <div class="aside-block">

              <ul class="nav nav-pills custom-tab-nav mb-4" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="pills-popular-tab" data-bs-toggle="pill" data-bs-target="#pills-popular" type="button" role="tab" aria-controls="pills-popular" aria-selected="true">Popular</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-trending-tab" data-bs-toggle="pill" data-bs-target="#pills-trending" type="button" role="tab" aria-controls="pills-trending" aria-selected="false">Trending</button>
                </li>
              </ul>

              <div class="tab-content" id="pills-tabContent">

                <!-- Popular -->
                <div class="tab-pane fade show active" id="pills-popular" role="tabpanel" aria-labelledby="pills-popular-tab">                 
                    @foreach ($latestposts as $item)
                    <div class="post-entry-1 border-bottom">
                        <div class="post-meta"><span class="date">{{$item->category->name}}</span> <span class="mx-1">&bullet;</span> <span>{{$item->updated_at}}</span></div>
                        <h2 class="mb-2"><a href="{{route('post',$item->id)}}"> {{ Illuminate\Support\Str::limit($item->title, 50, '...') }}</a></h2>
                        <span class="author mb-3 d-block">{{$item->user->name}}</span>
                    </div>
                    @endforeach
                </div> <!-- End Popular -->

                <!-- Latest -->
                <div class="tab-pane fade" id="pills-latest" role="tabpanel" aria-labelledby="pills-latest-tab">                 
                    @foreach ($latestposts as $item)
                    <div class="post-entry-1 border-bottom">
                        <div class="post-meta"><span class="date">{{$item->category->name}}</span> <span class="mx-1">&bullet;</span> <span>{{$item->updated_at}}</span></div>
                        <h2 class="mb-2"><a href="{{route('post',$item->id)}}"> {{ Illuminate\Support\Str::limit($item->title, 50, '...') }}</a></h2>
                        <span class="author mb-3 d-block">{{$item->user->name}}</span>
                    </div>
                    @endforeach
                </div> <!-- End Latest -->

              </div>
            </div>

            

            <div class="aside-block">
              <h3 class="aside-title">Categories</h3>
              <ul class="aside-links list-unstyled">
                @foreach ($categories as $category)
                    <li><a href="{{route('category',$category->id)}}"><i class="bi bi-chevron-right"></i> {{$category->name}}</a></li>                
                @endforeach
              </ul>
            </div><!-- End Categories -->


          </div>
        </div>
      </div>
    </section>
  </main><!-- End #main -->


@endsection