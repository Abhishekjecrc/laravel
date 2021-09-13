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
							<div class="col-lg-9">
								<strong class="card-title">Sub Category</strong>
							</div>
							<div class="col-lg-3 ">
								<button class="btn btn-success" id="add_category" data-bs-toggle="modal" data-bs-target="#addCategory"><i class="fa  fa-plus"></i>  Add Sub Category </button>
							</div>
						</div>
						<div class="card-body">
							<table class="table" id="category_table">
								<thead class="thead-dark">
									<tr>
										<th scope="col">#</th>
										<th scope="col">Sub Category Name</th>
										<th scope="col">Category Name</th>
										<th scope="col">Image</th>
										<th scope="col">Create At</th>
										<th scope="col">Status</th>
										<th scope="col">Action</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div><!-- .animated -->
	</div>


	<!-- Add Model -->
   
	<div class="modal fade" id="addCategory" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">Sub Add Category </h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form id="form_add" method="" enctype="multipart/form-data">
                    <div class="mb-3">
							<label for="category-name" class="col-form-label">Select Category </label>
							<select class="form-control" id="fetch_category" name="fetch_category">
								@foreach ($category as $category)
                              <option value="{{ $category->id }}">{{$category->categoryname}}</option>
                                @endforeach
                            </select>
						</div>     
                    
						<div class="mb-3">
							<label for="category-name" class="col-form-label">Sub Category Name:</label>
							<input type="text" class="form-control" name="category-name" id="category-name">
						</div>
						<div class="mb-3">
							<label for="category_image" class="col-form-label">Sub Category Image:</label>
							<input type="file" accept="image/png, image/gif, image/jpeg" class="form-contro-file " name="image" id="category_image">
						</div>
					</form>
					<img id="blah" src="#" alt="your image" />
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="button" id="insert" class="btn btn-primary">Save</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Add categroy MODEl END -->

	<!-- Delete  -->
      
	<div class="modal fade" id="subcategorydelete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">Sub Add Category </h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form id="form_delete" method="" enctype="multipart/form-data">
                      
                    
						<div class="mb-3">
							<label for="category-name" class="col-form-label">Remark:</label>
							<input type="text" class="form-control" name="category-name" id="category-name">
						</div>
						<input type="hidden" value=""  id="deleteid">
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="button" id="subcatdelete" class="btn btn-primary">Delete</button>
				</div>
			</div>
		</div>
	</div>




	<!-- Edit Modal -->
	<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">Sub Category Edit</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form id="form_edit" method="" enctype="multipart/form-data">

						<div class="mb-3">
							<label for="Edit_category_name" class="col-form-label">Sub Category Name:</label>
							<input type="text" class="form-control" name="category-name" id="Edit_category_name">
						</div>
						<div class="mb-3">
							<label for="edit_category_image" class="col-form-label">SubCategory Image:</label>
							<input type="file" accept="image/png, image/gif, image/jpeg" class="form-control-file" name="image" id="edit_category_image">
						</div>
						<input type="hidden" value="" name="category_id" id="edit_category_id">
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="button" id="update" class="btn btn-primary" data-bs-dismiss="modal">Updated</button>
				</div>
			</div>
		</div>
	</div>
	</div>
	@include('scrpit')

	<script>
		$(document).ready(() => {
			$("#blah").hide();
			$.ajaxSetup({
				headers: {
					'X-CSRF-Token': '{{csrf_token() }}'
				}
			})
			jQuery.ajax({
				url: "{{ url('/tableData') }}",
				method: 'GET',
				success: function(result) {
					$("tbody").html(result)
				},
                error:function(data){
					$("tbody").html("Error")
                }
			});
		})

		$("#subcatdelete").click(()=>{
			console.log("Hello");
             var fordata =  new FormData($("#form_delete")[0])  
			 $.ajax({
				 url :"{{url('/deleteSubcategory')}}",
				 method:'POST',
				 data: fordata,
				contentType: false,
				processData: false,
				success: function(result) {
					console.log("Suss")
				},
                error:function(data){
					console.log("eror")
                }
			 })         
		})

	</script>
</body>
</html>