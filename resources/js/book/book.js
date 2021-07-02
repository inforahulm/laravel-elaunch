
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

     /** book model create data  */ 

        $('#create-book').click(function () {
            $('#BookForm').trigger("reset");
            $('#BookModal').modal('show');
        });
        $('body').on('click', '.btnsave', function (e) {
                e.preventDefault()
                var name = $('#name').val();
                $('#err').html('');
               
                $.ajax({
                    type: "POST",
                    url: Url_Book_Store,
                    data: $('#BookForm').serialize(),
                    
                    success: function (response) {
                        $('#BookForm').trigger("reset");
                        $('#BookModal').modal('hide');
                        window.LaravelDataTables["books-table"].ajax.reload();
                        console.log(response)
                    },
                    error: function (data) {
                       $('#Err').html(data.responseJSON.errors.name[0] );
                       console.log('Error:', data.responseJSON.errors.name[0]);
                    }       
                });
            });

/**  book model to show data */

        $(document).on('click', '.editUser', function (e) { 
           e.preventDefault();
             var urledit = $(this).attr('href');
                $.ajax({
                        type: "GET",
                        url: urledit,
                        data:{
                            name:name,
                             },
                        
                success: function (response) {
                    $('#BookeditModal').find('.modal-body').html(response);
                    $('#BookeditForm').trigger("reset");
                    $('#BookeditModal').modal('show');
                         console.log(response)
                        },
                        error: function (data) {
                            console.log('Error:', data);
                        }
                    });
            });

        /** book model update */

        $('body').on('click', '.btnupdate', function (e) {
            e.preventDefault();
            var urlupdate = $(this).attr('href');
            $('#editErr').html(''); 
            $.ajax({
                type: "PUT",
                url: urlupdate,
                data:$('#BookeditForm').serialize(),           
                
                success: function (response) {
                    $('#BookeditForm').trigger("reset");
                    $('#BookeditModal').modal('hide');
                    window.LaravelDataTables["books-table"].ajax.reload();
                    console.log(response)
                },
                error: function (data) {
                    $('#editErr').html(data.responseJSON.errors.name[0]);
                    console.log('Error:', data.responseJSON.errors.name[0]);
                }
            });
    } );  

        $(document).on('click', '.deleteUser',function (e){
            e.preventDefault();
            var id = $(this).data("id");
           
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "DELETE",
                        url: Url_Book_index +'/'+ id,
                        success: function () {
                         window.LaravelDataTables["books-table"].ajax.reload();
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                            console.log('success')
                        }
                    });
                }
            })
        });
    });
