<!DOCTYPE html>
<html lang="en">
<head>
    <title>PT Mentol</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> 
</head>
    <body>
        <div class="container">
            @yield('content')
        </div>
    </body>
    
    <script>
        $('body').on('click', '#edit-item', function () {
            var item_id = $(this).data('id');
            $.get('items/'+item_id+'/edit', function (data) {
                $('#itemCrudModal').html("Edit item");
                $('#btn-update').val("Update");
                $('#btn-save').prop('disabled',false);
                $('#crud-modal').modal('show');
                $('#item_id').val(data.id);
                $('#title').val(data.title);
                $('#author').val(data.author);
                $('#pages').val(data.pages);
                $('#year').val(data.year);
            })
    });
        $('body').on('click', '#show-item', function () {
            $('#itemCrudModal-show').html("item Details");
            $('#crud-modal-show').modal('show');
        });
    });
    </script>
</html>