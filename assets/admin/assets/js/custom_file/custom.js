$(document).ready(function(){
	
	

	$('#add_vehicle_admin').on('click', function(e){
		e.preventDefault();

		var formData = new FormData($('#add_vehicle_admin_form')[0]);
		
		$.ajax({
			url: $('#add_vehicle_admin_form').attr('data-action'),
			type: 'post',
			data: $('#add_vehicle_admin_form').serialize(),
			success: function (response) {
				if(response.error) {
					$('#vehicle_form_error').show();
					$('#vehicle_form_error').html(response.message);
					return false;
				} else {

					$('.image_name_field_class').remove();
					$('.image_size_field_class').remove();
					var element = '<input type="file" name="user_files[]" multiple class="temp_images >"';
					var counter = 1;
					var index_file = 0;
				    $('.kv-preview-thumb .kv-preview-data').each(function(){
				    	$('#add_vehicle_admin_form').append($("#image_name_field").clone().prop({ id: "image_name_field"+counter, name: "files[]", value: $(this).attr('title'), class: "image_name_field_class"}));
				    	$('#add_vehicle_admin_form').append(element);

				    	// formData.append('user_files[]', $('#input-fa-1').prop('files')[index_file], $(this).attr('title'));
				    	counter++;
				    	index_file++;
				    	
				    });
				    $('.kv-preview-thumb .file-size-info samp').each(function(){
				    	$('#add_vehicle_admin_form').append($("#image_name_field").clone().prop({ id: "image_size_field"+counter, name: "sizes[]", value: $(this).html(), class: "image_size_field_class"}));
				    });
				    //console.log(formData);
				    /*$.ajax({
				    	url: $('#add_vehicle_admin_form').attr('action'),
				    	type: 'POST',
				        data: formData,
				        mimeType:"multipart/form-data",
				        contentType: false,
				        cache: false,
				        processData: false,
				    	success: function(response) {
				    		console.log(response);
				    	}
				    });*/
				    // return false;
					$('#add_vehicle_admin_form').submit();
				}
			}
		});

		return false;
	});

	$('#add_vehicle_vendor').on('click', function(e){
		e.preventDefault();
		$('.image_name_field_class').remove();
		$('.image_size_field_class').remove();
		var counter = 1;
		var index_file = 0;
	    $('.kv-preview-thumb .kv-preview-data').each(function(){
	    	$('#add_vehicle_vendor_form').append($("#image_name_field").clone().prop({ id: "image_name_field"+counter, name: "files[]", value: $(this).attr('title'), class: "image_name_field_class"}));

	    	// formData.append('user_files[]', $('#input-fa-1').prop('files')[index_file], $(this).attr('title'));
	    	counter++;
	    	index_file++;
	    	
	    });
	    $('.kv-preview-thumb .file-size-info samp').each(function(){
	    	$('#add_vehicle_vendor_form').append($("#image_name_field").clone().prop({ id: "image_size_field"+counter, name: "sizes[]", value: $(this).html(), class: "image_size_field_class"}));
	    });
	    
		$('#add_vehicle_vendor_form').submit();
	});

	$('#vehicle_edit_admin').on('click', function(e){
		e.preventDefault();
		$('.image_name_field_class').remove();
		$('.image_size_field_class').remove();
		var counter = 1;
		var index_file = 0;
	    $('.kv-preview-thumb .kv-preview-data').each(function(){
	    	$('#vehicle_edit_admin_form').append($("#image_name_field").clone().prop({ id: "image_name_field"+counter, name: "files[]", value: $(this).attr('title'), class: "image_name_field_class"}));

	    	// formData.append('user_files[]', $('#input-fa-1').prop('files')[index_file], $(this).attr('title'));
	    	counter++;
	    	index_file++;
	    	
	    });
	    $('.kv-preview-thumb .file-size-info samp').each(function(){
	    	$('#vehicle_edit_admin_form').append($("#image_name_field").clone().prop({ id: "image_size_field"+counter, name: "sizes[]", value: $(this).html(), class: "image_size_field_class"}));
	    });
	    
		$('#vehicle_edit_admin_form').submit();
	});
});
// EXPERRIENCES MODULE START
// $('#add_experience_admin').on('click', function(e)
// {
// 		e.preventDefault();
// 		alert($('#add_experience_admin_form').attr('data-action'));
// 		var formData = new FormData($('#add_experience_admin_form')[0]);
// 		$.ajax({
// 			url: $('#add_experience_admin_form').attr('data-action'),
// 			type: 'post',
// 			data: $('#add_experience_admin_form').serialize(),
// 			success: function (response) {
// 				console.log(response);
// 				return false;
// 				if(response.error) {
// 					$('#vehicle_form_error').show();
// 					$('#vehicle_form_error').html(response.message);
// 					return false;
// 				} else {

// 					$('.image_name_field_class').remove();
// 					$('.image_size_field_class').remove();
// 					var element = '<input type="file" name="user_files[]" multiple class="temp_images >"';
// 					var counter = 1;
// 					var index_file = 0;
// 				    $('.kv-preview-thumb .kv-preview-data').each(function(){
// 				    	$('#add_experience_admin_form').append($("#image_name_field").clone().prop({ id: "image_name_field"+counter, name: "files[]", value: $(this).attr('title'), class: "image_name_field_class"}));
// 				    	$('#add_experience_admin_form').append(element);

// 				    	// formData.append('user_files[]', $('#input-fa-1').prop('files')[index_file], $(this).attr('title'));
// 				    	counter++;
// 				    	index_file++;
				    	
// 				    });
// 				    $('.kv-preview-thumb .file-size-info samp').each(function(){
// 				    	$('#add_experience_admin_form').append($("#image_name_field").clone().prop({ id: "image_size_field"+counter, name: "sizes[]", value: $(this).html(), class: "image_size_field_class"}));
// 				    });
// 					$('#add_experience_admin_form').submit();
// 				}
// 			}
// 		});

