<div class="mx-5 row row-cols-1 row-cols-md-2 g-5 ">
    <div class="col-md-4">
        <h4 class="text-uppercase mb-4" style="letter-spacing: 5px;">My Profile</h4>
        <div class="bg-white" style="padding: 30px;">
            <div class="input-group d-block">
                <form>
                    <img class="rounded-circle shadow-4-strong" alt="avatar2" src="image.png" />
                    <h5 class="card-title">{{$user->name}}</h5>
                    <p class="card-text">
                        {{
                            $user->email
                        }}
                    </p>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <h4 class="text-uppercase mt-4" style="letter-spacing: 5px;">Edit my Information</h4>
        <div class="bg-white" style="padding: 30px;">
            <div class="input-group d-block">
                <form>
                    <input type="text" class="form-control p-4 w-100 my-2" wire:model="name">
                    @error('name')
                        {{
                            $message
                        }}
                    @enderror
                    
                    <input type="password" class="form-control p-4 w-100 my-2" placeholder="password" wire:model="password">
                    @error('password')
                    {{
                        $message
                    }}
                    @enderror
                    <input type="password" class="form-control p-4 w-100 my-2" placeholder="password_confirmation">
                    <input type="file" class="form-control py-5 border-0 w-100 my-2">
                    <button class="btn btn-outline-success p-2 w-100" wire:click.prevent="update" >Edit <i class="fa fa-edit"></i></button>
                </form>
            </div>
        </div>
    </div>
    
    {{-- <div class="col-md-4 mb-5" style="margin-bottom: 1000%;">
        <h4 class="text-uppercase mb-2" style="margin-bottom: -10%;">Delete Account</h4>
        <div class="bg-white py-5" style="padding: 30px;">
            <div class="input-group d-block">
                <form>
                    <input type="text" class="form-control border-danger p-4 w-100 my-2" placeholder="Password">
                    <input type="text" class="form-control border-danger p-4 w-100 my-2" placeholder="confirmer Password">
                    <button class="btn btn-outline-danger p-2 w-100">Delete <i class="fa fa-trash"></i></button>
                </form>
            </div>
        </div>
    </div> --}}
</div>

