<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sufee Admin - HTML5 Admin Template</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @include('links')
</head>

<body>
    <!-- Header-->
    @include('header')
    <!-- /header -->
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="row card-header">
                            <div class="col-md-9">
                                <h4>Add Details</h4>
                            </div>
                            <div class="col-md-3">
                                <a href="form">View Details</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="/adddata" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-3">
                                        <label>Name : </label>
                                        <input type="text" name="name" class="form-control" placeholder="Enter Product Name" autocomplete="off">
                                        <span style="color:red">@error('name'){{$message}}@enderror </span>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Brand : </label>
                                        <input type="text" name="brand" class="form-control" placeholder="Enter brand Name" autocomplete="off" />
                                        <span style="color:red">@error('brand'){{$message}}@enderror </span>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Model :</label>
                                        <input type="text" name="model" class="form-control" placeholder="Enter Model" autocomplete="off" />
                                        <span style="color:red">@error('model'){{$message}}@enderror </span>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Category :</label>
                                        <select name="category" class="form-control">
                                            <option selected disabled>Select Category</option>
                                            @foreach($category as $getcategory)
                                            <option value={{$getcategory->id}}>{{$getcategory->categoryname}}</option>
                                            @endforeach
                                        </select>
                                        <span style="color:red">@error('category'){{$message}}@enderror </span>
                                    </div>
                                </div>
                                <br />
                                <div class="row">
                                    <div class="col-md-3">
                                        <label>Gender : </label>
                                        <select name="gender" class="form-control">
                                            <option selected disabled>Select Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                        </select>
                                        <span style="color:red">@error('gender'){{$message}}@enderror </span>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Size Group : </label>
                                        <select name="size_group" class="form-control">
                                            <option selected disabled>Select Size</option>
                                            @foreach($size as $size)
                                            <option value="{{$size->id}}">{{$size->size}}</option>
                                            @endforeach
                                        </select>

                                        <span style="color:red">@error('gender'){{$message}}@enderror </span>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Color : </label>
                                        <input type="text" name="color" class="form-control" placeholder="Enter Product Color" autocomplete="off">
                                        <span style="color:red">@error('color'){{$message}}@enderror </span>
                                    </div>
                                    <div class="col-md-3">
                                        <label>SKU : </label>
                                        <input type="text" name="sku" class="form-control" placeholder="Enter Product SKU" autocomplete="off">
                                        <span style="color:red">@error('sku'){{$message}}@enderror </span>
                                    </div>
                                </div>
                                <br />
                                <div class="row">
                                    <div class="col-md-3">
                                        <label>Relase Price (USD) : </label>
                                        <input type="Number" name="relase_price_usd" class="form-control" placeholder="Enter Product Relase Price" autocomplete="off">
                                        <span style="color:red">@error('relase_price_usd'){{$message}}@enderror </span>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Relase Price (INR) : </label>
                                        <input type="Number" name="relase_price_inr" class="form-control" placeholder="Enter Product Prices" autocomplete="off">
                                        <span style="color:red">@error('relase_price_inr'){{$message}}@enderror </span>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Relase Date : </label>
                                        <input type="Date" name="relase_date" class="form-control" placeholder="Enter Product Name" autocomplete="off">
                                        <span style="color:red">@error('relase_date'){{$message}}@enderror </span>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Description : </label>
                                        <input type="text" name="description" class="form-control" placeholder="Enter Product Description" autocomplete="off">
                                        <span style="color:red">@error('description'){{$message}}@enderror </span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label>Images </label>
                                        <input type="file" id="files" name="files[]" class="form-control" multiple="multiple" />
                                        <span style="color:red">@error('files'){{$message}}@enderror </span>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-3">
                                        <button type="submit" class="btn btn-success" style="float: inherit"> Submit</button>
                                        <a href="form" class="btn btn-danger" style=" margin-left: 20px">Back</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
        </div>
        @include('scrpit')

        <script>
            $("#files").change(() => {
               var length =  $('#files').get(0).files.length;
               if(length>5  ){
                   alert("Please Select Maxmiun 5 Image ")
                   $("#files").val('');
               }
            })
        </script>
</body>

</html>