// 		return false;
// 	});
// EXPERRIENCES MODULE ENDS
// DYNAMIC PGES ABOUT US REQUEST START
$('#update_about_us_btn').on('click', function(e){

	// return false;
		e.preventDefault();	
		$.ajax({
			url: $('#form_action').val(),
			type: 'post',
			data: $('#update_about_us_admin_form').serialize(),
			success: function (response) 
			{
				window.location.reload(true);
			}
		});
	});
// DYNAMIC PAGES ABOUT US REQUST ENS
// DYNAMIC PAGES CONTACT US PAGE START
$('#update_contact_us_btn').on('click', function(e){
	// alert($('#form_action').val());
	// return false;
		e.preventDefault();	
		$.ajax({
			url: $('#form_action').val(),
			type: 'post',
			data: $('#update_contact_us_admin_form').serialize(),
			success: function (response) 
			{
				window.location.reload(true);
			}
		});
	});
// DYNAMIC PAGES CONTACT US PAGE END
// DYNAMIC PAGES PRIVACY POLICY PAGE START
$('#update_privacy_policy_btn').on('click', function(e){
	// alert($('#form_action').val());
	// return false;
		e.preventDefault();	
		$.ajax({
			url: $('#form_action').val(),
			type: 'post',
			data: $('#update_privacy_policy_form').serialize(),
			success: function (response) 
			{
				window.location.reload(true);
			}
		});
	});
// DYNAMIC PAGES PRIVACY POLICY PAGE END
// DYNAMIC PAGES TERMS ANDS CONDITIONS PAGE START

$('#update_terms_conditions_btn').on('click', function(e){
	// alert($('#form_action').val());
	// return false;
		e.preventDefault();	
		$.ajax({
			url: $('#form_action').val(),
			type: 'post',
			data: $('#update_terms_conditions_admin_form').serialize(),
			success: function (response) 
			{
				window.location.reload(true);
			}
		});
	});
// DYNAMIC PAGES TERMS ANDS CONDITIONS PAGE ENDS



$('#calendar').datepicker({
		});

!function ($) {
    $(document).on("click","ul.nav li.parent > a ", function(){          
        $(this).find('em').toggleClass("fa-minus");      
    }); 
    $(".sidebar span.icon").find('em:first').addClass("fa-plus");
}

(window.jQuery);
	$(window).on('resize', function () {
  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
})
$(window).on('resize', function () {
  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
})

$(document).on('click', '.panel-heading span.clickable', function(e){
    var $this = $(this);
	if(!$this.hasClass('panel-collapsed')) {
		$this.parents('.panel').find('.panel-body').slideUp();
		$this.addClass('panel-collapsed');
		$this.find('em').removeClass('fa-toggle-up').addClass('fa-toggle-down');
	} else {
		$this.parents('.panel').find('.panel-body').slideDown();
		$this.removeClass('panel-collapsed');
		$this.find('em').removeClass('fa-toggle-down').addClass('fa-toggle-up');
	}
})
// HOME SLIDER SECTION START
$('#home_slider_table').DataTable();
// HOME SLIDER SECTION ENDS
$('#example').DataTable({
	"ordering": false,
	"order": [],
        "columnDefs": [ {

        "targets": [4, 5, 6], // column or columns numbers

        "orderable": false,  // set orderable for selected columns

        }],
});

 $('#vehicle_list').DataTable( {
        "order": [],
        "columnDefs": [ {

        "targets": [7, 8, 9], // column or columns numbers

        "orderable": false,  // set orderable for selected columns

        }],
    } );

 $('#approval_list').DataTable( {
        "order": [],
        "columnDefs": [ {

        "targets": [6, 7], // column or columns numbers

        "orderable": false,  // set orderable for selected columns

        }],
    } );

 $('#currency').DataTable({
 	"order": [[ 0, "asc" ]],
 	"columnDefs": [ {

        "targets": [3, 4], // column or columns numbers

        "orderable": false,  // set orderable for selected columns

        }],
 });

 $('#assign_vendor').DataTable( {
        "order": [[ 2, "asc" ]]
    } );

 $('#brands_list').DataTable( {
        "order": [[ 3, "desc" ]],
        "columnDefs": [ {

        "targets": [4, 5], // column or columns numbers

        "orderable": false,  // set orderable for selected columns

        }],
    } );

 $('#orders').DataTable( {
        "order": [[ 0, "desc" ]]
    } );

$('#vendor_filter').on('change', function(){
	$.ajax({
		url: $(this).attr('data-url'),
		type: 'post',
		data: {vendor: $(this).val(), category: $('#vehicle_category_filter').val()},
		success: function(response) {
			$('#vehicle_list').remove();
			$('#vehicle_list_table').html(response.html);
			$('#vehicle_list').DataTable( {
		       "order": [],
		       "columnDefs": [ {

		       "targets": [7, 8, 9], // column or columns numbers

		       "orderable": false,  // set orderable for selected columns

		       }],
		   } );
		}
	});
});

$('#vehicle_category_filter').on('change', function(){
	$.ajax({
		url: $(this).attr('data-url'),
		type: 'post',
		data: {vendor: $('#vendor_filter').val(), category: $(this).val()},
		success: function(response) {
			$('#vehicle_list').remove();
			$('#vehicle_list_table').html(response.html);
			$('#vehicle_list').DataTable( {
		       "order": [],
		       "columnDefs": [ {

		       "targets": [7, 8, 9], // column or columns numbers

		       "orderable": false,  // set orderable for selected columns

		       }],
		   } );
		}
	});
});

$('#vendor_select').on('change', function(){
	$.ajax({
		url: $('#vendor_select').attr('data-url'),
		type: 'post',
		data: {vendor_id: $('#vendor_select').val()},
		success: function(response) {
			$('#vehicle_category').remove();
			$('#vehicle_category_admin').append(response.select_category);
		}
	});
});

