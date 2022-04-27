
@extends('admin.main')
@section('head')
    <script src={{URL::asset('ckeditor/ckeditor.js')}}></script>
@endsection

@section('content')

        <!-- /.card-header -->
        <!-- form start -->
        <form action="" method="post">
            <div class="card-body">
                <div class="form-group">
                    <label >Tên danh mục</label>
                    <input type="text" name="name" class="form-control" placeholder="Nhập tên danh mục">
                </div>

                <div class="form-group">
                    <label>Danh mục</label>
                    <select class="form-control" name="parent_id">
                        <option value="0">Danh mục cha</option>
                        @foreach($menus as $menu)
                            <option value="{{$menu->id}}">{{$menu->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Mô tả</label>
                    <textarea class="form-control" name="description"></textarea>
                </div>

                <div class="form-group">
                    <label>Mô tả chi tiết</label>
                    <textarea class="form-control" name="content" id="content"></textarea>
                </div>

               <label>Kịch hoạt</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="active" id="active" value="1" checked="">
                    <label class="form-check-label">Có</label>
                </div>

                <div class="form-check">

                    <input class="form-check-input" type="radio" name="active" id="no_active" value="0" >
                    <label class="form-check-label">Không</label>
                </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Tạo danh mục</button>
            </div>
            @csrf
        </form>
    </div>
@endsection

@section('footer')
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor 4
        // instance, using default configuration.
        CKEDITOR.replace( 'content' );
    </script>
@endsection
