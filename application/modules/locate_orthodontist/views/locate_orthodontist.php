<div class="banner" data-section="home" style="background: url(<?php echo base_url('assets/images/new/in_banner_05.jpg'); ?>)">
    <h2 class="page_name">LOCATE ORTHODONTIST</h2>
    <h3 class="function_name">SMILE ALIGNERS > LOCATE ORTHODONTIST</h3>
</div>
<div class="container text-center">
    <br/>
    <div class="home_headings">Locate An Orthodontist</div>
    <br/>
    <div class="row">
        <div class="col-sm-10 col-centered">            <!-- code change by 007 ----->
            <form id="locate_orthodontist">
            <div class="row">                           <!------ current line 007 code ------>
                <div class="col-sm-4 ">
                    <div class="form-group">
                        <!--                        <label for="email">Pincode</label>-->
                        <input type="number" class="form-control" id="pincode" name="pincode"
                               placeholder="Enter Pincode">
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="or_div">OR</div>
                </div>

                <div class="col-sm-4 ">
                    <div class="form-group">
                        <!--                        <label for="">City</label>-->
                        <input type="text" class="form-control" id="city" name="city" placeholder="Enter City Name">
                    </div>
                </div>

                    <div class="col-sm-2 ">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
    <div class="row" id="search_data">
    </div>
</div>
<br/>
<br/>
<br/>
<br/>
<br/>
<style>
    input.form-control {
        height: 42px;
        font-size: 14px;
        width: 100%;
    opacity: 1;
    }

    .control-label {
        font-size: 15px;
    }
</style>
<script>
    function getParameterByName(name, url) {
        if (!url) url = window.location.href;
        name = name.replace(/[\[\]]/g, "\\$&");
        var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
            results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, " "));
    }

    $(document).on("submit", "#locate_orthodontist", function (e) {
        e.preventDefault();
        var pincode = $("#pincode").val()
        var city = $("#city").val()
        $.ajax({
            url: url + "locate_orthodontist/search_orthodontist",
            type: "POST",
            data: {pincode: pincode, city: city},
            dataType: "JSON",
            success: function (data) {
                $("#search_data").html(data.values)
            }
        });
        return false;
    });
    $(document).ready(function (e) {
        var pin = getParameterByName('pincode');
        $("#pincode").val(pin);
        if ($("#pincode").val() != "")
            $("#locate_orthodontist").trigger("submit");
    });

</script>