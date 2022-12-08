<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <title>Contact Details</title>
    </head>
    <body>

        <div class="col-12">
            <center> <h4> All Contacts </h4> </center>
        </div>

        <div class="form-group col-sm-12">
            <div class="form-row">
                <form method="post" action="{{ route('sort-table') }}">
                    @csrf
                    <div class="form-group">
                        <label for="sel1">Sort By:</label>
                        <select class="form-control" id="sortBy" name="sortBy">
                            <option value="fname">First Name</option>
                            <option value="lname">Last Name</option>
                            <option value="email">Email</option>
                            <option value="phone">Phone</option>
                        </select>
                    </div>

                    <div class="col-12">
                        <center> <button type="submit"> Submit </button> <center>
                    </div>
                </form>
            </div>

            <div class="form-row">
                <form method="post" action="{{ route('search-table') }}">
                    @csrf
                    <div class="form-group">
                        <label for="sel1">Search:</label>
                        <input type="text" class="form-control" placeholder="Search" name="search" />
                    </div>

                    <div class="col-12">
                        <center> <button type="submit"> Submit </button> <center>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-12">
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if(!empty($contacts->contact) && $contacts->contact !== null)
                        @foreach ($contacts->contact as $contact)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td style="width: 10%;">
                                    <img src="http://localhost:8000/{{ ($contact->image) }}" style="max-width: 100%; height: auto;">
                                </td>
                                <td>{{ $contact->fname }}</td>
                                <td>{{ $contact->lname }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->phone }}</td>
                                <td>
                                    <a href="{{ route('getContact.edit', $contact->id) }}" class="edit_a_tag" data-toggle="tooltip" data-placement="top" title="Edit">Edit</a> &nbsp; | &nbsp;

                                    <a href="{{ route('contact-delete', $contact->id) }}" class="tooltips confirm del_a_tag" confirm-text="Are You Sure?" data-placement="top" title="Delete" data-toggle="tooltip">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <center>  <tr>
                            <td colspan="4">No Data Found</td>
                        </tr> </center>
                    @endif
                </tbody>
            </table>
        </div>

        
        <div class="col-12">
            <center> <a href="{{ route('getContact.create') }}" class="pull-right btn btn-primary">Create</a> <center>
        </div>
       

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>