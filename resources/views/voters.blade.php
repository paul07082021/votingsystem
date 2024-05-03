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
                            <h3 class="mb-0">Voters</h3><br>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Voters</button>

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
                                                <th>Student ID</th>
                                                <th>Fullname</th>
                                                <th>Year/Level</th>
                                                <th>Course</th>
                                                <th>Voter's Pass</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($voters as $data): ?>
                                            <tr>
                                            <td>{{$data['stud_id']}}</td>
                                                <td>{{$data['stud_fullname']}}</td>
                                                <td>{{$data['stud_year']}}</td>
                                                <td>{{$data['stud_course']}}</td>  
                                                <td>{{$data['stud_pass']}}</td>  
                                                <td><button type="button" class="btn btn-primary">Update</button>
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
      <form method="POST" action="addparty">
        @csrf
          <div class="mb-3">
            <label for="fullname" class="form-label">Student ID</label>
            <input type="text" class="form-control" name="partyname" placeholder="please enter" required>
          </div>
          <div class="mb-3">
            <label for="username" class="form-label">FullName</label>
            <input type="text" class="form-control" name="image" placeholder="please enter" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Year/Level</label>
            <input type="text" class="form-control" name="desc" placeholder="please enter" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Course</label>
            <input type="text" class="form-control" name="desc" placeholder="please enter" required>
          </div>  
          <div class="mb-3">
            <label for="password" class="form-label">Voter's Pass</label>
            <input type="text" class="form-control" name="desc" placeholder="please enter" required>
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
@include('footer')
