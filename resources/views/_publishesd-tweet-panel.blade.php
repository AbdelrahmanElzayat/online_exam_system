<div class="border border-info rounded py-4 px-5 mb-5">
    <form  method="POST" action="{{route('post.store')}}">
        @csrf
        <input type="hidden" name="course_id" value="{{$course->id}}">
        <textarea name="body" id="" class="w-full border-0 specialtextarea" placeholder="what's News?" ></textarea>
        <hr class="my-4">
        <footer class="d-flex justify-content-between">
            <img src="{{auth()->user()->avatar}}" alt="" class="rounded-circle mr-2" width="50" height="50">
            <div>
            <button type="submit"
                class="btn btn-success">Share Post</button>
               
            </div>
        </footer>
    </form>
    @error('body')
    <p class="text-danger">{{$message}}</p>
    @enderror
</div>

