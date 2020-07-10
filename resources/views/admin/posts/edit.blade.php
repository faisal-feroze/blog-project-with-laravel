<x-admin-master>

    @section('content')
        <h1>Edit post</h1>

        <form action="{{ route('post.update',$post->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" value="{{$post->title}}" class="form-control" placeholder="Enter a title" required>
            </div>

            <div class="form-group">
                <div>
                    <img height="80px" src="{{$post->post_img}}" alt="">
                </div>
                <label for="file">Image File</label>
                <input type="file" name="post_img" class="form-control-file" required>
            </div>

            <div class="form-group">
                <label for="title"> Body </label>
                <textarea name="body" id="body" cols="30" rows="10" class="form-control">{{$post->body}}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>


        </form>








    @endsection

</x-admin-master>