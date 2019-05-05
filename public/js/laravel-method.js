/*
<a href="posts/2" data-method="delete"> <---- We want to send an HTTP DELETE request

- Or, request confirmation in the process -

<a href="posts/2" data-method="delete" data-confirm="Are you sure?">
*/

(function() {

  var laravel = {
      initialize: function() {
          this.methodLinks = $('a[data-method]');
          this.registerEvents();
    },

    registerEvents: function() {
        this.methodLinks.on('click', this.handleMethod);
    },

    handleMethod: function(e) {
        var link = $(this);
        var httpMethod = link.data('method').toUpperCase();
        var form;

        // If the data-method attribute is not PUT or DELETE,
        // then we don't know what to do. Just ignore.
        if ( $.inArray(httpMethod, ['PUT', 'DELETE', 'POST']) === - 1 ) {
            return;
        }

        const submit = () => {
          form = laravel.createForm(link);
          form.submit();
        }

        // Allow user to optionally provide data-confirm="Are you sure?"
        if ( link.data('confirm') ) {
            if ( ! laravel.verifyConfirm(link) ) {
                return false;
            }else{
              submit()
            }
            laravel.verifyConfirm(link, submit)

        }else{
          submit()
        }

        e.preventDefault();
    },

    verifyConfirm: function(link, callback) {
      let text = link.data('confirm')
      // return confirm(text)
       swal({
        title: "Peringatan",
        text: text,
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          swal("data telah di hapus!", {
            icon: "success",
          });
          form.submit();
        } else {
          swal("Data ini tidak jadi di hapus.");
        }
      });
    },

    createForm: function(link) {
        var form =
        $('<form>', {
            'method': 'POST',
            'action': link.attr('href')
        });

        var token =
        $('<input>', {
          'type': 'hidden',
          'name': '_token',
          'value': Laravel.csrfToken
        });

        var hiddenInput =
        $('<input>', {
          'name': '_method',
          'type': 'hidden',
          'value': link.data('method')
        });

        return form.append(token, hiddenInput)
                 .appendTo('body');
    }
};

  $(function(){
      laravel.initialize();
  });

})();