$(document.body).on('change', '#vehicle_category', function(){
	$.ajax({
		url: $('#vehicle_category').attr('data-url'),
		type: 'post',
		data: {category: $('#vehicle_category').val()},
		success: function(response) {
			if($('#vehicle_category').val() == 'Yacht' || $('#vehicle_category').val() == 'Rentals') {
				$('#vehicle_select_admin').remove();
				$('#vehicle_extra').remove();
				$('#vehicle_extra_div').append(response.extra);
				$('#vehicle_name_input').show();
				$('#vehicle_name_input').prop('required', 'true');
				$('#yacht_description').show();
				$('#vehicle_description_title').prop('required', 'true');
				$('#vehicle_description').prop('required', 'true');
				$('#include_details').remove();
				$('#brand_select').remove();
				$('#includes').html(response.includes);
				console.log(response.includes);
			} else {
				$('#vehicle_select_admin').remove();
				$('#vehicle_select_admin_div').append(response.vehicle_select);
				$('#vehicle_extra').remove();
				$('#vehicle_extra_div').append(response.extra);
				$('#vehicle_name_input').hide();
				$('#vehicle_name_input').val('');
				$('#vehicle_name_input').removeAttr('required');
				$('#yacht_description').hide();
				$('#vehicle_description_title').removeAttr('required');
				$('#vehicle_description').removeAttr('required');
				$('#include_details').remove();
				$('#brand_select').remove();
				$('#service_brands_div').html(response.brands);
				$('#includes').html(response.includes);
				console.log(response.brands);
			}
			
			$.ajax({
				url: $(this).attr('data-url'),
				type: 'post',
				data: {category: $(this).val()},
				success: function(response) {
					$('#vehicle_extra').remove();
					$('#vehicle_extra_div').append(response.extras);
				}
			});
		}
	});
	if($(this).val() == 'Car') {
		$('#vehicle_rates_daily').show();
		$('#vehicle_rates_hourly').hide();
		$('#car_limo').show();
		$('#yacht_rates').hide();
		$('#heli_fields').hide();
		$('#car_limo input').prop('required', true);
		$('#vehicle_rates_daily input').prop('required', true);
		$('#vehicle_rates_hourly input').removeAttr('required');
		$('#yacht_rates input').removeAttr('required');
		$('#heli_fields input').removeAttr('required');
	} else if($(this).val() == 'Limo') {
		$('#vehicle_rates_daily').hide();
		$('#vehicle_rates_hourly').show();
		$('#car_limo').show();
		$('#yacht_rates').hide();
		$('#heli_fields').hide();
		$('#car_limo input').prop('required', true);
		$('#vehicle_rates_daily input').removeAttr('required');
		$('#yacht_rates input').removeAttr('required');
		$('#vehicle_rates_hourly input').prop('required', true);
		$('#heli_fields input').removeAttr('required');
	} else if($(this).val() == 'Yacht') {
		$('#vehicle_rates_daily').hide();
		$('#vehicle_rates_hourly').hide();
		$('#yacht_rates').show();
		$('#car_limo').hide();
		$('#heli_fields').hide();
		$('#car_limo input').removeAttr('required');
		$('#vehicle_rates_daily input').removeAttr('required');
		$('#vehicle_rates_hourly input').removeAttr('required');
		$('#yacht_rates input').prop('required', true);
		$('#heli_fields input').removeAttr('required');
		$('.cbox-yacht').removeAttr('required');
	} else if($(this).val() == 'Rentals') {
		$('#vehicle_rates_daily').hide();
		$('#vehicle_rates_hourly').hide();
		$('#yacht_rates').hide();
		$('#car_limo').hide();
		$('#rentals').show();
		$('#heli_fields').hide();
		$('#car_limo input').removeAttr('required');
		$('#vehicle_rates_daily input').removeAttr('required');
		$('#vehicle_rates_hourly input').removeAttr('required');
		$('#rentals input').prop('required', true);
		$('#heli_fields input').removeAttr('required');
		$('#yacht_rates input').removeAttr('required');
		$('.cbox-yacht').removeAttr('required');
	} else if($(this).val() == 'Helicopter') {
		$('#vehicle_rates_daily').hide();
		$('#vehicle_rates_hourly').hide();
		$('#heli_fields').show();
		$('#yacht_rates').hide();
		$('#car_limo').hide();
		$('#car_limo input').removeAttr('required');
		$('#vehicle_rates_daily input').removeAttr('required');
		$('#vehicle_rates_hourly input').removeAttr('required');
		$('#yacht_rates input').removeAttr('required');
		$('#heli_fields input').prop('required', true);
		$('#private_tour_price').removeAttr('required');
	} else {
		$('#vehicle_rates_daily').hide();
		$('#vehicle_rates_hourly').hide();
		$('#car_limo').hide();
		$('#yacht_rates').hide();
		$('#heli_fields').hide();
		$('#car_limo input').removeAttr('required');
		$('#yacht_rates input').removeAttr('required');
		$('#vehicle_rates_daily input').removeAttr('required');
		$('#vehicle_rates_hourly input').removeAttr('required');
		$('#heli_fields input').removeAttr('required');
	}
});



$(document.body).on('click', '.vendor_status', function(){
	
	var data = '';
	if($(this).is(':checked')) {
		data = 1;
	}
	if(!$(this).is(':checked')) {
		data = 0;
	}
	$.ajax({
		url: $(this).attr('data-url'),
		type: 'post',
		data: {vendor_id: $(this).attr('data-vendor-id'), is_verified: data},
		success: function(response) {
			if(response.error) {
				alert('Not updated');
			}
		}
	});
});

$(document.body).on('click', '.currency_status', function(){
	
	var data = '';
	if($(this).is(':checked')) {
		data = 1;
	}
	if(!$(this).is(':checked')) {
		data = 0;
	}
	$.ajax({
		url: $(this).attr('data-url'),
		type: 'post',
		data: {currency_id: $(this).attr('data-currency-id'), is_active: data},
		success: function(response) {
			if(response.error) {
				alert('Not updated');
			}
		}
	});
});


$(document.body).on('click', '.vehicle_status', function(){
	var data = '';
	if($(this).is(':checked')) {
		data = 1;
	}
	if(!$(this).is(':checked')) {
		data = 0;
	}
	$.ajax({
		url: $(this).attr('data-url'),
		type: 'post',
		data: {vehicle_id: $(this).attr('data-vehicle-id'), vehicle_status: data},
		success: function(response) {
			if(response.error) {
				alert('Not updated');
			}
		}
	});
});

