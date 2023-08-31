@extends('layout.layout')
@section('name')
<main id="main">

       <!-- ======= Hero Slider Section ======= -->
       <section id="hero-slider" class="hero-slider">
        <div class="container-md" data-aos="fade-in">
          <div class="row">
            <div class="col-12">
              <div class="swiper sliderFeaturedPosts">
                <div class="swiper-wrapper">

                  @foreach ($popular_posts as $post)
                  <div class="swiper-slide">
                    <a href="{{route('post',$post->id)}}" class="img-bg d-flex align-items-end" style="background-image: url('{{url("assets/img/posts/".$post->photo)}}');">
                      <div class="img-bg-inner">
                        <h2>{{$post->title}}</h2>
                        <p>{{ Illuminate\Support\Str::limit($post->description, 130, '...') }}.</p>
                      </div>
                    </a>
                  </div>
                  @endforeach 
               
                </div>
                <div class="custom-swiper-button-next">
                  <span class="bi-chevron-right"></span>
                </div>
                <div class="custom-swiper-button-prev">
                  <span class="bi-chevron-left"></span>
                </div>
  
                <div class="swiper-pagination"></div>
              </div>
            </div>
          </div>
        </div>
      </section><!-- End Hero Slider Section -->
  
    <!-- ======= Lifestyle Category Section ======= -->
    <section class="category-section">
      <div class="container" data-aos="fade-up">

        <div class="section-header d-flex justify-content-between align-items-center mb-5">
          <h2>All Post</h2>
        </div>

        <div class="row g-5">
          <div class="col-lg-8">
          @foreach ($posts as $item)
          <div class="post-entry-1 border-bottom pr-50">
            <a href="{{route('post',$item->id)}}"><img src="{{ (!empty($item->photo))? url('assets/img/posts/'.$item->photo) : url('https://via.placeholder.com/100x100')}}" alt="" class="img-fluid"></a>
            <div class="post-meta"><span class="date">{{ $item->category->name }}</span> <span class="mx-1">&bullet;</span> <span>{{$item->updated_at}}</span></div>
            <h2 class="mb-2"><a href="{{route('post',$item->id)}}">{{$item->title}}</a></h2>
            <span class="author mb-3 d-block">{{$item->user->name}}</span>
            <p class="mr-5" style="margin-right: 3rem">
              {{ Illuminate\Support\Str::limit($item->description, 130, '...') }}
            </p>
          </div>
          @endforeach
          <div class="pagination">
            {{ $posts->links() }}   
          </div>          
          </div>
          @include('layout.sidebar')
        </div> <!-- End .row -->
      </div>
    </section><!-- End Lifestyle Category Section -->

  </main><!-- End #main -->

@endsection