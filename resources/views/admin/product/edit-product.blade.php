@extends('admin.master')
@section('title')
    Category
@endsection
@section('content')

    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-columns" aria-hidden="true"></i><a href="#">Edit-Product</a></li>
                <li><a>Page</a></li>
            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated fadeInUp">
        <div class="col-md-12">
            <div class="panel">
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
                            <h3 class=" text-bold text-center text-success">{{session('message')}}</h3>
                            <h3 class="text-center text-italic">Edit Products Form</h3>
                            <form name="editProductForm" action="{{ route('update-product') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label for="large-input" class="col-sm-2 col-form-label text-center">Category Name</label>
                                    <div class="col-sm-10">
                                        <select name="category_id" class="form-control">
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
                                                <option value="{{ $supplier->id}}">{{$supplier->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="large-input" class="col-sm-2 col-form-label text-center">Product Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="{{ $productById->product_name }}" name="product_name" id="product_name">
                                        <input type="hidden" value="{{ $productById->id }}" name="product_id" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="large-input" class="col-sm-2 col-form-label text-center">Product code</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="{{ $productById->product_code }}" name="product_code" id="product_code">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3"  class="col-sm-2 control-label text-center">Product Price</label>
                                    <div class="col-sm-10">
                                        <input type="text" value="{{ $productById->product_price }}" name="product_price" class="form-control" id="price" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="large-input" class="col-sm-2 col-form-label text-center">Product Cost</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="{{ $productById->product_cost }}" name="product_cost" id="product_cost">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="large-input" class="col-sm-2 col-form-label text-center">Product Stock</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="{{ $productById->product_stock }}" name="product_stock" id="product_stock">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="large-input" class="col-sm-2 col-form-label text-center">Description</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" rows="6" name="description" placeholder="" id="">{{ $productById->description }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="large-input" class="col-sm-2 col-form-label text-center">Product Main Image</label>
                                    <div class="col-sm-10">
                                        {{--                                        <input type="file" name="main_image" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" accept="image/*">--}}
                                        {{--                                        <img id="blah" alt="product main image" width="100" height="100" />--}}
                                        <input type="file" name="main_image" accept="image/*">
                                        <span class="text-danger"> Image size should be 300*300 </span><br/>
                                        <img src="{{ asset($productById->main_image) }}" alt="" height="80" width="80"/>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="large-input" class="col-sm-2 col-form-label text-center"></label>
                                    <div class="col-sm-10">
                                        <input type="submit" class="btn btn-light px-5" value="submit">
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
        function validate() {
            var select = document.getElementById('selection').value;
            var message = document.getElementById('message');
            if (select=="Select Option"){
                message.innerHTML ='Please select Publication Status ';
                return false;
            }else {
                return true;
            }
        }
    </script>
    <script>

        function selectSubCategory(category_name) {
            var xmlHttp = new XMLHttpRequest();
            var serverPage='/select-sub-category/'+category_name;
            xmlHttp.open("GET", serverPage);
            xmlHttp.onreadystatechange = function() {
                if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
                    document.getElementById('sub_category_name').innerHTML = xmlHttp.responseText;
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
    <script>
        document.forms['editProductForm'].elements['category_id'].value = '{{ $productById->category_id }}';
        document.forms['editProductForm'].elements['supplier_id'].value = '{{ $productById->supplier_id }}';
    </script>
@endsection
