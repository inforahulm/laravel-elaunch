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
@endsection 



