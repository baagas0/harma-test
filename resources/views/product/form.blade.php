@extends('layouts.app')
@push('title', 'Input Data Kelulusan')
@section('content')
	<!--begin::Notice-->
	<div class="alert alert-custom alert-white alert-shadow gutter-b" role="alert">
		<div class="alert-icon">
			<span class="svg-icon svg-icon-primary svg-icon-xl">
				<!--begin::Svg Icon | path:assets/media/svg/icons/Tools/Compass.svg-->
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
					<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						<rect x="0" y="0" width="24" height="24" />
						<path d="M7.07744993,12.3040451 C7.72444571,13.0716094 8.54044565,13.6920474 9.46808594,14.1079953 L5,23 L4.5,18 L7.07744993,12.3040451 Z M14.5865511,14.2597864 C15.5319561,13.9019016 16.375416,13.3366121 17.0614026,12.6194459 L19.5,18 L19,23 L14.5865511,14.2597864 Z M12,3.55271368e-14 C12.8284271,3.53749572e-14 13.5,0.671572875 13.5,1.5 L13.5,4 L10.5,4 L10.5,1.5 C10.5,0.671572875 11.1715729,3.56793164e-14 12,3.55271368e-14 Z" fill="#000000" opacity="0.3" />
						<path d="M12,10 C13.1045695,10 14,9.1045695 14,8 C14,6.8954305 13.1045695,6 12,6 C10.8954305,6 10,6.8954305 10,8 C10,9.1045695 10.8954305,10 12,10 Z M12,13 C9.23857625,13 7,10.7614237 7,8 C7,5.23857625 9.23857625,3 12,3 C14.7614237,3 17,5.23857625 17,8 C17,10.7614237 14.7614237,13 12,13 Z" fill="#000000" fill-rule="nonzero" />
					</g>
				</svg>
				<!--end::Svg Icon-->
			</span>
		</div>
		<div class="alert-text">Please fill form with a valid data.</div>
	</div>
	<!--end::Notice-->
	<!--begin::Card-->
	<div class="card card-custom">
		<form method="POST" action="{{ $type == 'create' ? route('dashboard.product.saving') : route('dashboard.product.updating', $data->id) }}">
			@csrf
			<div class="card-body">
				<h3 class="font-size-lg text-dark font-weight-bold mb-6">1. Product Info:</h3>
				<div class="mb-15">
					<div class="form-group row">
						<label class="col-lg-3 col-form-label">SKU:</label>
						<div class="col-lg-9 input-group">
							<input type="text" id="sku" name="sku" class="form-control" {{ $type=='create' ? '' : 'disabled' }} placeholder="Enter sku of product" value="{{ isset($data) ? $data->sku : '' }}" />
							<div class="input-group-append" {{ $type=='create' ? '' : 'hidden' }}>
								<button type="button" id="genSKU" class="btn btn-secondary" type="button">Auto Generate</button>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-lg-3 col-form-label">Name:</label>
						<div class="col-lg-9">
							<input type="text" class="form-control" name="name" placeholder="Enter name" value="{{ isset($data) ? $data->name : '' }}" />
							<span class="form-text text-muted">Please enter name of product</span>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-lg-3 col-form-label">Price:</label>
						<div class="col-lg-9">
							<input type="number" class="form-control" name="price" placeholder="Enter product price" value="{{ isset($data) ? $data->price : '' }}" />
							<span class="form-text text-muted">Please just enter a numeric only</span>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-lg-3 col-form-label">Brand:</label>
						<div class="col-lg-9">
							<select class="form-control select2" id="brand_select" name="brand_id">
								@foreach($brands as $brand)
								<option {{ (!isset($data) ? '' : ($data->brand_id == $brand->id ? 'selected' : '')) }} value="{{ $brand->id }}">{{ $brand->name }}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-lg-3 col-form-label">Category:</label>
						<div class="col-lg-9">
							<select class="form-control select2" id="category_select" name="category_id">
								@foreach($categories as $category)
								<option {{ (!isset($data) ? '' : ($data->category_id == $category->id ? 'selected' : '')) }} value="{{ $category->id }}">{{ $category->name }}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group row align-items-center">
						<label class="col-lg-3 col-form-label">Status:</label>
						<div class="col-lg-9">
							<div class="radio-inline">
								<label class="radio radio-outline radio-danger">
									<input type="radio" name="status" value="Non Aktif" {{ (!isset($data) ? '' : ($data->status == 'Non Aktif' ? 'checked' : '')) }}/>
									<span></span>
									Non Aktif
								</label>
								<label class="radio radio-outline radio-success">
									<input type="radio" name="status" value="Aktif" {{ (!isset($data) ? 'checked' : ($data->status == 'Aktif' ? 'checked' : '')) }} />
									<span></span>
									Aktif
								</label>
							</div>
						</div>
					</div>
					<div class="form-group row align-items-center">
						<label class="col-lg-3 col-form-label">Unit Type:</label>
						<div class="col-lg-9">
							<div class="radio-inline">
								<label class="radio radio-outline radio-success">
									<input type="radio" name="unit" value="Box" {{ (!isset($data) ? '' : ($data->unit == 'Box' ? 'checked' : '')) }}/>
									<span></span>
									Box
								</label>
								<label class="radio radio-outline radio-success">
									<input type="radio" name="unit" value="Lusin" {{ (!isset($data) ? '' : ($data->unit == 'Lusin' ? 'checked' : '')) }}/>
									<span></span>
									Lusin
								</label>
								<label class="radio radio-outline radio-success">
									<input type="radio" name="unit" value="Pack" {{ (!isset($data) ? '' : ($data->unit == 'Pack' ? 'checked' : '')) }}/>
									<span></span>
									Pack
								</label>
								<label class="radio radio-outline radio-success">
									<input type="radio" name="unit" value="Pcs" {{ (!isset($data) ? 'checked' : ($data->unit == 'Pcs' ? 'checked' : '')) }}/>
									<span></span>
									Pcs
								</label>
								<label class="radio radio-outline radio-success">
									<input type="radio" name="unit" value="Roll" {{ (!isset($data) ? '' : ($data->unit == 'Roll' ? 'checked' : '')) }}/>
									<span></span>
									Roll
								</label>
								<label class="radio radio-outline radio-success">
									<input type="radio" name="unit" value="Slop" {{ (!isset($data) ? '' : ($data->unit == 'Slop' ? 'checked' : '')) }}/>
									<span></span>
									Slop
								</label>
							</div>
						</div>
					</div>
					<div class="form-group row align-items-center">
						<label class="col-lg-3 col-form-label">stock always available:</label>
						<div class="col-lg-9">
							<div class="radio-inline">
								<label class="radio radio-outline radio-danger">
									<input type="radio" name="always_ready_stock" value="false" {{ (!isset($data) ? 'checked' : ($data->always_ready_stock == 'false' ? 'checked' : '')) }}/>
									<span></span>
									No
								</label>
								<label class="radio radio-outline radio-success">
									<input type="radio" name="always_ready_stock" value="true" {{ (!isset($data) ? '' : ($data->always_ready_stock == 'true' ? 'checked' : '')) }}/>
									<span></span>
									Yes
								</label>
							</div>
						</div>
					</div>
					<div class="form-group row" id="fieldset_stock">
						<label class="col-lg-3 col-form-label">Stock:</label>
						<div class="col-lg-9">
							<input type="number" id="stock" name="stock" class="form-control" placeholder="Enter stock" value="{{ isset($data) ? $data->stock : '' }}"/>
							<span class="form-text text-muted">Please just enter a numeric only</span>
						</div>
					</div>
				</div>

				<h3 class="font-size-lg text-dark font-weight-bold mb-6">2. Detail Product:</h3>
				<div class="mb-3">
					<div class="form-group row">
						<label class="col-lg-3 col-form-label">Wight:</label>
						<div class="col-lg-9 input-group">
							<input type="number" class="form-control" name="wight" placeholder="Enter wight of product" value="{{ isset($data) ? $data->wight : '' }}"/>
							<div class="input-group-append">
								<span class="btn btn-secondary" type="button">Gr</span>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-lg-3 col-form-label">Leght:</label>
						<div class="col-lg-9 input-group">
							<input type="number" class="form-control" name="leght" placeholder="Enter Leght of product" value="{{ isset($data) ? $data->leght : '' }}"/>
							<div class="input-group-append">
								<span class="btn btn-secondary" type="button">Cm</span>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-lg-3 col-form-label">Wide:</label>
						<div class="col-lg-9 input-group">
							<input type="number" class="form-control" name="wide" placeholder="Enter Wide of product" value="{{ isset($data) ? $data->wide : '' }}"/>
							<div class="input-group-append">
								<span class="btn btn-secondary" type="button">Cm</span>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-lg-3 col-form-label">High:</label>
						<div class="col-lg-9 input-group">
							<input type="number" class="form-control" name="high" placeholder="Enter High of product" value="{{ isset($data) ? $data->high : '' }}"/>
							<div class="input-group-append">
								<span class="btn btn-secondary" type="button">Cm</span>
							</div>
						</div>
					</div>
				</div>

				<h3 class="font-size-lg text-dark font-weight-bold mb-6">3. Buying Option:</h3>
				<div class="mb-3">
					<div class="form-group row">
						<label class="col-lg-3 col-form-label">Minimum Buying:</label>
						<div class="col-lg-9 input-group">
							<input type="number" class="form-control" name="minimum_buying" placeholder="Enter minimum buying of product" value="{{ isset($data) ? $data->minimum_buying : '' }}"/>
							<div class="input-group-append">
								<span class="btn btn-secondary unit_type_text" type="button">Pcs</span>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-lg-3 col-form-label">Buy Multiples:</label>
						<div class="col-lg-9 input-group">
							<input type="number" class="form-control" name="multiple_buying" placeholder="Enter buy multiples of product" value="{{ isset($data) ? $data->multiple_buying : '' }}"/>
							<div class="input-group-append">
								<span class="btn btn-secondary unit_type_text" type="button">Pcs</span>
							</div>
						</div>
					</div>
				</div>

				<h3 class="font-size-lg text-dark font-weight-bold mb-6">4. Product Description:</h3>
				<div class="mb-3">
					<div class="form-group mb-1">
						<textarea class="form-control" id="description" name="description" rows="3">{{ isset($data) ? $data->description : '' }}</textarea>
					</div>
				</div>
			</div>
			<div class="card-footer">
				<div class="row">
					<div class="col-lg-3"></div>
					<div class="col-lg-6">
						<button type="submit" class="btn btn-success mr-2">Submit</button>
						<button type="reset" class="btn btn-secondary">Reset</button>
					</div>
				</div>
			</div>
		</form>
	</div>
	<!--end::Card-->
