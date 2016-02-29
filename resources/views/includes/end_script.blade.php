<script src="{{ asset(env('ASSET_PATH').'/js/plugins/namebadges/jquery.nameBadges.js') }}"></script>
<script>
//    function setalert(pagetype) {
//        $.ajax({
//            type: "POST",
//            dataType: "json",
//            url: "onclick_script.php", //Relative or absolute path to response.php file
//            data: {"action": pagetype},
//            success: function(data) {
//                $.each(data, function(index, element) {
//                    if(element > 0){
//                        $("#"+index).removeClass('label-info').addClass('label-danger').text(element);
//                    }
//                    else {
//                        $("#"+index).removeClass('label-danger').addClass('label-info').html('').append( "<i class=\"fa fa-check\"></i>" );//$('#top1 #s1.myclass-old').removeClass('myclass-old').addClass('myclass-new');
//                    }
//                });
//
//            }
//        });
//    }
//    $(document).ready(function(){
//        var ele = '';
//        ele = $("#side-menu li.active").attr('id');
//        if(ele != ''){
//            setalert(ele);
//        }
//        $('.name').nameBadge({border: {
//            width: 0
//        },
//            colors: ['#A4C8F0', '#88BBDD', '#CBAB8D', '#FF9797', '#88BBAA', '#EFA694', '#C0C0C0', '#B3B3D9', '#88DDBB'],
//            text: '#fff',
//            margin: 0,
//            size: 70});
//        $('.nav-a-label').click(function(e)
//        {
//            var active = $(this).closest('li').attr('class');
//            ele = $(this).closest('li').attr('id');
//            if((ele != '')&&(active=="active")){
//                setalert(ele);
//            }
//            //return false;
//        });
//
//    });

    $(window).load(function() {
        // Animate loader off screen
        $(".se-pre-con").fadeOut("slow");;
    });
</script>

<link href="{{ asset(env('ASSET_PATH').'/css/animate.css') }}" rel="stylesheet">
<link href="{{ asset(env('ASSET_PATH').'/css/style.css') }}" rel="stylesheet" media="all">
