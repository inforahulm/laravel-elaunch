@extends('layouts.app')

@section('content')
<button type="button" class="btn btn-outline-primary float-right" data-toggle="modal" data-target="#BookModal" id=create-book>
    Create
  </button>
</br>
</br>
    <div class="container">
        <x-alert/>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">List</div>
                    <div class="card-body">
                        {{ $dataTable->table(['class' => 'table table-bordered'])}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="BookModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="Bookmodaltitle">Create Book</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form id="BookForm" name="BookForm">
                    <input type="hidden" name="book_id" id="book_id">
                    <div class="form-group">
                        <label for="name">Book:</label>
                        <input type="text" class="form-control "  name="name" id="name" require/>
                        <span class="text-danger" ><strong id="Err"></strong></span>
        
                    </div>
                    <button type="submit" class="btn btn-outline-primary btnsave" value="create">Submit</button>
                </form>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="BookeditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="Bookmodaltitle">Edit Book</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form id="BookeditForm" name="BookeditForm">
                    <input type="hidden" name="book_edit_id" id="book_edit_id">
                    <div class="form-group">
                        <label for="name">Book:</label>
                        <input type="text" class="form-control " name="name" id="edit_name" required/>
                        <span class="text-danger" ><strong id="editErr"></strong></span>
                    </div>
                    <button type="submit" class="btn btn-outline-primary btnsave" value="create">Submit</button>
                </form>
            </div>
          </div>
        </div>
      </div>
@endsection
 @section('script')
 {{ $dataTable->scripts() }}
 <script>
       $(document).ready( function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });     
/**
create data
*/


        let urlinsert="{{route('books.store')}}";
        let url = "{{ route('books.index') }}";
        
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
                url: urlinsert,
                data: $('#BookForm').serialize()
                ,
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



/**
edit and update data
*/


    $(document).on('click', '.editUser', function (e) { 
    e.preventDefault();
    var urledit = $(this).attr('href');

    $.ajax({
                type: "GET",
                url: urledit,
                data:{
                    name:name,
                }
                ,
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

  
/**
delete data
*/

let urldelete ="{{route('books.index')}}";
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
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
                            url: urldelete +'/'+ id,
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
       });
    </script>
@endsection 