@endsection
@push('css')
<link href="/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
@endpush
@push('js')
{{-- <script src="/assets/js/pages/crud/file-upload/dropzonejs.js"></script> --}}
<script src="/assets/plugins/custom/datatables/datatables.bundle.js"></script>
<script>
	var KTSelect2 = function() {
		var select = function() {
			$('#brand_select').select2({
				placeholder: "Select brand",
				allowClear: true
			});
			$('#category_select').select2({
				placeholder: "Select category",
				allowClear: true
			});
		}
		var form_mask = function () {
			$('input[name="unit"]').on('change', function() {
				var val = $(this).val();

				$('.unit_type_text').text(val);
			});

			$('input[name="always_ready_stock"]').on('change', function() {
				var val = $(this).val();

				if (val == 'false') {
					$('#fieldset_stock').show();
				}else {
					$('#fieldset_stock').hide();
				}
			});
		}
		var ajax = function() {
			$('#genSKU').on('click', function() {
				$.ajax({
					type:'GET',
					url: '{{ route('dashboard.gen.sku') }}',
					cache:false,
					contentType: false,
					processData: false,
					success:function(data){
						$('#sku').val(data);
					},
					error: function(data){
						alert("error");
						console.log(data);
					}
				});
			})
		}

		return {
			init: function() {
				select();
				form_mask();
				ajax();
			}
		};
	}();

	jQuery(document).ready(function() {
		KTSelect2.init();
	});

</script>
@endpush