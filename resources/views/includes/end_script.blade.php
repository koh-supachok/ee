<script src="{{ asset(env('ASSET_PATH').'/js/plugins/namebadges/jquery.nameBadges.js') }}"></script>
<script>
    function setalert(pagetype) {
        //$("."+pagetype).html('').append( "<i class=\"fa fa-spinner fa-pulse\"></i>" );
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "onclick_script.php", //Relative or absolute path to response.php file
            data: {"action": pagetype},
            success: function(data) {
                //alert("Form submitted successfully.\nReturned json: " + JSON.stringify(data));
                $.each(data, function(index, element) {
                    if(element > 0){
                        $("#"+index).removeClass('label-info').addClass('label-danger').text(element);
                    }
                    else {
                        $("#"+index).removeClass('label-danger').addClass('label-info').html('').append( "<i class=\"fa fa-check\"></i>" );//$('#top1 #s1.myclass-old').removeClass('myclass-old').addClass('myclass-new');
                    }
                });

            }
        });
    }
    $(document).ready(function(){
        var ele = '';
        //alert($("#side-menu li.active").attr('id'));
        ele = $("#side-menu li.active").attr('id');
        if(ele != ''){
            setalert(ele);
        }
        $('.name').nameBadge({border: {
            width: 0
        },
            colors: ['#A4C8F0', '#88BBDD', '#CBAB8D', '#FF9797', '#88BBAA', '#EFA694', '#C0C0C0', '#B3B3D9', '#88DDBB'],
            text: '#fff',
            margin: 0,
            size: 70});
        $('.nav-a-label').click(function(e)
        {
            //alert($(this).closest('li').attr('class'));
            var active = $(this).closest('li').attr('class');
            //var ele = '';
            // if ($(this).hasClass("active")) {
            // //alert($(this).find("span.t").text());
            // ele = "quality";
            // }
            ele = $(this).closest('li').attr('id');
            // var data = {
            // "action": ele
            // };
            //alert(JSON.stringify(data));
            // if ($(this).hasClass("nav-label")) {
            // alert($(this).attr("class"));
            // }
            //alert($(this).attr("class"));
            //alert($(this).closest('li').attr('id'));
            // ele = $(this).closest('li').attr('id')
            if((ele != '')&&(active=="active")){
                //alert(JSON.stringify(data));
                // $.ajax({
                // type: "POST",
                // dataType: "json",
                // url: "onclick_script.php", //Relative or absolute path to response.php file
                // data: data,
                // success: function(data) {
                // // $(".the-return").html(
                // // "Favorite beverage: " + data["favorite_beverage"] + "<br />Favorite restaurant: " + data["favorite_restaurant"] + "<br />Gender: " + data["gender"] + "<br />JSON: " + data["json"]
                // // );
                // alert("Form submitted successfully.\nReturned json: " + JSON.stringify(data));
                // $.each(data, function(index, element) {
                //         // alert(JSON.stringify(index));
                //         // alert(JSON.stringify(element));
                //         $("#"+index).text(element);
                // });
                // //$("#test_empty").text(data["test_empty"]);
                // }
                // });
                setalert(ele);
            }
            //return false;
        });

    });

    $(window).load(function() {
        // Animate loader off screen
        $(".se-pre-con").fadeOut("slow");;
    });
</script>

<link href="{{ asset(env('ASSET_PATH').'/css/animate.css') }}" rel="stylesheet">
<link href="{{ asset(env('ASSET_PATH').'/css/style.css') }}" rel="stylesheet" media="all">
