{{-- {{dd(@$roles)}} --}}
<form method="POST">
<div class="container">
    <div class="row">
        <div class="col-12">
            <h3 style="font-size: 1.75rem;
            color: #2C77E7;
            font-weight: bold;
            padding: 10px 0px;">Create Role</h3>
        </div>
    </div>

    

    <div class="row mt-3 createroles">
        <input type="hidden" name="id" id="id" value="{{@$roles['id']}}">
        <div class="col-sm-10 col-md-6 mx-auto mb-4">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{@$roles['name']}}">
        </div>
        <div class="col-sm-10 col-md-6 mx-auto">
            <label for="role_name">Role Name</label>
            <input type="text" name="role_name" id="role_name" class="form-control" value="{{@$roles['name']}}">
        </div>
        <div class="col-sm-10 col-md-6 mx-auto">
            <label for="description">Description</label>
            <textarea type="text" rows="1" name="description" id="desscription" class="form-control"></textarea>
        </div>
        <div class="col-sm-10 col-md-6 mx-auto">
            <label for="date">Date</label>
            <input type="date" name="date" id="date" class="form-control">
        </div>
        <div class="col-sm-10 col-md-6 mt-3">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Permissions
                </button>
                <form class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    @foreach ( $permissions as $permission)
                        <label class="dropdown-item"><input type="checkbox" name="permission[]" value="{{ @$permission['name'] }}">{{ $permission['name'] }}</label>
                    @endforeach
                 
                </form>
              </div>
              
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <button type="button" style="background: linear-gradient(102.3deg, #88CDFF 41.05%, #4E8DD5 118.58%);
            box-shadow: 5px 5px 5px rgba(105, 108, 255, 0.44);
            border-radius: 10px;outline:none;border:none;color:white;padding:7px 22px;margin:55px 0px" onclick="addRole()">Create</button>
        </div>
    </div>
</div>

</form>