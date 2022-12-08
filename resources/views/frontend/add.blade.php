<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <title>Add Contact Details</title>
    </head>
    <body>

        <div class="col-sm-10">
            <form method="post" action="{{route('getContact.store')}}" enctype="multipart/form-data" >
            @csrf

                @if($errors->any())
                    {{ implode('', $errors->all('<div>:message</div>')) }}
                @endif
                
                <div class="form-group col-sm-10">
                    <div class="form-row">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="First name" name="fname" value="{{old('fname')}}" required/>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Last name" name="lname" value="{{old('lname')}}" required/>
                        </div>
                    </div>
                </div>

                <div class="form-group col-sm-10">
                    <div class="form-row">
                        <div class="col">
                            <input type="email" class="form-control" placeholder="Email" name="email" value="{{old('email')}}" required/>
                        </div>
                        <div class="col">
                            <input type="tel" class="form-control" placeholder="Phone" name="phone" value="{{old('phone')}}" max:10 min:10 required/>
                        </div>

                        <div class="col">
                            <input type="file" id="myFile" name="image">
                        </div>
                    </div>
                </div>
                

                <div class="col-sm-10">
                    <center> <button type="submit" class="btn btn-primary">Add</button> <br> </center>
                </div>
            </form>
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>