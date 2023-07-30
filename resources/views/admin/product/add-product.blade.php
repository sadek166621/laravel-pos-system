@extends('admin.master')
@section('title')
    Product
@endsection
@section('content')

    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-columns" aria-hidden="true"></i><a href="#">Product</a></li>
                <li><a>Page</a></li>
            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated fadeInUp">
        <div class="col-md-12">
            <div class="panel" style="
            border: 2px solid #1FBE9D;">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-sm-12">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <div>
                                        @foreach ($errors->all() as $error)
                                            <p>{{ $error }}</p>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                            <h3 class="text-center" style='background-color:#1FBE9D;font-size:x-large;color:white'>Add Products Form</h3>
                            <form action="{{ route('new-product') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label for="large-input" class="col-sm-2 col-form-label text-center">Category Name</label>
                                    <div class="col-sm-10">
                                        <select name="category_id" id="category_id" class="form-control" onclick="selectSubCategory(this.value);">
                                            <option value="">--- Select Category Name ---</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->cat_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="large-input" class="col-sm-2 col-form-label text-center">Supplier Name</label>
                                    <div class="col-sm-10">
                                        <select name="supplier_id" id="supplier_id" class="form-control">
                                            <option value="">--Select Supplier--</option>
                                            @foreach($suppliers as $supplier)
                                                <option readonly="" value="{{ $supplier->id}}">{{ $supplier->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="large-input" class="col-sm-2 col-form-label text-center">Product Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="product_name" id="product_name">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="large-input" class="col-sm-2 col-form-label text-center">Product code</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="product_code" id="product_code">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3"  class="col-sm-2 control-label text-center">Product Price</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="product_price" class="form-control" id="price" placeholder="">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="large-input" class="col-sm-2 col-form-label text-center">Product Cost</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="product_cost" id="product_cost">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="large-input" class="col-sm-2 col-form-label text-center">Product Stock</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="product_stock" id="product_stock">
                                    </div>
                                </div>




                                <div class="form-group row">
                                    <label for="large-input" class="col-sm-2 col-form-label text-center">Description</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" rows="6" name="description" placeholder="" id=""></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="large-input" class="col-sm-2 col-form-label text-center">Product Main Image</label>
                                    <div class="col-sm-10">
{{--                                        <input type="file" name="main_image" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" accept="image/*">--}}
{{--                                        <img id="blah" alt="product main image" width="100" height="100" />--}}
                                        <input type="file" name="main_image" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" accept="image/*">
                                        <img id="blah" alt=" image" width="50" height="50" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-primary">Submit Product</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <script>

        function selectSubCategory(category_id) {
            var xmlHttp = new XMLHttpRequest();
            var serverPage='/Ecommerceshuvo/public/select-sub-category/'+category_id;
            xmlHttp.open("GET", serverPage);
            xmlHttp.onreadystatechange = function() {
                if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
                    document.getElementById('subRes').innerHTML = xmlHttp.responseText;
                }
            }
            xmlHttp.send(null);
        }
    </script>
    <script>
        function discount_price() {
            var price=document.getElementById('price').value;
            var product_discount_amount=document.getElementById('product_discount_amount').value;
            document.getElementById('product_discount_price').value=price-product_discount_amount;
            if(product_discount_amount === ''){
                document.getElementById('product_discount_price').value='';
            }
        }
    </script>
    <script>
        function previewImages() {

            var preview = document.querySelector('#preview');

            if (this.files) {
                [].forEach.call(this.files, readAndPreview);
            }

            function readAndPreview(file) {

                // Make sure `file.name` matches our extensions criteria
                if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
                    return alert(file.name + " is not an image");
                } // else...

                var reader = new FileReader();

                reader.addEventListener("load", function() {
                    var image = new Image();
                    image.height = 100;
                    image.title  = file.name;
                    image.src    = this.result;
                    preview.appendChild(image);
                });

                reader.readAsDataURL(file);

            }

        }

        document.querySelector('#file-input').addEventListener("change", previewImages);
    </script>
@endsection
