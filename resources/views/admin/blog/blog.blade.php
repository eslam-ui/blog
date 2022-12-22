<!-- Begin Page Content -->
@extends('admin.inc.master')
@section('title')
    Blogs
@endsection


@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Blogs</h1>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                ADD Blog
            </button>
        </div>

        <div class="row">
            @if ($errors->any())
                <div class="alert alert-danger {{ Session::has('penting') ? 'alert-important' : '' }}">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (Session::has('status'))
                <div class="alert alert-success {{ Session::has('penting') ? 'alert-important' : '' }}">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ Session::get('status') }}
                </div>
            @endif
            @if (Session::has('edit'))
                <div class="alert alert-success {{ Session::has('penting') ? 'alert-important' : '' }}">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ Session::get('edit') }}
                </div>
            @endif
            @if (Session::has('del'))
                <div class="alert alert-success {{ Session::has('penting') ? 'alert-important' : '' }}">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ Session::get('del') }}
                </div>
            @endif
            <table class="table table-purple table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">title</th>
                        <th scope="col">author</th>
                        <th scope="col">image</th>
                        <th scope="col">article</th>
                        <th scope="col">category</th>
                        <th scope="col">operations</th>
                    </tr>
                </thead>
                <?php $x = 0; ?>
                @foreach ($all[0] as $blog)
                    <?php $x += 1; ?>
                    <tbody>
                        <tr>

                            <th scope="row">{{ $x }}
                            </th>

                            <td>
                                {{ $blog->title }}
                            </td>
                            <td>
                                {{ $blog->author }}
                            </td>
                            <td>
                                <img src="{{ $blog->image }}" style="height: 100px; width:auto;" alt=""
                                    srcset="">
                            </td>
                            <td>
                                <a href="blogs/{{ $blog->id }}">show article</a>
                            </td>
                            <td>
                                <?php
                            $id = $blog->cat_id;
                            foreach ($all[1] as $cat){
                                if ($cat->id ==$id) {
                                    ?><p>
                                    {{ $cat->name }}
                                </p>
                                <?php
                                }
                            }
                            ?>
                            </td>
                            <td>
                                <a href="/blog-edit/{{ $blog->id }}" class="btn btn-success">edit</a>
                                <a href="/blog-del/{{ $blog->id }}" class="btn btn-danger">del</a>
                            </td>

                        </tr>
                    </tbody>
                @endforeach
            </table>

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



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">add blog</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('blogs.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>title</label>
                            <input name="title" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>author</label>
                            <input name="author" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>image</label>
                            <br>
                            <input type="file" id="imgInp" name="image" />
                            <img id="blah" src="#" style="width:100px;height:auto;visibility:hidden;"
                                alt="your image" />
                        </div>
                        <div class="form-group">
                            <label>category</label>
                            <select name="category" class="form-control">
                                <option value="">add category</option>
                                <?php
                                foreach ($all[1] as $cat){
                                    ?>
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>article</label>
                            <textarea name="article" id="" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">add category</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {

                blah.src = URL.createObjectURL(file)
                blah.style.visibility = 'visible'
            }
        }
    </script>


@endsection
