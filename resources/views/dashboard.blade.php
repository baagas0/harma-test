@extends('layouts.app')
@push('title', 'Master Data')
@section('content')
<!--begin::Card-->
<div class="card card-custom">
	<div class="card-header flex-wrap border-0 pt-6 pb-0">
		<div class="card-title">
			<h3 class="card-label">Data Product
			<span class="d-blocktext-muted pt-2 font-size-sm"></span></h3>
		</div>
		<div class="card-toolbar">
			<!--begin::Dropdown-->
			<div class="dropdown dropdown-inline mr-2">
				<button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<span class="svg-icon svg-icon-md">
					<!--begin::Svg Icon | path:assets/media/svg/icons/Design/PenAndRuller.svg-->
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
							<rect x="0" y="0" width="24" height="24" />
							<path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3" />
							<path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000" />
						</g>
					</svg>
					<!--end::Svg Icon-->
				</span>Export & Import</button>
				<!--begin::Dropdown Menu-->
				<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
					<!--begin::Navigation-->
					<ul class="navi flex-column navi-hover py-2">
						<li class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">Choose an option:</li>
						<li class="navi-item">
							<a href="{{ route('dashboard.sample.product.import') }}" class="navi-link">
								<span class="navi-icon">
									<i class="la la-print"></i>
								</span>
								<span class="navi-text">Template Excel</span>
							</a>
						</li>
						<li class="navi-item">
							<a href="#" class="navi-link" data-toggle="modal" data-target="#importModal">
								<span class="navi-icon">
									<i class="la la-copy"></i>
								</span>
								<span class="navi-text">Import</span>
							</a>
						</li>
						<li class="navi-item">
							<a href="{{ route('dashboard.product.export') }}" class="navi-link">
								<span class="navi-icon">
									<i class="la la-file-excel-o"></i>
								</span>
								<span class="navi-text">Export</span>
							</a>
						</li>
					</ul>
					<!--end::Navigation-->
				</div>
				<!--end::Dropdown Menu-->
			</div>
			<!--end::Dropdown-->
			<!--begin::Button-->
			<a href="{{ route('dashboard.product.create') }}" class="btn btn-primary font-weight-bolder">
			<span class="svg-icon svg-icon-md">
				<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
					<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						<rect x="0" y="0" width="24" height="24" />
						<circle fill="#000000" cx="9" cy="15" r="6" />
						<path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
					</g>
				</svg>
				<!--end::Svg Icon-->
			</span>New Record</a>
			<!--end::Button-->
		</div>
	</div>
	<div class="card-body">
		<!--begin: Search Form-->
		<!--begin::Search Form-->
		<div class="mb-7">
			<div class="row align-items-center">
				<div class="col-lg-9 col-xl-8">
					<div class="row align-items-center">
						<div class="col-md-4 my-2 my-md-0">
							<div class="input-icon">
								<input type="text" class="form-control" placeholder="Search..." id="kt_datatable_search_query" />
								<span>
									<i class="flaticon2-search-1 text-muted"></i>
								</span>
							</div>
						</div>
						<div class="col-md-4 my-2 my-md-0">
							<div class="d-flex align-items-center">
								<a href="#" class="btn btn-light-primary px-6 font-weight-bold">Search</a>
								<button id="refreshData" class="btn btn-light-warning px-6 font-weight-bold ml-3">Refresh</button>
								
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">
				</div>
			</div>
		</div>
		<!--end::Search Form-->
		<!--end: Search Form-->

		<!--begin: Datatable-->
		<div class="datatable datatable-bordered datatable-head-custom" id="kt_datatable"></div>
		<!--end: Datatable-->

		<div class="modal fade" id="importModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="importModal" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="importModalLabel">Import Data Product</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<i aria-hidden="true" class="ki ki-close"></i>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>File Excel</label>
							<div></div>
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="import_data_file"/>
								<label class="custom-file-label" for="customFile">Choose file</label>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
						<button type="button" id="importModalSave" data-button-type="update" class="btn btn-primary font-weight-bold">Proccess</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--end::Card-->

@endsection
@push('js')
<script type="text/javascript">
	'use strict';
// Class definition

