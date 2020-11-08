<x-admin-master>


    @section('content')

        <div class="container">
            <div style="text-align: center;"><h1>Edit Post</h1></div>

            <form method="POST" action="{{route('post.update', $post->id)}}" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" id="title" value="{{$post->title}}"
                           aria-activedescendant="" placeholder="Enter Title">
                </div>

                <div class="form-group">
                    <textarea name="body" class="form-control" id="body" cols="30" rows="10" placeholder="post content">{{$post->body}}</textarea>
                </div>
                <div class="form-group">
                    <label for="file">File</label>
                    <input type="file" name="post_image" class="form-control-file" id="post_image" value="{{$post->post_image}}"
                           aria-activedescendant="">
                </div>

                <button type="submit" class="btn btn-primary">Upload Post</button>
            </form>
        </div>
    @endsection

</x-admin-master>
