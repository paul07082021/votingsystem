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
                            <h3 class="mb-0">Candidates</h3><br>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Candidates</button>
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
                                                <th>Image</th>
                                                <th>Full Name</th>
                                                <th>Age</th>
                                                <th>Year/Level</th>
                                                <th>Course</th>
                                                <th>Parylist</th>
                                                <th>Position</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($candidates as $data): ?>
                                            <tr>
                                                <td>{{$data['c_image']}}</td>
                                                <td>{{$data['c_name']}}</td>
                                                <td>{{$data['c_age']}}</td>  
                                                <td>{{$data['c_yearlevel']}}</td>
                                                <td>{{$data['c_course']}}</td>
                                                <td>{{$data['c_partylist']}}</td>
                                                <td>{{$data['c_position']}}</td>
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
        <h5 class="modal-title" id="exampleModalLabel">Sign Up</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="addcandidates">
          @csrf
        <div class="mb-3">
            <label for="fullname" class="form-label">Image</label>
            <input type="file" class="form-control" name="image" placeholder="Enter your fullname">
          </div>
          <div class="mb-3">
            <label for="fullname" class="form-label">Fullname</label>
            <input type="text" class="form-control" name="fullname" placeholder="Enter your fullname">
          </div>
          <div class="mb-3">
            <label for="age" class="form-label">Age</label>
            <input type="number" class="form-control" name="age" placeholder="Enter your age">
          </div>
          <div class="mb-3">
            <label for="year" class="form-label">Year/Level</label>
            <input type="text" class="form-control" name="year" placeholder="Enter your year/level">
          </div>
          <div class="mb-3">
            <label for="course" class="form-label">Course</label>
            <input type="text" class="form-control" name="course" placeholder="Enter your course">
          </div>
          <div class="mb-3">
            <label for="position" class="form-label">Partylist</label>
            <select class="form-select" name="party" aria-label="Default select example">
            <option value="">-- select Partylist --</option>
            <?php foreach($party as $dparty):?>
            <option value="{{$dparty['par_id']}}">{{$dparty['par_name']}}</option>
            <?php endforeach; ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="position" class="form-label">Position</label>
            <select class="form-select" name="position" aria-label="Default select example">
            <option selected>-- select position --</option>
            <?php foreach($position as $position):?>
            <option value="{{$position['po_id']}}">{{$position['po_name']}}</option>
            <?php endforeach; ?>
            </select>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
      </form>
    </div>
  </div>
</div>



@include('footer')