$(document.body).on('click','.brand_status', function(){
	var data = '';
	if($(this).is(':checked')) {
		data = 1;
	}
	if(!$(this).is(':checked')) {
		data = 0;
	}
	$.ajax({
		url: $(this).attr('data-url'),
		type: 'post',
		data: {brand_id: $(this).attr('data-brand-id'), brand_status: data},
		success: function(response) {
			if(response.error) {
				alert('Not updated');
			}
		}
	});
});

$(document.body).on('click','.marina_status', function(){
	var data = '';
	if($(this).is(':checked')) {
		data = 1;
	}
	if(!$(this).is(':checked')) {
		data = 0;
	}
	$.ajax({
		url: $(this).attr('data-url'),
		type: 'post',
		data: {marina_id: $(this).attr('data-marina-id'), marina_status: data},
		success: function(response) {
			if(response.error) {
				alert('Not updated');
			}
		}
	});
});

$(document.body).on('click','.helipad_status', function(){
	var data = '';
	if($(this).is(':checked')) {
		data = 1;
	}
	if(!$(this).is(':checked')) {
		data = 0;
	}
	$.ajax({
		url: $(this).attr('data-url'),
		type: 'post',
		data: {helipad_id: $(this).attr('data-helipad-id'), helipad_status: data},
		success: function(response) {
			if(response.error) {
				alert('Not updated');
			}
		}
	});
});

$(document.body).on('click','.extra_status', function(){
	var data = '';
	if($(this).is(':checked')) {
		data = 1;
	}
	if(!$(this).is(':checked')) {
		data = 0;
	}
	$.ajax({
		url: $(this).attr('data-url'),
		type: 'post',
		data: {extra_id: $(this).attr('data-extra-id'), extra_status: data},
		success: function(response) {
			if(response.error) {
				alert('Not updated');
			}
		}
	});
});

$('.include_status').on('click', function(){
	var data = '';
	if($(this).is(':checked')) {
		data = 1;
	}
	if(!$(this).is(':checked')) {
		data = 0;
	}
	$.ajax({
		url: $(this).attr('data-url'),
		type: 'post',
		data: {include_id: $(this).attr('data-include-id'), include_status: data},
		success: function(response) {
			if(response.error) {
				alert('Not updated');
			}
		}
	});
});

$('.yacht_status').on('click', function(){
	var data = '';
	if($(this).is(':checked')) {
		data = 1;
	}
	if(!$(this).is(':checked')) {
		data = 0;
	}
	$.ajax({
		url: $(this).attr('data-url'),
		type: 'post',
		data: {suitable_id: $(this).attr('data-suitable-id'), suitable_status: data},
		success: function(response) {
			if(response.error) {
				alert('Not updated');
			}
		}
	});
});

$('#vehicles_category').on('change', function(){
	$.ajax({
		url: $(this).attr('data-url'),
		type: 'post',
		data: {category: $(this).val()},
		success: function(response) {
			$('#vehicle_extra').remove();
			$('#vehicle_extra_div').append(response.extras);
			$('#include_details').remove();
			$('#includes').html(response.includes);
			$('#brand_select').remove();
			$('#service_brands_div').html(response.brands);
			console.log(response.brands);
		}
	});
	if($('#vehicles_category').val() == 'Car') {
		$('#vehicle_rates_daily').show();
		$('#vehicle_rates_hourly').hide();
		$('#car_limo').show();
		$('#yacht_rates').hide();
		$('#heli_fields').hide();
		$('#car_limo input').prop('required', true);
		$('#vehicle_rates_daily input').prop('required', true);
		$('#vehicle_rates_hourly input').removeAttr('required');
		$('#yacht_rates input').removeAttr('required');
		$('#heli_fields input').removeAttr('required');
		$('.cbox-include').removeAttr('required');
	} else if($('#vehicles_category').val() == 'Limo') {
		$('#vehicle_rates_daily').hide();
		$('#vehicle_rates_hourly').show();
		$('#car_limo').show();
		$('#yacht_rates').hide();
		$('#heli_fields').hide();
		$('#car_limo input').prop('required', true);
		$('#vehicle_rates_daily input').removeAttr('required');
		$('#yacht_rates input').removeAttr('required');
		$('#vehicle_rates_hourly input').prop('required', true);
		$('#heli_fields input').removeAttr('required');
		$('.cbox-include').removeAttr('required');
	}else if($('#vehicles_category').val() == 'Yacht') {
		$('#vehicle_rates_daily').hide();
		$('#vehicle_rates_hourly').hide();
		$('#yacht_rates').show();
		$('#car_limo').hide();
		$('#heli_fields').hide();
		$('#car_limo input').removeAttr('required');
		$('#vehicle_rates_daily input').removeAttr('required');
		$('#vehicle_rates_hourly input').removeAttr('required');
		$('#yacht_rates input').prop('required', true);
		$('#heli_fields input').removeAttr('required');
		$('.cbox-include').removeAttr('required');
	} else if($(this).val() == 'Rentals') {
		$('#vehicle_rates_daily').hide();
		$('#vehicle_rates_hourly').hide();
		$('#yacht_rates').hide();
		$('#car_limo').hide();
		$('#rentals').show();
		$('#heli_fields').hide();
		$('#car_limo input').removeAttr('required');
		$('#vehicle_rates_daily input').removeAttr('required');
		$('#vehicle_rates_hourly input').removeAttr('required');
		$('#rentals input').prop('required', true);
		$('#heli_fields input').removeAttr('required');
		$('#yacht_rates input').removeAttr('required');
		$('.cbox-yacht').removeAttr('required');
	} else if($('#vehicles_category').val() == 'Helicopter') {
		$('#vehicle_rates_daily').hide();
		$('#vehicle_rates_hourly').hide();
		$('#heli_fields').show();
		$('#yacht_rates').hide();
		$('#car_limo').hide();
		$('#car_limo input').removeAttr('required');
		$('#vehicle_rates_daily input').removeAttr('required');
		$('#vehicle_rates_hourly input').removeAttr('required');
		$('#yacht_rates input').removeAttr('required');
		$('#heli_fields input').prop('required', true);
		$('#private_tour_price').removeAttr('required');
		$('.cbox-include').removeAttr('required');
	} else {
		$('#vehicle_rates_daily').hide();
		$('#vehicle_rates_hourly').hide();
		$('#car_limo').hide();
		$('#yacht_rates').hide();
		$('#heli_fields').hide();
		$('#car_limo input').removeAttr('required');
		$('#yacht_rates input').removeAttr('required');
		$('#vehicle_rates_daily input').removeAttr('required');
		$('#vehicle_rates_hourly input').removeAttr('required');
		$('#heli_fields input').removeAttr('required');
		$('.cbox-include').removeAttr('required');
	}
});


