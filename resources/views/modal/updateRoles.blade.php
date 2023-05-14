@foreach ($viewRoles as $role)
    <div class="modal fade" id="updateRoles{{ $role->roles_id }}" tabindex="-1" aria-labelledby="updateRoles" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="updateRoles">Update Role</h1>
                </div>
                <div class="modal-body">

                    <form id="updateDeleteRoles" method="POST" action="{{ route('roles.updateDeleteRoles') }}">
                        @csrf
                        <input type="text" name="id" value="{{ $role->roles_id }}" class="d-none">

                        <div class="md-3">
                            <label for="displayName" class="form-label">Display Name</label>
                            <select name="displayName" class="form-select" @if($role->display_name === 'Administrator') disabled @endif>
                            <option value="{{ $role->display_name }}" selected>{{ $role->display_name }}</option>
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
                            <select name="description" class="form-select" @if($role->display_name === 'Administrator') disabled @endif>
                            <option value="{{ $role->description }}" selected>{{ $role->description }}</option>
                            <option value="Super User">Super User</option>
                            <option value="Can add expenses">Can add expenses</option>
                            </select>
                            @if (isset($errors) && $errors->has('description'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('description') }}
                                </div>
                            @endif
                        </div>

                        <div class="modal-footer d-flex">
                            @if($role->display_name !== 'Administrator')
                            <!-- dont show if role admin -->
                                <button type="submit" name="action" value="Delete" class="btn btn-outline-danger me-auto">
                                    Delete
                                </button>
                            @endif
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                Cancel
                            </button>
                            @if($role->display_name !== 'Administrator')
                                <input type="submit" name="action" value="Update" class="btn btn-primary" />
                            @endif
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endforeach