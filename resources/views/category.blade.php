@extends('layout.layout')
@section('name')
<main id="main">

    <!-- ======= Lifestyle Category Section ======= -->
    <section class="category-section">
      <div class="container" data-aos="fade-up">

        <div class="section-header d-flex justify-content-between align-items-center mb-5">
          <h2>{{$category->name}}</h2>
        </div>

        <div class="row g-5">
          <div class="col-lg-8">
          @foreach ($categoryposts as $item)
          <div class="post-entry-1 border-bottom">
            <a href="{{route('post',$item->id)}}"><img src="{{ (!empty($item->photo))? url('assets/img/posts/'.$item->photo) : url('https://via.placeholder.com/100x100')}}" alt="" class="img-fluid"></a>
            <div class="post-meta"><span class="date">{{ $item->category->name }}</span> <span class="mx-1">&bullet;</span> <span>{{$item->updated_at}}</span></div>
            <h2 class="mb-2"><a href="{{route('post',$item->id)}}">{{$item->title}}</a></h2>
            <span class="author mb-3 d-block">{{$item->user->name}}</span>
          </div>
          @endforeach
          <div class="pagination">
            {{-- {{ $categoryposts->links() }}    --}}
          </div>          
          </div>
          @include('layout.sidebar')

        </div> <!-- End .row -->
      </div>
    </section><!-- End Lifestyle Category Section -->

  </main><!-- End #main -->

@endsection