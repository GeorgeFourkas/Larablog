<x-admin-master>
    @section('content')
        <h1>All Posts:</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            @if(\Illuminate\Support\Facades\Session::has('post-created-message'))
                <div class="alert alert-success text-center">
                    {{\Illuminate\Support\Facades\Session::get('post-created-message')}}
                </div>
            @endif
            @if(\Illuminate\Support\Facades\Session::has('message'))
                <div class="alert alert-danger text-center">
                    {{\Illuminate\Support\Facades\Session::get('message')}}
                </div>
            @endif

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <td>Owner</td>
                            <th>Post Title</th>
                            <th>Image</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Delete</th>
                            <th>Edit</th>

                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Id</th>
                            <td>Owner</td>
                            <th>Post Title</th>
                            <th>Image</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Delete</th>
                            <th>Edit</th>

                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{$post->id}}</td>
                                <td>{{$post->user->name}}</td>
                                <td>{{$post->title}}</td>
                                <td><img height="40px" src="{{$post->post_image}}" alt="Not Found"></td>
                                <td>{{$post->created_at->diffForHumans()}}</td>
                                <td>{{$post->updated_at}}</td>
                                <td class="text-center">
                                    <form action="{{route('post.destroy', $post->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button style="background:none;border:0;box-shadow: none;border-radius: 0px;"><i
                                                class="fas fa-trash-alt" style="color: maroon;"></i></button>
                                    </form>
                                </td>
                                <td class="text-center">
                                    <form action="{{route('post.edit', $post->id)}}" method="get">
                                        @csrf
                                        <button style="background:none;border:0;box-shadow: none;border-radius: 0px" ;>
                                            <i class="far fa-edit" style="color: #2d4373"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{$posts->links()}}
    @endsection

    @section('scripts')
        <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
        <!-- Page level custom scripts -->
        {{--        <script src="{{asset('js/demo/datatables-demo.js')}}"></script>--}}
    @endsection
</x-admin-master>
