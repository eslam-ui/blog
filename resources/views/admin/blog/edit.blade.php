<!-- Begin Page Content -->
@extends('admin.inc.master')
@section('title')
    Dashboard
@endsection
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit blog</h1>
        </div>

        <div class="row">

            <form method="POST" action="{{ url('blogs/update') }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <input type="hidden" value="{{$blog->id}}" name="id">
                <div class="form-group">
                    <label>title</label>
                    <input name="title" type="text" value="{{ $blog->title }}" class="form-control">
                </div>
                <div class="form-group">
                    <label>author</label>
                    <input name="author" type="text" value="{{ $blog->author }}" class="form-control">
                </div>
                <div class="form-group">
                    <label>image</label>
                    <br>
                    <input type="file" id="imgInp" name="image" />
                    <img src="{{ asset($blog->image) }}" style="height: 100px; width:auto;" alt="" srcset="">
                </div>
                <div class="form-group">
                    <label>category</label>
                    <select name="category" class="form-control">
                        @foreach ($cats as $c)
                            @if ($c->id == $cat->id)
                                <option value="{{ $c->id }}" selected>{{ $c->name }}</option>
                            @else
                                <option value="{{ $c->id }}">{{ $c->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <br>
                <div class="form-group">
                    <label>article</label>
                    <textarea name="article" id="" cols="30" rows="10" class="form-control">{{ $blog->article }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">update blog</button>
            </form>
        </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; eslam elsyed </span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
@endsection
