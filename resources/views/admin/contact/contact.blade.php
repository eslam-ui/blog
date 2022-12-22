<!-- Begin Page Content -->
@extends('admin.inc.master')
@section('title')
    Dashboard
@endsection
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
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
                        <th>#</th>
                        <th>name</th>
                        <th>email</th>
                        <th>message</th>
                        <th>operations</th>
                    </tr>
                </thead>
                <?php $x = 0; ?>
                @foreach ($contacts as $contact)
                    <?php $x += 1; ?>
                    <tbody>
                        <tr>

                            <td>{{ $x }}</td>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->email }}</td>
                            <td><a class="openModel dropdown-item" href="#" data-toggle="modal" data-answer="{{ $contact->answer }}" data-message="{{ $contact->message }}" data-id="{{ $contact->id }}"
                                    data-target="#messageModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    show message
                                </a></td>
                            <td>
                                <a href="{{ url('contact-del/'.$contact->id) }}" class="btn btn-danger">del</a>
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




    <!-- contact Modal-->
    <div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{url('/contact-edit')}}" method="POST">
                        @csrf
                        <div>
                            <input type="hidden" class="myid" name="id">
                            <label>message</label>
                            <textarea  name="message" class="mymess form-control" cols="30" readonly="true" rows="10"></textarea>
                            <label>answer</label>
                            <textarea name="answer" class="myans form-control" cols="30" rows="10"></textarea>

                        </div>


                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">update answe</button>
                </form>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $(".openModel").click(function() {
                $('.modal-body .mymess').val($(this).data('message'));
                $('.modal-body .myid').val($(this).data('id'));
                $('.modal-body .myans').val($(this).data('answer'));
                $('#messageModal').modal('show');
            });
        });
    </script>

@endsection
