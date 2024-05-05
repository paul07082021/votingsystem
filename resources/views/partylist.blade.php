@include('navbar')
<script>
  jQuery(document).ready(function($) {
    $('#tbl').DataTable({     
        
    }
    );
} );
</script>
<main class="app-main">
            <div class="app-content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Partylist</h3><br>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Partylist</button>

                        </div>
                        <div class="col-sm-6">
                         
                        </div>
                    </div>
                </div>
            </div>
            <div class="app-content">
                <div class="container-fluid">
                            <div class="card p-4">
                                <div class="card-body p-0">
                                    <table id="tbl" class="table">
                                        <thead>
                                            <tr>
                                                <th>Partylist Name</th>
                                                <th>Logo</th>
                                                <th>Description</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($data as $data): ?>
                                            <tr>
                                                <td>{{$data['par_name']}}</td>
                                                <td><img src="storage/app/assets/img/{{$data['par_logo']}}" height="50" width="50"></td>
                                                <td>{{$data['par_desc']}}</td>  
                                                <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#update{{$data['par_id']}}">Update</button>
                                                <button type="button" class="btn btn-danger">Delete</button></td>                       
                                            </tr>
                                             <?php endforeach; ?>      
                                        </tbody>
                                    </table>
                            </div>
                        </div>
                    </div>
                </div>
        </main>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Partylist</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="addparty" enctype="multipart/form-data">
        @csrf
          <div class="mb-3">
            <label for="fullname" class="form-label">Partylist Name</label>
            <input type="text" class="form-control" name="partyname" placeholder="Enter your Partylist Name" required>
          </div>
          <div class="mb-3">
            <label for="username" class="form-label">Image/Logo</label>
            <input type="file" class="form-control" name="image" placeholder="Enter your username" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Description</label>
            <input type="text" class="form-control" name="desc" placeholder="Enter your description" required>
          </div>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Update Modal -->
<?php foreach($datas as $data): ?>
<div class="modal fade" id="update<?php echo $data['par_id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Partylist</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="updateparty">
        @csrf
          <div class="mb-3">
            <label for="fullname" class="form-label">Partylist Name</label>
            <input type="text" class="form-control" name="partyname" value="{{$data['par_name']}}" required>
          </div>
          <div class="mb-3">
            <label for="username" class="form-label">Image/Logo</label>
            <input type="file" class="form-control" name="image" value="{{$data['par_logo']}}" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Description</label>
            <input type="text" class="form-control" name="desc" value="{{$data['par_desc']}}" required>
          </div>
      
      </div>
      <div class="modal-footer">
        
        <input type="hidden" class="form-control" name="id" value="{{$data['par_id']}}" required>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
      </form>
    </div>
  </div>
</div>
 <?php endforeach; ?>

@include('footer')