$('.delete').on('click', function(){
	if(!confirm('Are you sure to delete this vehicle?')) {
		return false;
	}
});

$('.delete_brand').on('click', function(){
	if(!confirm('Are you sure to delete this brand?')) {
		return false;
	}
});

$('.delete_marina').on('click', function(){
	if(!confirm('Are you sure to delete this marina?')) {
		return false;
	}
});

$('.delete_helipad').on('click', function(){
	if(!confirm('Are you sure to delete this helipad?')) {
		return false;
	}
});


$('.delete_include').on('click', function(){
	if(!confirm('Are you sure to delete this includes?')) {
		return false;
	}
});

$('.delete_seo_detail').on('click', function(){
	if(!confirm('Are you sure to delete this seo detail?')) {
		return false;
	}
});

$('.delete_currency').on('click', function(){
	if(!confirm('Are you sure to delete this curerncy?')) {
		return false;
	}
});

$('#vehicle_description').summernote({
	height: 300,
	placeholder: 'Enter Vehicle Description Here'
});

$('#privacy_policy_description').summernote({
	height: 300,
	placeholder: 'Enter Privacy Policy Description Here'
});
// CUSTOMIZE PAGES SCRIPT
$('#about_vision_statement').summernote({
	height: 150,
	placeholder: 'Add Vision Statement'
});
$('#about_mission_statement').summernote({
	height: 150,
	placeholder: 'Add Mission Statement'
});
$('#about_main_paragraph').summernote({
	height: 150,
	placeholder: 'Add Main Paragraph'
});

$('#contact_us_address').summernote({
	height: 50,
	placeholder: 'Add Address Line'
});
$('#contact_us_worktagline').summernote({
	height: 50,
	placeholder: 'Add working Hour Tag line'
});
$('#privacy_policy').summernote({
	height: 200,
	placeholder: 'Privacy Policy'
});
// TERMS AND CONDITIONS
$('#tc_general_statement').summernote({
	height: 300,
	placeholder: 'General Statement'
});
$('#tc_payment_policy').summernote({
	height: 300,
	placeholder: 'Payment Policy'
});
$('#tc_understanding').summernote({
	height: 300,
	placeholder: 'Understanding'
});
$('#tc_helicopter_policy').summernote({
	height: 300,
	placeholder: 'Helicopter Policy'
});
$('#tc_yachts_policy').summernote({
	height: 300,
	placeholder: 'Yachts Policy'
});
$('#tc_rental_cars_policy').summernote({
	height: 300,
	placeholder: 'Rental Cars Policy'
});
$('#tc_limo_driver').summernote({
	height: 300,
	placeholder: 'Add Limousine and Chauffeuring Hiring'
});

// EXPERIENCE MODULA
$('#experience_description').summernote({
	height: 200,
	// placeholder: 'Enter Experience Description Here'
});





