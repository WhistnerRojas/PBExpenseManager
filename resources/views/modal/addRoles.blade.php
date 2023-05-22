<div class="modal fade" id="addRoles" tabindex="-1" aria-labelledby="addRoles" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addRoles">Add Role</h1>
                </div>
                <div class="modal-body">

                    <form method="POST" action="{{route('roles.addRoles')}}">
                        @csrf

                        <div class="md-3">
                            <label for="displayName" class="form-label">Display Name</label>
                            <select name="displayName" class="form-select">
                            <option selected>Choose...</option>
                            <option value="Administrator">Administrator</option>
                            <option value="User">User</option>
                            </select>
                            @if (isset($errors) && $errors->has('display_name'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('display_name') }}
                                </div>
                            @endif
                        </div>

                        <div class="md-3">
                            <label for="description" class="form-label">Description</label>
                            <select name="description" class="form-select">
                            <option selected>Choose...</option>
                            <option value="Super User">Super User</option>
                            <option value="Can add expenses">Can add expenses</option>
                            </select>
                            @if (isset($errors) && $errors->has('display_name'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('display_name') }}
                                </div>
                            @endif
                        </div>

                        <div class="modal-footer d-flex">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                Cancel
                            </button>
                            <input type="submit" name="action" value="Save" class="btn btn-primary" />
                        </div>
                        
                    </form>

                </div>
            </div>
        </div>
    </div>
