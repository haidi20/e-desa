$(function(){
  $(document).ready(function(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    })

    $('#alternatif').change(function(){
      const value = $('#alternatif').val()
      // console.log(value)

      const url = '/data/sekolah?alter='+value;
      // console.log(url);

      $.ajax({
        type: 'GET',
        url: url,
        success:function(data){
          // console.log(data);
          $.each(data, function(index,item){
            $('#nilai_'+index).val(item);
          })
        }
      })

    })
  })
})