// CUSTOMIZE PAGES SCRIPT ENDS
var index_file = '';
$("#input-fa-1").fileinput({
    theme: "fa",
    hideThumbnailContent: false,

    showDrag: true,
    showUpload:false,
    showRemove: true,
    allowedFileExtensions: ["jpg", "jpeg", "png"],
    browseOnZoneClick: true,
    fileActionSettings: {
	showUpload: false,
	showDelete: true,
	},
    initialPreviewConfig: [
    {initialPreviewShowDelete: true},
    
]
    
}).on('fileloaded', function(event, file, previewId, index, reader) {
	console.log(file);
	/*$('.file-footer-buttons').each(function(){
		$(this).prepend('<button type="button" class="kv-file-remove btn btn-sm btn-kv btn-default btn-outline-secondary" title="Remove file"><i class="fa fa-trash"></i></button>');
	});
	index_file = index;
	console.log(index_file);*/
    /*var elems = [];
    $('.kv-preview-data').each(function(){
    	elems.push($(this).attr('title'));
    });
    $('.image_name_field').val(JSON.stringify(elems));*/
}).on('filesorted', function(event, params) {
    console.log('File sorted ', params.previewId, params.oldIndex, params.newIndex, params.stack);
});
var index_file = '';
$("#input-fa-2").fileinput({
    theme: "fa",
    hideThumbnailContent: false,

    showDrag: true,
    showUpload:false,
    showRemove: true,
    allowedFileExtensions: ["jpg", "jpeg", "png"],
    browseOnZoneClick: true,
    fileActionSettings: {
	showUpload: false,
	showDelete: true,
	},
    initialPreviewConfig: [
    {initialPreviewShowDelete: true},
    
]
    
}).on('fileloaded', function(event, file, previewId, index, reader) {
	console.log(file);
	/*$('.file-footer-buttons').each(function(){
		$(this).prepend('<button type="button" class="kv-file-remove btn btn-sm btn-kv btn-default btn-outline-secondary" title="Remove file"><i class="fa fa-trash"></i></button>');
	});
	index_file = index;
	console.log(index_file);*/
    /*var elems = [];
    $('.kv-preview-data').each(function(){
    	elems.push($(this).attr('title'));
    });
    $('.image_name_field').val(JSON.stringify(elems));*/
}).on('filesorted', function(event, params) {
    console.log('File sorted ', params.previewId, params.oldIndex, params.newIndex, params.stack);
});
var index_file = '';
$("#input-fa-3").fileinput({
    theme: "fa",
    hideThumbnailContent: false,

    showDrag: true,
    showUpload:false,
    showRemove: true,
    allowedFileExtensions: ["jpg", "jpeg", "png"],
    browseOnZoneClick: true,
    fileActionSettings: {
	showUpload: false,
	showDelete: true,
	},
    initialPreviewConfig: [
    {initialPreviewShowDelete: true},
    
]
    
}).on('fileloaded', function(event, file, previewId, index, reader) {
	console.log(file);
	/*$('.file-footer-buttons').each(function(){
		$(this).prepend('<button type="button" class="kv-file-remove btn btn-sm btn-kv btn-default btn-outline-secondary" title="Remove file"><i class="fa fa-trash"></i></button>');
	});
	index_file = index;
	console.log(index_file);*/
    /*var elems = [];
    $('.kv-preview-data').each(function(){
    	elems.push($(this).attr('title'));
    });
    $('.image_name_field').val(JSON.stringify(elems));*/
}).on('filesorted', function(event, params) {
    console.log('File sorted ', params.previewId, params.oldIndex, params.newIndex, params.stack);
});
var index_file = '';
$("#input-fa-4").fileinput({
    theme: "fa",
    hideThumbnailContent: false,

    showDrag: true,
    showUpload:false,
    showRemove: true,
    allowedFileExtensions: ["jpg", "jpeg", "gif", "png","svg","mp4","avi","flv","pdf","stl"],
    browseOnZoneClick: true,
    fileActionSettings: {
	showUpload: false,
	showDelete: true,
	},
    initialPreviewConfig: [
    {initialPreviewShowDelete: true},
    
]
    
}).on('fileloaded', function(event, file, previewId, index, reader) {
	console.log(file);
	/*$('.file-footer-buttons').each(function(){
		$(this).prepend('<button type="button" class="kv-file-remove btn btn-sm btn-kv btn-default btn-outline-secondary" title="Remove file"><i class="fa fa-trash"></i></button>');
	});
	index_file = index;
	console.log(index_file);*/
    /*var elems = [];
    $('.kv-preview-data').each(function(){
    	elems.push($(this).attr('title'));
    });
    $('.image_name_field').val(JSON.stringify(elems));*/
}).on('filesorted', function(event, params) {
    console.log('File sorted ', params.previewId, params.oldIndex, params.newIndex, params.stack);
});
var index_file = '';
$("#input-fa-5").fileinput({
    theme: "fa",
    hideThumbnailContent: false,

    showDrag: true,
    showUpload:false,
    showRemove: true,
    allowedFileExtensions: ["jpg", "jpeg", "gif", "png","svg","mp4","avi","flv","pdf","stl"],
    browseOnZoneClick: true,
    fileActionSettings: {
	showUpload: false,
	showDelete: true,
	},
    initialPreviewConfig: [
    {initialPreviewShowDelete: true},
    
]
    
}).on('fileloaded', function(event, file, previewId, index, reader) {
	console.log(file);
	/*$('.file-footer-buttons').each(function(){
		$(this).prepend('<button type="button" class="kv-file-remove btn btn-sm btn-kv btn-default btn-outline-secondary" title="Remove file"><i class="fa fa-trash"></i></button>');
	});
	index_file = index;
	console.log(index_file);*/
    /*var elems = [];
    $('.kv-preview-data').each(function(){
    	elems.push($(this).attr('title'));
    });
    $('.image_name_field').val(JSON.stringify(elems));*/
}).on('filesorted', function(event, params) {
    console.log('File sorted ', params.previewId, params.oldIndex, params.newIndex, params.stack);
});

//for stl files
var index_file = '';
$("#stlFiles").fileinput({
    theme: "fa",
    hideThumbnailContent: false,

    showDrag: true,
    showUpload:false,
    showRemove: true,
    allowedFileExtensions: ["stl"],
    browseOnZoneClick: true,
    fileActionSettings: {
	showUpload: false,
	showDelete: true,
	},
    initialPreviewConfig: [
    {initialPreviewShowDelete: true},
    
]
    
}).on('fileloaded', function(event, file, previewId, index, reader) {
	console.log(file);
	/*$('.file-footer-buttons').each(function(){
		$(this).prepend('<button type="button" class="kv-file-remove btn btn-sm btn-kv btn-default btn-outline-secondary" title="Remove file"><i class="fa fa-trash"></i></button>');
	});
	index_file = index;
	console.log(index_file);*/
    /*var elems = [];
    $('.kv-preview-data').each(function(){
    	elems.push($(this).attr('title'));
    });
    $('.image_name_field').val(JSON.stringify(elems));*/
}).on('filesorted', function(event, params) {
    console.log('File sorted ', params.previewId, params.oldIndex, params.newIndex, params.stack);
});

var index_file = '';
$("#input-fa-6").fileinput({
    theme: "fa",
    hideThumbnailContent: false,

    showDrag: true,
    showUpload:false,
    showRemove: true,
    allowedFileExtensions: ["pdf"],
    browseOnZoneClick: true,
    fileActionSettings: {
	showUpload: false,
	showDelete: true,
	},
    initialPreviewConfig: [
    {initialPreviewShowDelete: true},
    
]
    
}).on('fileloaded', function(event, file, previewId, index, reader) {
	console.log(file);
	/*$('.file-footer-buttons').each(function(){
		$(this).prepend('<button type="button" class="kv-file-remove btn btn-sm btn-kv btn-default btn-outline-secondary" title="Remove file"><i class="fa fa-trash"></i></button>');
	});
	index_file = index;
	console.log(index_file);*/
    /*var elems = [];
    $('.kv-preview-data').each(function(){
    	elems.push($(this).attr('title'));
    });
    $('.image_name_field').val(JSON.stringify(elems));*/
}).on('filesorted', function(event, params) {
    console.log('File sorted ', params.previewId, params.oldIndex, params.newIndex, params.stack);
});

