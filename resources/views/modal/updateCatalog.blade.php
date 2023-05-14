@foreach ($viewCategory as $catalog)
    <div class="modal fade" id="updateCatalog{{ $catalog->category_id }}" tabindex="-1" aria-labelledby="updateCatalog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="updateCatalog">Update Category</h1>
                </div>
                <div class="modal-body">

                    <form id="updateDeleteRoles" method="POST" action="{{ route('expenses.updateDeleteCategory') }}">
                        @csrf
                        <input type="text" name="id" value="{{ $catalog->category_id }}" class="d-none">

                        <div class="md-3 mb-2">
                            
                            <label for="categoryName" class="form-label">Category Name</label>
                            <input type="text" class="form-control" id="categoryName" name="categoryName" value="{{ $category->category_name }}" maxlength="45">

                            @if (isset($errors) && $errors->has('category_name'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('category_name') }}
                                </div>
                            @endif
                        </div>

                        <div class="md-3 mb-2">

                            <label for="description" class="form-label">Description</label>
                            <input type="text" class="form-control" id="description" name="description" value="{{ $category->description }}" autocomplete="off">

                            @if (isset($errors) && $errors->has('description'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('description') }}
                                </div>
                            @endif
                        </div>

                        <div class="modal-footer d-flex">


                            <button type="submit" name="action" value="Delete" class="btn btn-outline-danger me-auto">
                                Delete
                            </button>

                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                Cancel
                            </button>

                            <input type="submit" name="action" value="Update" class="btn btn-primary" />

                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endforeach