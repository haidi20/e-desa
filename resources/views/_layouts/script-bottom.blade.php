<!-- BEGIN VENDOR JS-->
<!-- build:js app-assets/js/vendors.min.js-->
{!! Html::script('robust/app-assets/js/core/libraries/jquery.min.js') !!}
{!! Html::script('robust/app-assets/vendors/js/ui/tether.min.js') !!}
{!! Html::script('robust/app-assets/js/core/libraries/bootstrap.min.js') !!}
{!! Html::script('robust/app-assets/vendors/js/ui/perfect-scrollbar.jquery.min.js') !!}
{!! Html::script('robust/app-assets/vendors/js/ui/unison.min.js') !!}
{!! Html::script('robust/app-assets/vendors/js/ui/blockUI.min.js') !!}
{!! Html::script('robust/app-assets/vendors/js/ui/jquery.matchHeight-min.js') !!}
{!! Html::script('robust/app-assets/vendors/js/ui/jquery-sliding-menu.js') !!}
{!! Html::script('robust/app-assets/vendors/js/sliders/slick/slick.min.js') !!}

{!! Html::script('robust/app-assets/vendors/js/ui/screenfull.min.js') !!}
{!! Html::script('robust/app-assets/vendors/js/extensions/pace.min.js') !!}
{!! Html::script('plugins/bootbox/js/bootbox.min.js') !!}

{!! Html::script('robust/app-assets/vendors/js/forms/icheck/icheck.min.js') !!}

<!-- /build-->
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
{{-- {!! Html::script('robust/app-assets/vendors/js/charts/raphael-min.js') !!} --}}
{{-- {!! Html::script('robust/app-assets/vendors/js/charts/morris.min.js') !!} --}}
{{-- {!! Html::script('robust/app-assets/vendors/js/charts/chart.min.js') !!} --}}
{{-- {!! Html::script('robust/app-assets/vendors/js/charts/jvector/jquery-jvectormap-2.0.3.min.js') !!} --}}
{{-- {!! Html::script('robust/app-assets/vendors/js/charts/jvector/jquery-jvectormap-world-mill.js') !!} --}}
{{-- {!! Html::script('robust/app-assets/vendors/js/extensions/moment.min.js') !!} --}}
{{-- {!! Html::script('robust/app-assets/vendors/js/extensions/underscore-min.js') !!} --}}
{{-- {!! Html::script('robust/app-assets/vendors/js/extensions/clndr.min.js') !!} --}}
{{-- {!! Html::script('robust/app-assets/vendors/js/charts/echarts/echarts.js') !!} --}}
{{-- {!! Html::script('robust/app-assets/vendors/js/extensions/unslider-min.js') !!} --}}
<!-- END PAGE VENDOR JS-->
<!-- BEGIN ROBUST JS-->
<!-- build:js app-assets/js/app.min.js -->
{!! Html::script('robust/app-assets/js/core/app-menu.min.js') !!}
{!! Html::script('robust/app-assets/js/core/app.min.js') !!}
{!! Html::script('robust/app-assets/js/scripts/ui/fullscreenSearch.min.js') !!}
<!-- /build-->
<!-- END ROBUST JS-->

<script>
history.pushState(null, null, document.URL);
window.addEventListener('popstate', function () {
    history.pushState(null, null, document.URL);
});

/*if('{{ Auth::user() && !session()->get('group') }}'){
    $('#group_session').modal('show');
}*/

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
    $('.pagination li span, .pagination li a').addClass('page-link');
});
</script>