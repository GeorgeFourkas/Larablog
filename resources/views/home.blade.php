<x-home-master>
    @section('content')



        <!-- Blog Post -->
        @foreach($posts as $post)
            <div class="card mb-4 mt-5">
                <img class="card-img-top" src="{{$post->post_image}}" alt="Card image cap">
                <div class="card-body">
                    <h2 class="card-title">{{$post->title}}</h2>
                    <p class="card-text">{{Str::limit($post->title, '50', '.....')}}</p>
                    <a href="{{route('post', $post->id)}}" class="btn btn-primary">Read More &rarr;</a>
                </div>
                <div class="card-footer text-muted">
                    Posted {{$post->created_at->diffForHumans()}}
                    <a href="#">Start Bootstrap</a>
                </div>
            </div>
        @endforeach

        <ul class="pagination justify-content-center mb-4">
            <li class="page-item">
                <a class="page-link" href="#">&larr; Older</a>
            </li>
            <li class="page-item disabled">
                <a class="page-link" href="#">Newer &rarr;</a>
            </li>
        </ul>
    @endsection

</x-home-master>
