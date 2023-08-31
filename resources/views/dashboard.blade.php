<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Comments') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
               
                <div class="table-responsive"> 
                    <table id="example" class="table table-striped table-hover" style="width:100%">
                      <thead>
                          <tr>
                              <th>#</th>
                              <th>Commenter Name</th>
                              <th>Commenter Email</th>
                              <th>Comment Message</th>
                              <th>Post Title</th>
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
                          </tr>
                      </tfoot>
                  </table>    
                </div>
        </div>
    </div>
</x-app-layout>
