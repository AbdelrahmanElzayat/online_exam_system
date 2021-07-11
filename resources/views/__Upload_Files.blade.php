 <div class="row shadow-none">
            <div class="col-12 shadow-none">
                <!-- Default box -->
                <div class="card shadow-none">
                    <div class="card-body">
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger" role="alert">
                                {{ $error }}
                            </div>
                        @endforeach
                        <form action="{{ route('uploadAction') }}" method="post" enctype="multipart/form-data"
                            class="border-0 text-left">
                            @csrf
                            <input type="hidden" name="course_id" value="{{$course->id}}">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="">Enter Name</label>
                                        <input type="text" name="name" class="form-control"
                                            placeholder="Enter name of file" value="{{ old('name') }}">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="">Enter Description</label>
                                        <input type="text" name="description" class="form-control"
                                            placeholder="Enter file Description" value="{{ old('description') }}">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input type="file" name="file" id="">
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-info"></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->

                </div>
                <!-- /.card -->
            </div>
        </div>
    
