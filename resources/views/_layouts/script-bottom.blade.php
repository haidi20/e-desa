<!-- BEGIN VENDOR JS-->
<!-- build:js app-assets/js/vendors.min.js-->
<script src="{{asset('robust/app-assets/js/core/libraries/jquery.min.js')}}"> </script>
<script src="{{asset('robust/app-assets/vendors/js/ui/tether.min.js')}}"> </script>
<script src="{{asset('robust/app-assets/js/core/libraries/bootstrap.min.js')}}"> </script>
<script src="{{asset('robust/app-assets/vendors/js/ui/perfect-scrollbar.jquery.min.js')}}"> </script>
<script src="{{asset('robust/app-assets/vendors/js/ui/unison.min.js')}}"> </script>
<script src="{{asset('robust/app-assets/vendors/js/ui/blockUI.min.js')}}"> </script>
<script src="{{asset('robust/app-assets/vendors/js/ui/jquery.matchHeight-min.js')}}"> </script>
<script src="{{asset('robust/app-assets/vendors/js/ui/jquery-sliding-menu.js')}}"> </script>
<script src="{{asset('robust/app-assets/vendors/js/sliders/slick/slick.min.js')}}"> </script>

<script src="{{asset('robust/app-assets/vendors/js/ui/screenfull.min.js')}}"> </script>
<script src="{{asset('robust/app-assets/vendors/js/extensions/pace.min.js')}}"> </script>
<script src="{{asset('plugins/bootbox/js/bootbox.min.js')}}"> </script>

<script src="{{asset('robust/app-assets/vendors/js/forms/icheck/icheck.min.js')}}"> </script>

<!-- /build-->
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script src="{{asset('robust/app-assets/vendors/js/charts/raphael-min.js')}}"> </script>
<script src="{{asset('robust/app-assets/vendors/js/charts/morris.min.js')}}"> </script>
<script src="{{asset('robust/app-assets/vendors/js/charts/chart.min.js')}}"> </script>
<script src="{{asset('robust/app-assets/vendors/js/charts/jvector/jquery-jvectormap-2.0.3.min.js')}}"> </script>
<script src="{{asset('robust/app-assets/vendors/js/charts/jvector/jquery-jvectormap-world-mill.js')}}"> </script>
<script src="{{asset('robust/app-assets/vendors/js/extensions/moment.min.js')}}"> </script>
<script src="{{asset('robust/app-assets/vendors/js/extensions/underscore-min.js')}}"> </script>
<script src="{{asset('robust/app-assets/vendors/js/extensions/clndr.min.js')}}"> </script>
<script src="{{asset('robust/app-assets/vendors/js/charts/echarts/echarts.js')}}"> </script>
<script src="{{asset('robust/app-assets/vendors/js/extensions/unslider-min.js')}}"> </script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN ROBUST JS-->
<!-- build:js app-assets/js/app.min.js -->
<script src="{{asset('robust/app-assets/js/core/app-menu.min.js')}}"> </script>
<script src="{{asset('robust/app-assets/js/core/app.min.js')}}"> </script>
<script src="{{asset('robust/app-assets/js/scripts/ui/fullscreenSearch.min.js')}}"> </script>
<script src="{{asset('js/laravel-method.js')}}"> </script>
<!-- /build-->
<!-- END ROBUST JS-->

<script>

function remove(id, action='delete', message='Anda yakin akan menghapus data ini?')
{
    bootbox.confirm({
        message: message,
        buttons: {
            confirm: {
                label: 'OK',
                className: 'btn-success ml-1'
            },
            cancel: {
                label: 'Cancel',
                className: 'btn-danger'
            }
        },
        callback: function(result){
            if(result){
                element = $('.btn-'+action+'-'+id);
                window.location.href = element.data('url');
            }
        }
    });
}

$(function(){
    /* custom pagination template */
    $('.pagination').addClass('mt-0 mb-0');
    $('.pagination li').addClass('page-item');
    $('.pagination li span, .pagination li a').addClass('page-script');
});
</script>