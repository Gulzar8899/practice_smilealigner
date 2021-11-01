// Modal Js


// Add Treatment Modal Js

    function getShippingStates(id) {
        var country_name = id.options[id.selectedIndex].value;
        var country_id = $(".shipping_country").find(':selected').attr('data-id');
        // alert(country_id);
        // var base_url = window.location.origin;
        // alert(base_url);
        // var base_url = "http://localhost/smilealigners";
      $.ajax({
            url: base_url + "/admin/doctor/getStates/"+ country_id,
            type: 'POST',
            data: {"id":country_id},
            dataType: 'json',
            success: function(response) {
                console.log(response);


                $('.shipping_city_s').html('Select');
                $('.shipping_city').find('option').not(':first').remove();


                $('.shipping_state_s').html('Select');
                $('.shipping_state').find('option').not(':first').remove();
                

                // Add options
                $('.shipping_state').each(function() {
                    if (this.selectize) {
                        for(x=0; x < 10; ++x){
                            this.selectize.addOption({value:x, text: x});
                        }
                    }
                });

                // $('#shipping_state').append('<option>Select</option>');
                $.each(response,function(index,data){
                    $('.shipping_state').append('<option data-id="'+data['id']+'" value="'+data['name']+'">'+data['name']+'</option>');
                });

            },
            error: function () {
                alert('Data Not Deleted');
            }
        });

    }

    function getShippingCities(id) {
       var city_name = id.options[id.selectedIndex].value;
        var city_id = $(".shipping_state").find(':selected').attr('data-id');
        // var base_url = "http://localhost/smilealigners";
      // alert(base_url);
      $.ajax({
            url:base_url+"/admin/doctor/getCities/"+ city_id,
            type: 'POST',
            data: {"id":city_id},
            dataType: 'json',
            success: function(response) {
                console.log(response);

                // $('#shipping_city_s').html('');
                // $('#shipping_city').empty();

                $('.shipping_city_s').html('Select');
                $('.shipping_city').find('option').not(':first').remove();


                // Add options
                $('.shipping_city').each(function() {
                    if (this.selectize) {
                        for(x=0; x < 10; ++x){
                            this.selectize.addOption({value:x, text: x});
                        }
                    }
                });

                $.each(response,function(index,data){
                    $('.shipping_city').append('<option data-id="'+data['id']+'" value="'+data['name']+'">'+data['name']+'</option>');
                });

            },
            error: function () {
                alert('Data Not Deleted');
            }
        });

    }


    function getBillingStates(id) {
        var country_name = id.options[id.selectedIndex].value;
        var country_id = $(".billing_country").find(':selected').attr('data-id');
        // alert(country_id);
        // alert(country_name);
        // var base_url = window.location.origin;
        // var base_url = "http://localhost/smilealigners";
      $.ajax({
            url: base_url + "/admin/doctor/getStates/"+ country_id,
            type: 'POST',
            data: {"id":country_id},
            dataType: 'json',
            success: function(response) {
                console.log(response);


                $('.billing_city_s').html('Select');
                $('.billing_city').find('option').not(':first').remove();


                $('.billing_state_s').html('Select');
                $('.billing_state').find('option').not(':first').remove();
                

                // Add options
                $('.billing_state').each(function() {
                    if (this.selectize) {
                        for(x=0; x < 10; ++x){
                            this.selectize.addOption({value:x, text: x});
                        }
                    }
                });

                // $('#shipping_state').append('<option>Select</option>');
                $.each(response,function(index,data){
                    $('.billing_state').append('<option data-id="'+data['id']+'" value="'+data['name']+'">'+data['name']+'</option>');
                });

            },
            error: function () {
                alert('Data Not Deleted');
            }
        });

    }

    function getBillingCities(id) {
       var city_name = id.options[id.selectedIndex].value;
        var city_id = $(".billing_state").find(':selected').attr('data-id');
        // var base_url = "http://localhost/smilealigners";
      // alert(city_id);
      $.ajax({
            url:base_url+"/admin/doctor/getCities/"+ city_id,
            type: 'POST',
            data: {"id":city_id},
            dataType: 'json',
            success: function(response) {
                console.log(response);

                // $('#shipping_city_s').html('');
                // $('#shipping_city').empty();

                $('.billing_city_s').html('Select');
                $('.billing_city').find('option').not(':first').remove();


                // Add options
                $('.billing_city').each(function() {
                    if (this.selectize) {
                        for(x=0; x < 10; ++x){
                            this.selectize.addOption({value:x, text: x});
                        }
                    }
                });

                $.each(response,function(index,data){
                    $('.billing_city').append('<option data-id="'+data['id']+'" value="'+data['name']+'">'+data['name']+'</option>');
                });

            },
            error: function () {
                alert('Data Not Deleted');
            }
        });

    }
