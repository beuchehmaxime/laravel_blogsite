<div class="col-lg-4">

  @foreach ($latestposts as $item)
 
  @endforeach <div class="post-entry-1 border-bottom">
    <div class="post-meta"><span class="date">{{$item->category->name}}</span> <span class="mx-1">&bullet;</span> <span>{{$item->updated_at}}</span></div>
    <h2 class="mb-2"><a href="{{route('post',$item->id)}}"> {{ Illuminate\Support\Str::limit($item->title, 80, '...') }}</a></h2>
    <span class="author mb-3 d-block">{{$item->user->name}}</span>
  </div>
   

  
  </div>