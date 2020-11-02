<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Posts</span>
    </a>
    <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Posts:</h6>
            <a class="collapse-item ml-auto" href="{{route('post.create')}}">Create Post <i class="fas fa-plus-circle" style = "float:right"></i></a>
            <a class="collapse-item ml-auto" href="{{route('post.index')}}" >View All Posts <i class="fas fa-eye" style="float:right"></i></a>
        </div>
    </div>
</li>