var index_file = '';
$("#input-fa-7").fileinput({
    theme: "fa",
    hideThumbnailContent: false,

    showDrag: true,
    showUpload:false,
    showRemove: true,
    allowedFileExtensions: ["jpg", "jpeg", "gif", "png","svg","mp4","avi","flv","pdf","stl"],
    browseOnZoneClick: true,
    fileActionSettings: {
	showUpload: false,
	showDelete: true,
	},
    initialPreviewConfig: [
    {initialPreviewShowDelete: true},
    
]
    
}).on('fileloaded', function(event, file, previewId, index, reader) {
	console.log(file);
	/*$('.file-footer-buttons').each(function(){
		$(this).prepend('<button type="button" class="kv-file-remove btn btn-sm btn-kv btn-default btn-outline-secondary" title="Remove file"><i class="fa fa-trash"></i></button>');
	});
	index_file = index;
	console.log(index_file);*/
    /*var elems = [];
    $('.kv-preview-data').each(function(){
    	elems.push($(this).attr('title'));
    });
    $('.image_name_field').val(JSON.stringify(elems));*/
}).on('filesorted', function(event, params) {
    console.log('File sorted ', params.previewId, params.oldIndex, params.newIndex, params.stack);
});

var index_file = '';
$("#input-fa-8").fileinput({
    theme: "fa",
    hideThumbnailContent: false,

    showDrag: true,
    showUpload:false,
    showRemove: true,
    allowedFileExtensions: ["pdf"],
    browseOnZoneClick: true,
    fileActionSettings: {
	showUpload: false,
	showDelete: true,
	},
    initialPreviewConfig: [
    {initialPreviewShowDelete: true},
    
]
    
}).on('fileloaded', function(event, file, previewId, index, reader) {
	console.log(file);
	/*$('.file-footer-buttons').each(function(){
		$(this).prepend('<button type="button" class="kv-file-remove btn btn-sm btn-kv btn-default btn-outline-secondary" title="Remove file"><i class="fa fa-trash"></i></button>');
	});
	index_file = index;
	console.log(index_file);*/
    /*var elems = [];
    $('.kv-preview-data').each(function(){
    	elems.push($(this).attr('title'));
    });
    $('.image_name_field').val(JSON.stringify(elems));*/
}).on('filesorted', function(event, params) {
    console.log('File sorted ', params.previewId, params.oldIndex, params.newIndex, params.stack);
});


var elems = [];
var configs = [];
	$('.images_initial_preview').each(function() {
    	elems.push($(this).val());
    	configs.push({ caption: $(this).attr('data-file-name'), size: $(this).attr('data-image-size') })
    });
    
$("#edit-fa-1").fileinput({
	
    theme: "fa",
    hideThumbnailContent: false,

    showDrag: false,
    showUpload:false,
    showRemove: true,
    allowedFileExtensions: ["jpg", "jpeg", "gif", "png","svg","mp4","avi","flv","pdf","stl"],
    browseOnZoneClick: true,
    fileActionSettings: {
	showUpload: false,
	showDelete: true,
	},
	maxFileCount: 20,
    uploadAsync: false,
    overwriteInitial: true,
    initialPreview: elems,
    initialPreviewAsData: true, // identify if you are sending preview data only and not the raw markup
    initialPreviewFileType: 'image', // image is the default and can be overridden in config below
    initialPreviewConfig: configs,
    purifyHtml: true, // this by default purifies HTML data for preview
}).on('filesorted', function(e, params) {
    console.log('File sorted params', params);
}).on('fileuploaded', function(e, params) {
    console.log('File uploaded params', params);
});
/*Dropzone.autoDiscover = false;
$("#main_images").dropzone({
    url: 'upload.php',
    margin: 20,
    allowedFileTypes: 'image.*',
    params:{
        'action': 'save'
    },
    autoProcessQueue: false,
    uploadMultiple: true,
    parallelUploads: 5,
    maxFiles: 5,
    maxFilesize: 1,
    acceptedFiles: 'image/*',
    addRemoveLinks: true,
    preview: true,
    uploadOnDrop: false,
    uploadOnPreview: true,
    success: function (file, response) {
        var imgName = response;
        file.previewElement.classList.add("dz-success");
        console.log("Successfully uploaded :" + imgName);
    },
    error: function (file, response) {
        file.previewElement.classList.add("dz-error");
    }

});*/

$('.file-preview-thumbnails').sortable({
items: '.file-preview-frame',
tolerance: 'grabbing',
placeholder: 'ui-state-highlight',
update: function (event, ui) {
	/*var elems = [];
    $('.kv-preview-data').each(function(){
    	elems.push($(this).attr('title'));
    });
    	$('.image_name_field').val(JSON.stringify(elems));*/
    }
});

$("#brand_logo").fileinput({
    theme: "fa",
    hideThumbnailContent: false,

    showDrag: true,
    showUpload:false,
    showRemove: true,
    allowedFileExtensions: ["jpg", "jpeg", "gif", "png"],
    browseOnZoneClick: true,
    maxFileCount: 1,
    fileActionSettings: {
	showUpload: false,
	showDelete: true,
	},
    initialPreviewConfig: [
    {initialPreviewShowDelete: true},
    
]
    
}).on('fileloaded', function(event, file, previewId, index, reader) {
	console.log(file);
	/*$('.file-footer-buttons').each(function(){
		$(this).prepend('<button type="button" class="kv-file-remove btn btn-sm btn-kv btn-default btn-outline-secondary" title="Remove file"><i class="fa fa-trash"></i></button>');
	});
	index_file = index;
	console.log(index_file);*/
    /*var elems = [];
    $('.kv-preview-data').each(function(){
    	elems.push($(this).attr('title'));
    });
    $('.image_name_field').val(JSON.stringify(elems));*/
}).on('filesorted', function(event, params) {
    console.log('File sorted ', params.previewId, params.oldIndex, params.newIndex, params.stack);
});

var elems = [];
var configs = [];
	elems.push($('.images_initial_preview').val());
	configs.push({ caption: $('images_initial_preview').attr('data-file-name'), size: $('images_initial_preview').attr('data-image-size') });

