<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Bootstrap demo</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   </head>
   <body>
      <div class="container mt-5">
         <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#AddModal">
         Add Contact
         </button>
         <table class="table">
            <tr>
               <th class="table-success">Name</th>
               <th class="table-success">Address</th>
               <th class="table-success">Edit</th>
               <th class="table-success">Delete</th>
            </tr>
            @foreach ( $contacts as  $contact)
            <tr>
               <td > {{ $contact->name }}</td>
               <td> {{ $contact->address }}</td>
               <td>
                    <button type="button" class="btn btn-secondary mb-2" data-bs-toggle="modal" data-bs-target="#UpdateModel">
                        Update
                    </button>
                </td>
                <td> 
                    <form action="{{ route('users.delete', $contact->id ) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>  
                    </form> 
                </td>
            </tr>
            @endforeach
         </table>
      </div>
      <div class="modal fade" id="AddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <form action="{{ route('users.create') }}" method="POST">
                  <div class="modal-body">
                     @foreach ($errors->all() as $message)
                     <p>{{ $message }}</p>
                     @endforeach
                     @csrf
                     <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                           <input type="text" name="name" class="form-control" id="staticEmail">
                        </div>
                     </div>
                     <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                           <input type="text" name="address" class="form-control" id="inputPassword">
                        </div>
                     </div>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-primary">Save changes</button>
                  </div>
               </form>
            </div>
         </div>
      </div>

      <div class="modal fade" id="UpdateModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <form action="{{ route('users.update', 12) }}" method="POST">
                  <div class="modal-body">
                     @foreach ($errors->all() as $message)
                     <p>{{ $message }}</p>
                     @endforeach
                     @csrf
                     @method('PATCH')
                     <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                           <input type="text" name="name" class="form-control" id="staticEmail">
                        </div>
                     </div>
                     <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                           <input type="text" name="address" class="form-control" id="inputPassword">
                        </div>
                     </div>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-primary">Save changes</button>
                  </div>
               </form>
            </div>
         </div>
      </div>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
   </body>
</html>