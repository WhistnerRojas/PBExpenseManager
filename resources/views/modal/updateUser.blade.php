@foreach ($viewUsers['users'] as $User)
<div class="modal fade" id="updateUser{{ $User->id }}" tabindex="-1" aria-labelledby="updateUser" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="updateUser">Update | Delete User</h1>
                </div>
                <div class="modal-body">

                    <form method="POST" action="{{route('user.updateDeleteUser')}}">
                        @csrf
                        <input type="text" name="id" value="{{ $User->id }}" class="d-none">
                        <div class="md-3 mb-2">
                            
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $User->name }}" maxlength="45" @if($User->role === 'Administrator') disabled @endif>

                            @if (isset($errors) && $errors->has('name'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                        </div>

                        <div class="md-3 mb-2">

                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $User->email }}" placeholder="name@example.com" autocomplete="off" @if($User->role === 'Administrator') disabled @endif>

                            @if (isset($errors) && $errors->has('email'))
                                <div class="alert alert-danger mt-1">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                        </div>

                        <div class="md-3 mb-2">

                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" value="{{ $User->password }}" autocomplete="off" @if($User->role === 'Administrator') disabled @endif>

                            @if (isset($errors) && $errors->has('password'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('password') }}
                                </div>
                            @endif
                        </div>

                        <div class="md-3 md-2">
                            <label for="role" class="form-label">Role</label>
                            <select name="role" class="form-select" @if($User->role === 'Administrator') disabled @endif>
                            <option value="{{ $User->role }}" selected>{{ $User->role }}</option>
                            @foreach ($viewUsers['roleList'] as $roles)
                                <option value="{{ $roles->display_name }}">{{ $roles->display_name }}</option>
                            @endforeach
                            </select>
                            @if (isset($errors) && $errors->has('role'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('role') }}
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