var KTDefaultDatatableDemo = function() {
	// basic demo
	var table = function() {

		var datatable = $('#kt_datatable').KTDatatable({
			// datasource definition
			data: {
				type: 'remote',
				source: {
					read: {
						url: '{{ route('dashboard.data') }}',
					},
				},
				pageSize: 5, // display 20 records per page
				serverPaging: true,
				serverFiltering: true,
				serverSorting: true,
				// autoColumns: true,
			},

			// layout definition
			layout: {
				scroll: true, // enable/disable datatable scroll both horizontal and vertical when needed.
				minHeight: null, // datatable's body's fixed height
				footer: false, // display/hide footer
				// spinner: {
					// type: 'none',
				// }
			},

			// column sorting
			sortable: true,

			// toolbar
			toolbar: {
				// toolbar placement can be at top or bottom or both top and bottom repeated
				placement: ['bottom'],

				// toolbar items
				items: {
					// pagination
					pagination: {
						// page size select
						pageSizeSelect: [5, 10, 20, 30, 50], // display dropdown to select pagination size. -1 is used for "ALl" option
					},
				},
			},

			search: {
				input: $('#kt_datatable_search_query'),
				key: 'name'
			},

			// columns definition
			columns: [
				{
					field: 'RecordID',
					title: '#',
					sortable: false,
					width: 30,
					type: 'number',
					selector: {class: 'checkbox'},
					textAlign: 'center',
				}, {
					field: 'sku',
					title: 'SKU',
				}, {
					field: 'status',
					title: 'Status',
				}, {
					field: 'name',
					title: 'Nama',
				}, {
					field: 'brand.name',
					title: 'Brand',
				}, {
					field: 'category.name',
					title: 'Category',
				}, {
					field: 'rupiah_price',
					title: 'Price',
				}, {
					field: 'Record',
					title: 'Stock Status',
					autoHide: false,
					// callback function support for column rendering
					template: function(row) {
						var status = {
							0: {'title': 'Not Ready', 'state': 'danger'},
							1: {'title': 'Ready', 'state': 'primary'},
						};
						return '<span class="label label-' + status[row.stock_status].state + ' label-dot mr-2"></span><span class="font-weight-bold text-' + status[row.stock_status].state +
							'">' +
							status[row.stock_status].title + '</span>';
					},
				}, {
					field: 'stock',
					title: 'Stok',
				}, {
					field: 'unit',
					title: 'UoM',
				}, {
					field: 'Record status',
					title: 'Stock Selalu Tersedia',
					autoHide: false,
					// callback function support for column rendering
					template: function(row) {
						var status = {
							'false': {'title': 'Tidak', 'state': 'danger'},
							'true' : {'title': 'Iya', 'state': 'primary'},
						};
						return '<span class="label label-' + status[row.always_ready_stock].state + ' label-dot mr-2"></span><span class="font-weight-bold text-' + status[row.always_ready_stock].state +
							'">' +
							status[row.always_ready_stock].title + '</span>';
					},
				}, 
				{
					field: 'wight_kg',
					title: 'Berat(Kg)',
				}, 
				{
					field: 'leght',
					title: 'Panjang(cm)',
				}, 
				{
					field: 'wide',
					title: 'Lebar(cm)',
				}, 
				{
					field: 'high',
					title: 'Tinggi(cm)',
				}, 
				{
					field: 'minimum_buying',
					title: 'Pembelian Minimal',
				}, 
				{
					field: 'multiple_buying',
					title: 'Kelipatan Pembelian',
				},  {
					field: 'act',
					title: 'Actions',
					template: function(row) {
						return '\
	                        <a href="{{ route('dashboard.product.update') }}/'+row.id+'" class="btn btn-sm btn-clean btn-icon mr-2" title="Edit details">\
	                            <span class="svg-icon svg-icon-md">\
	                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
	                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
	                                        <rect x="0" y="0" width="24" height="24"/>\
	                                        <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero"\ transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>\
	                                        <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>\
	                                    </g>\
	                                </svg>\
	                            </span>\
	                        </a>\
	                        <form method="POST" action="{{ route('dashboard.product.delete') }}/'+row.id+'">\
	                        @csrf\
	                        <button class="btn btn-sm btn-clean btn-icon deleteData" title="Delete">\
	                            <span class="svg-icon svg-icon-md">\
	                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
	                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
	                                        <rect x="0" y="0" width="24" height="24"/>\
	                                        <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/>\
	                                        <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>\
	                                    </g>\
	                                </svg>\
	                            </span>\
	                        </button>\
	                        </form>\
	                    ';
					},
				},
			],

		});
		
		$('#refreshData').on('click', function(){
			datatable.reload();
		})
		$('#edit').on('click', function(){

		})

		$('#kt_datatable_search_status').on('change', function() {
			datatable.search($(this).val().toLowerCase(), 'Status');
		});

		$('#kt_datatable_search_type').on('change', function() {
			datatable.search($(this).val().toLowerCase(), 'Type');
		});

		$('#kt_datatable_search_status, #kt_datatable_search_type').selectpicker();

	};

	var initCustom = function () {
		$('#importModalSave').on('click', function() {
			var formData = new FormData();
			formData.append('file', $('#import_data_file')[0].files[0]);

			KTApp.block('#importModal .modal-content', {
				overlayColor: '#000000',
				state: 'danger',
				message: 'Memproses...'
			});

			$.ajax({
				type:'POST',
				url: '{{ route('dashboard.product.import') }}',
				data: formData,
				cache:false,
				contentType: false,
				processData: false,
				success:function(data){
					KTApp.unblock('#importModal .modal-content');
					$('#importModal').modal('hide');
					toastr.success('Data Berhasil di input.');
					$('#refreshData').trigger('click');
					console.log(data);
				},
				error: function(data){
					KTApp.unblock('#importModal .modal-content');
					toastr.error('Cek file excel anda atau hubungi developer.');
					console.log(data);
				}
			});
		});
	}

	return {
		// public functions
		init: function() {
			table();
			initCustom();
		},
	};
}();

jQuery(document).ready(function() {
	KTDefaultDatatableDemo.init();
});

</script>
@endpush