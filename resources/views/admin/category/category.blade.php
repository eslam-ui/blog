<!-- Begin Page Content -->
@extends('admin.inc.master')
@section('title')
    Category
@endsection
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Categories</h1>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                ADD Category
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
                        <th scope="col">name</th>
                        <th scope="col">operations</th>
                    </tr>
                </thead>
                <?php $x = 0; ?>
                @foreach ($cats as $cat)
                    <?php $x += 1; ?>
                    <tbody>
                        <tr>

                            <th scope="row">{{ $x }}
                                <form action="{{ url('category-edit') }}" method="POST">
                                    @csrf
                                <input type="hidden" value="{{ $cat->id }}" name="id">
                            </th>
                            <td><input style="border:none;" type="text" value="{{ $cat->name }}" name="name"></td>
                            <td>
                                <button type="submit" class="btn btn-success">edit</button>
                                </form>
                                <a href="/category-del/{{ $cat->id }}" class="btn btn-danger">del</a>
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
                    <h5 class="modal-title" id="exampleModalLabel">add category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ url('/category') }}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlInput1">add category</label>
                            <input name="name" type="text" class="form-control" id="exampleFormControlInput1"
                                placeholder="add Here">
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

@endsection
