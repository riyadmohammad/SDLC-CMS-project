<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <title>Add Student</title>
</head>

<body>
    <h1>Student Add</h1>
    <form method='POST' action="{{(@$editData)? route('update',$editData['id']):route('store')}}">
        @csrf
        <div class="form-row">
            <div class="col-md-4">
                <label for="exampleFormControlInput1">Name</label>
                <input type="text" name="name" value="{{ !empty($editData->name)? $editData->name : old('name') }}" class="form-control" id="name" placeholder="Name">
            </div>
            <div class="form-group col-md-4">
                <label for="exampleFormControlInput1">Email</label>
                <input type="text" name="email" value="{{ !empty($editData->email)? $editData->email : old('email') }}" class="form-control" id="email" placeholder="Email">
            </div>
            <div class="form-group col-md-4">
                <label for="exampleFormControlInput1">Phone</label>
                <input type="text" name="phone" value="{{ !empty($editData->phone)? $editData->phone : old('phone') }}" class="form-control" id="email" placeholder="Phone">
            </div>
            <label for="exampleFormControlTextarea1">Address</label>
            <textarea class="form-control" name="address" id="exampleFormControlTextarea1" rows="3">{{ !empty($editData->address)? $editData->address : old('address') }}</textarea>
        </div>
        <center>
            <br>
            <button class="btn bg-gradient-success btn-flat"><i class="fas fa-save"></i> {{ !empty($editData)? 'Update' : 'Save ' }}</button>
        </center>
    </form>
    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