$("#brand_logo_edit").fileinput({
    theme: "fa",
    hideThumbnailContent: false,

    showDrag: true,
    showUpload:false,
    showRemove: true,
    allowedFileExtensions: ["jpg", "jpeg", "gif", "png"],
    browseOnZoneClick: true,
    maxFileCount: 1,
    fileActionSettings: {
	showUpload: false,
	showDelete: true,
	},
	overwriteInitial: true,
    initialPreview: elems,
    initialPreviewAsData: true, // identify if you are sending preview data only and not the raw markup
    initialPreviewFileType: 'image', // image is the default and can be overridden in config below
    initialPreviewConfig: configs,
    purifyHtml: true, // this by default purifies HTML data for preview
    initialPreviewConfig: [
    {initialPreviewShowDelete: true},

    
]
    
}).on('fileloaded', function(event, file, previewId, index, reader) {
	console.log(file);
	/*$('.file-footer-buttons').each(function(){
		$(this).prepend('<button type="button" class="kv-file-remove btn btn-sm btn-kv btn-default btn-outline-secondary" title="Remove file"><i class="fa fa-trash"></i></button>');
	});
	index_file = index;
	console.log(index_file);*/
    /*var elems = [];
    $('.kv-preview-data').each(function(){
    	elems.push($(this).attr('title'));
    });
    $('.image_name_field').val(JSON.stringify(elems));*/
}).on('filesorted', function(event, params) {
    console.log('File sorted ', params.previewId, params.oldIndex, params.newIndex, params.stack);
});


$('.kv-file-remove').on('click', function(){
	$(this).closest('.file-preview-frame').hide('slow', function(){ $(this).closest('.file-preview-frame').remove(); });
});

$('#city').on('change', function(){
	$('#location .form-group').remove();
	$('#sub_location .form-group').remove();
	$.ajax({
		url: $(this).attr('data-url'),
		type: 'post',
		data: {id: $('option:selected', this).attr('data-city-id'), table: 'tz_locations', select_id: 'locations', column: 'cities_id', label: 'Locations'},
		success: function(response) {
			$('#location .form-group').remove();
			$('#location').append(response.select);
		}
	});
});

$(document.body).on('change', '#locations', function(){
	$.ajax({
		url: $(this).attr('data-url'),
		type: 'post',
		data: {id: $('option:selected', this).attr('data-location-id'), table: 'tz_sub_locations', select_id: 'sub_locations', column: 'locations_id', label: 'Sub Locations'},
		success: function(response) {
			$('#sub_location .form-group').remove();
			$('#sub_location').append(response.select);
		}
	});
});

$(document.body).on('change', '#sub_locations', function(){
	$.ajax({
		url: $(this).attr('data-url'),
		type: 'post',
		data: {id: $('option:selected', this).attr('data-location-id'), table: 'tz_sub_locations1', select_id: 'sub_locations1', column: 'sub_locations_id', label: 'Sub Locations1'},
		success: function(response) {
			$('#sub_location1 .form-group').remove();
			$('#sub_location1').append(response.select);
		}
	});
});

$(document.body).on('change', '#sub_locations1', function(){
	$.ajax({
		url: $(this).attr('data-url'),
		type: 'post',
		data: {id: $('option:selected', this).attr('data-location-id'), table: 'tz_sub_locations2', select_id: 'sub_locations2', column: 'sub_locations1_id', label: 'Sub Locations2'},
		success: function(response) {
			$('#sub_location2 .form-group').remove();
			$('#sub_location2').append(response.select);
		}
	});
});

$(document.body).on('change', '#marina_city', function(){
	$('#marina_select').remove();
	$.ajax({
		url: $(this).attr('data-url'),
		type: 'post',
		data: {marina_city: $(this).val()},
		success: function(response) {
			$('#marina_div').show();
			$('#marina_div').append(response.select);
		}
	});
});

$(document.body).on('change', '#helipad_city', function(){
	$('#helipad_select').remove();
	$.ajax({
		url: $(this).attr('data-url'),
		type: 'post',
		data: {helipad_city: $(this).val()},
		success: function(response) {
			$('#helipad_div').show();
			$('#helipad_div').append(response.select);
		}
	});
});

$(document.body).on('change', '#order_status', function(){
	if($(this).val() != '') {
		$('#order_status_form').submit();
	} else {
		return false;
	}
});

$(document.body).on('change', '#sub_locations2', function(){
	$.ajax({
		url: $(this).attr('data-url'),
		type: 'post',
		data: {id: $('option:selected', this).attr('data-location-id'), table: 'tz_sub_locations3', select_id: 'sub_locations3', column: 'sub_locations3_id', label: 'Sub Locations3'},
		success: function(response) {
			$('#sub_location3 .form-group').remove();
			$('#sub_location3').append(response.select);
		}
	});
});

$('.remove_file').on('click', function(){
	var that = $(this);
	if(confirm('Are you sure to delete this image?')) {
		$.ajax({
			url: that.attr('data-url'),
			type: 'post',
			data: {vehicle_slug: that.attr('data-vehicle-slug'), image_name: that.attr('data-image-name'), image_size: that.attr('data-image-size')},
			success: function(response) {
				if (response.success) {
					that.parent().remove();
				} else {
					alert('Seems to an error or image already deleted');
				}
			}
		});
	}
	
});

$('.delete_guest').on('click', function(){
	if(confirm('Are you sure to want to delete this guest account?')) {
		return true;
	} else {
		return false;
	}
});

$('.delete_user').on('click', function(){
	if(confirm('Are you sure to want to delete this user account?')) {
		return true;
	} else {
		return false;
	}
});
$('.delete_vendor').on('click', function(){
	if(confirm('Are you sure to want to delete this vendor account?')) {
		return true;
	} else {
		return false;
	}
});
$('.cancel_order').on('click', function(){
	if(confirm('Are you sure to want to cancel this order?')) {
		return true;
	} else {
		return false;
	}
});

$('.image-thumbnail-preview').sortable({
items: '.image-thumbnail-preview-frame',
tolerance: 'grabbing',
placeholder: 'ui-state-highlight',
update: function (event, ui) {
	var elems = new Array();
	$('.remove_file').each(function() {
		elems.push($(this).attr('data-image-name'));
	});
	$.ajax({
		url: $('.remove_file').attr('data-update'),
		type: 'post',
		data: {images: elems, vehicle_slug: $('.remove_file').attr('data-vehicle-slug')},
		success: function(response) {
			if (response.success) {

			} else {
				alert('Seems to an error in re-order');
			}
		}
	});
	console.log(elems);
    }
});
