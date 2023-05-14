<div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="addUser" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addUser">Add User</h1>
                </div>
                <div class="modal-body">

                    <form method="POST" action="{{route('user.addUsers')}}">
                        @csrf

                        <div class="md-3 mb-2">
                            
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" maxlength="45">

                            @if (isset($errors) && $errors->has('name'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                        </div>

                        <div class="md-3 mb-2">

                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" autocomplete="off">

                            @if (isset($errors) && $errors->has('email'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                        </div>

                        <div class="md-3 mb-2">

                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" autocomplete="off">

                            @if (isset($errors) && $errors->has('password'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('password') }}
                                </div>
                            @endif
                        </div>

                        <div class="md-3 md-2">
                            <label for="role" class="form-label">Role</label>
                            <select name="role" class="form-select">
                            <option selected>Choose Role...</option>
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
