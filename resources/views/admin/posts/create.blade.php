<x-admin-master>

    @section('content')
        <h1>Create post</h1>

        <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" placeholder="Enter a title">
            </div>

            <div class="form-group">
                <label for="file">Image File</label>
                <input type="file" name="post_img" class="form-control-file">
            </div>

            <div class="form-group">
                <label for="title"> Body </label>
                <textarea name="body" id="body" cols="30" rows="10" class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>


        </form>








    @endsection

</x-admin-master>