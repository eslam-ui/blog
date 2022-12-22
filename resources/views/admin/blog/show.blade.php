<!-- Begin Page Content -->
@extends('admin.inc.master')
@section('title')
    Dashboard
@endsection
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">show blog</h1>
    </div>

    <div>
        <h2> Title : {{ $blog->title }}</h2>

        <p> Author : {{ $blog->author }}</p> <img src="{{ asset($blog->image) }}" style="height: 300px; width:500px;" alt="" srcset="">
        <p>{{ $cat->name }}</p>
        <p>{{$blog->article}}</p>
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
