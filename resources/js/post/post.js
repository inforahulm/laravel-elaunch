$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(".post_delete").on('click', function () {
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
                    url: Url_Post_index + '/' + id,
                    success: function (response) {
                        $('#post' + id).remove()
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                        console.log(response)
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            }
        })
    });
/** create post */
    $('.employee').select2({
        placeholder: "Select an option",
        allowClear: true 
    });
});