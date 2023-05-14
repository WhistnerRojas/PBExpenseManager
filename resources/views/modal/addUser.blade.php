<div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="addUser" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addUser">Add User</h1>
                </div>
                <div class="modal-body">

                    <form method="POST" action="{{route('user.addUsers')}}">
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
