{{-- {{dd(@$roles)}} --}}

<form method="POST">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 style="font-size: 1.75rem;
                color: #2C77E7;
                font-weight: bold;
                padding: 10px 0px;">Create User</h3>
            </div>
        </div>
    
        
    
        <div class="row mt-3 ">
            <input type="hidden" name="id" id="id" value="{{@$user['id']}}">
            <div class="col-sm-10 col-md-6 mx-auto mb-4">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{@$user['name']}}">
            </div>
            <div class="col-sm-10 col-md-6 mx-auto">
                <label for="role_name">User Name</label>
                <input type="text" name="user_name" id="user_name" class="form-control" value="{{@$user['user_name']}}">
            </div>
            <div class="col-sm-10 col-md-6 mx-auto">
                <label for="description">Password</label>
                <input type="password" name="password" id="password" class="form-control" value="{{@$user['password']}}">
            </div>
            <div class="col-sm-10 col-md-6 mx-auto">
                <label for="date">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{@$user['email']}}">
            </div>
        </div>
        <div class="row mt-3 ">
            <div class="col-sm-10 col-md-6 mx-auto mb-4">
                <label for="company_name">Company Name</label>
                <input type="text" name="company_name" id="company_name" class="form-control" value="{{@$user['company_name']}}">
            </div>
            <div class="col-sm-10 col-md-6 mx-auto">
                <label for="company_email">Company Email</label>
                <input type="text" name="company_email" id="company_email" class="form-control" value="{{@$user['company_email']}}">
            </div>
        </div>
        <div class="row mt-3 ">
           
            <div class="col-sm-10 col-md-6 mx-auto mb-4">
                <label for="address_line1">Address Line #1</label>
                <input type="text" name="address_line1" id="address_line1" class="form-control" value="{{@$user['address_line1']}}">
            </div>
            <div class="col-sm-10 col-md-6 mx-auto">
                <label for="address_line2">Address Line #2</label>
                <input type="text" name="address_line2" id="address_line2" class="form-control" value="{{@$user['address_line2']}}">
            </div>
            <div class="col-sm-10 col-md-6">
                <label for="city">City</label>
                <input type="text" name="city" id="city" class="form-control" value="{{@$user['city']}}">
            </div>
            <div class="col-sm-10 col-md-6">
                <label for="role">Choose a Role Type:</label>
                <select class="form-control" name="role_id" id="role_id">
                    @foreach ( $roles as $role )
                        <option value="{{ @$role['id'] }}" name="{{ @$role['name'] }}">{{ @$role['name']}}</option>
                        
                    @endforeach
                    
                    
                    </select>
            </div>
            
            
            
        </div>
        <div class="row mt-3 ">
           
            <div class="col-sm-10 col-md-6">
                <label for="country">Country</label>
                <input type="text" name="country" id="country" class="form-control" value="{{@$user['country']}}">
            </div>
            <div class="col-sm-10 col-md-6">
                <label for="zip_code">Zip Code</label>
                <input type="text" name="zip_code" id="zip_code" class="form-control" value="{{@$user['zip_code']}}">
            </div>
            <div class="col-sm-10 col-md-6">
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" class="form-control" value="{{@$user['phone']}}">
            </div>
            
        </div>
        <div class="row">
            <div class="col-12">
                <button type="button" style="background: linear-gradient(102.3deg, #88CDFF 41.05%, #4E8DD5 118.58%);
                box-shadow: 5px 5px 5px rgba(105, 108, 255, 0.44);
                border-radius: 10px;outline:none;border:none;color:white;padding:7px 22px;margin:55px 0px" onclick="addUser()">Create</button>
            </div>
        </div>
    </div>
    
    </form>