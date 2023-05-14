@foreach ($viewUsers as $User)
    <div class="modal fade" id="updateRoles{{ $User->id }}" tabindex="-1" aria-labelledby="updateUser" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="updateRoles">Update Role</h1>
                </div>
                <div class="modal-body">

                    <form id="updateDeleteRoles" method="POST" action="{{ route('user.updateDeleteUser') }}">
                        @csrf
                        <input type="text" name="id" value="{{ $User->id }}" class="d-none">

                        <div class="md-3">
                            

                            @if (isset($errors) && $errors->has('display_name'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('display_name') }}
                                </div>
                            @endif
                        </div>

                        <div class="md-3">
                            

                            @if (isset($errors) && $errors->has('description'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('description') }}
                                </div>
                            @endif
                        </div>

                        <div class="modal-footer d-flex">
                            @if($User->role !== 'Administrator')
                            <!-- dont show if role admin -->
                                <button type="submit" name="action" value="Delete" class="btn btn-outline-danger me-auto">
                                    Delete
                                </button>
                            @endif
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                Cancel
                            </button>
                            @if($User->role !== 'Administrator')
                                <input type="submit" name="action" value="Update" class="btn btn-primary" />
                            @endif
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endforeach