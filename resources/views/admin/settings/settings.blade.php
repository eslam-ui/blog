<!-- Begin Page Content -->
@extends('admin.inc.master')
@section('title')
    Settings
@endsection
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Settings</h1>
    </div>

    <div class="row">
        <form method="POST" action="{{ url('settings') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>facebook</label>
                <input name="facebook" type="text" value="{{$settings['facebook']->value}}" class="form-control">
            </div>
            <div class="form-group">
                <label>twitter</label>
                <input name="twitter" type="text" value="{{$settings['twitter']->value}}" class="form-control">
            </div>
            <div class="form-group">
                <label>github</label>
                <input name="github" type="text" value="{{$settings['github']->value}}" class="form-control">
            </div>
            <div class="form-group">
                <label>about</label>
                <textarea name="about" id="" cols="30" rows="10" class="form-control">{{$settings['about']->value}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">update settings</button>
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
