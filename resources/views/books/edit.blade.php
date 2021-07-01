
<form id="BookeditForm" name="BookeditForm" >
    <input type="hidden" name="book_edit_id" id="book_edit_id">
    <div class="form-group">
        <label for="name">Book:</label>
        <input type="text" class="form-control " name="name"  value="{{$book->name}}" id="edit_name" required>
        <span class="text-danger" ><strong id="editErr"></strong></span> 
    </div>
    <a href="{{route('books.update',$book->id)}}" class="btn btn-success btnupdate">Update</a>
    <button type="button" class="btn btn-danger modelClose" data-dismiss="modal">Close</button>
</form>

