@extends('ekarat')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>ผลการแสกนเอกสาร</h5>
                    </div>
                    <div class="ibox-content">

                        <table class="table table-hover" id="sresult">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>แฟ้มที่</th>
                                <th>รายละเอียด</th>
                                <th>เวลา</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($scan as $data)

                                <tr>
                                    <td style="vertical-align:middle">{{ $data->id }}</td>
                                    <td style="vertical-align:middle">{{ $data->file }}</td>
                                    <td style="vertical-align:middle">{!! nl2br($data->detail) !!}</td>
                                    <td style="vertical-align:middle">{{ $data->ca_dt }}</td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('includes.footer')

    </div>
    </div>
@stop

@section('script')
        <!-- Mainly scripts -->
    <script src="{{ asset(env('ASSET_PATH').'/js/jquery-2.1.1.js') }}"></script>
    <script src="{{ asset(env('ASSET_PATH').'/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset(env('ASSET_PATH').'/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
    <script src="{{ asset(env('ASSET_PATH').'/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{ asset(env('ASSET_PATH').'/js/inspinia.js') }}"></script>
    <script src="{{ asset(env('ASSET_PATH').'/js/plugins/pace/pace.min.js') }}"></script>

    <!-- iCheck -->
    <script src="{{ asset(env('ASSET_PATH').'/js/plugins/iCheck/icheck.min.js') }}"></script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
        });
    </script>
    <script>
        $(document).ready(function () {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
            var $row = $('table tr:nth-child(1) td:nth-child(1)').text();
            var $col= [];
            var fetch = setInterval(refresh, 3000);
            //$row = 40;
            function nl2br (str, is_xhtml) {
                var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br ' + '/>' : '<br>';
                return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
            }

            function refresh(){
                //$("<tr><td>"+$row+"</td><td>test id</td><td>"+$row+"</td><td>date</td></tr>").prependTo("table > tbody");
                //$row++;

                $.ajax({
                    url: "ajax/refresh_log",
                    method: 'POST',
                    data:  { row_id: $row },

                    success: function(data) {
                        var $i = 0;
                        $.each(data, function() {
                            $.each(this, function(k, v) {
                                //console.log(k +"-"+v);
                                $col[k]=v;
                            });
                            $row = $col['id'];
                            $("<tr><td style=\"vertical-align:middle\">"
                                    +$col['id']+"</td><td style=\"vertical-align:middle\">"
                                    +$col['file']+"</td><td style=\"vertical-align:middle\">"
                                    +nl2br($col['detail'])+"</td><td style=\"vertical-align:middle\">"
                                    +$col['ca_dt']+"</td></tr>").prependTo("table > tbody");
                        });
                        //console.log("success");
                    },
                    error: function(data) {
                        console.log(data);
                        console.log("error");
                    }
                });
            }
            //$("<tr><td>test id</td><td>test id</td><td>"+$row+"</td><td>date</td></tr>").prependTo("table > tbody").slideDown( "slow" );
        });
    </script>
@stop
