@include('navbar')
<script>
jQuery(document).ready(function($) {
    $('#tbl').DataTable({
        initComplete: function () {
            this.api().columns().every(function (index) {
              if (index >= 1 && index <= 6) {

                    var column = this;
                    var input = $('<input type="text" placeholder="search" />')
                        .appendTo($(column.footer()).empty())
                        .on('keyup change clear', function () {
                            if (column.search() !== this.value) {
                                column.search(this.value).draw();
                            }
                        });
                }else{
                  var column = this;
                    var input = $('')
                        .appendTo($(column.footer()).empty())
                        .on('keyup change clear', function () {
                            if (column.search() !== this.value) {
                                column.search(this.value).draw();
                            }
                        });
                }
               
         
            });
        }
    });
});
</script>
<style>
    table tfoot {
        display: table-header-group;
    }
    table thead tr, table tfoot tr {
        display: table-row;
    }
    .dataTables_filter {
    display: none;
}

</style>
<main class="app-main">
            <div class="app-content-header">
            @if(session('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
@endif

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
                                                <th >Image</th>
                                                <th>Full Name</th>
                                                <th>Age</th>
                                                <th>Year/Level</th>
                                                <th>Course</th>
                                                <th>Parylist</th>
                                                <th>Position</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                          <tr>
                                                <th>Image</th>
                                                <th>Full Name</th>
                                                <th>Age</th>
                                                <th>Year/Level</th>
                                                <th>Course</th>
                                                <th>Parylist</th>
                                                <th>Position</th>
                                                <th style="width:200px;">Action</th>
                                        </tr>
                                       </tfoot>
                                        <tbody>
                                            <?php foreach($candidates as $data): ?>
                                            <tr>
                                                <td><img src="storage/app/assets/img/{{$data['c_image']}}" height="50" width="50"></td>
                                                <td>{{$data['c_name']}}</td>
                                                <td>{{$data['c_age']}}</td>  
                                                <td>{{$data['c_yearlevel']}}</td>
                                                <td>{{$data['c_course']}}</td>
                                                <td>{{$data['par_name']}}</td>
                                                <td>{{$data['po_name']}}</td>
                                                <td><button type="button" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#update{{$data['c_id']}}">Update</button>
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete{{$data['c_id']}}">Delete</button></td>                       
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
        <form method="POST" action="addcandidates" enctype="multipart/form-data">
          @csrf
        <div class="mb-3">
            <label for="fullname" class="form-label">Image</label>
            <input type="file" class="form-control" name="image" placeholder="Enter your fullname" required>
          </div>
          <div class="mb-3">
            <label for="fullname" class="form-label">Fullname</label>
            <input type="text" class="form-control" name="fullname" placeholder="Enter your fullname" required>
          </div>
          <div class="mb-3">
            <label for="age" class="form-label">Age</label>
            <input type="number" class="form-control" name="age" placeholder="Enter your age" required>
          </div>
          <div class="mb-3">
            <label for="year" class="form-label">Year/Level</label>
            <input type="text" class="form-control" name="year" placeholder="Enter your year/level" required>
          </div>
          <div class="mb-3">
            <label for="course" class="form-label">Course</label>
            <input type="text" class="form-control" name="course" placeholder="Enter your course" required>
          </div>
          <div class="mb-3">
            <label for="position" class="form-label">Partylist</label>
            <select class="form-select" name="party" aria-label="Default select example" required>
            <option value="">-- select Partylist --</option>
            <?php foreach($party as $dparty):?>
            <option value="{{$dparty['par_id']}}">{{$dparty['par_name']}}</option>
            <?php endforeach; ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="position" class="form-label">Position</label>
            <select class="form-select" name="position" aria-label="Default select example" required>
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



<!-- Update Modal -->
<?php foreach($candidates as $data): ?>
<div class="modal fade" id="update{{$data['c_id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Candidate</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="updatecandidates" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="c_id" value="{{ $data['c_id'] }}">
          <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" name="image">
          </div>
          <div class="mb-3">
            <label for="fullname" class="form-label">Fullname</label>
            <input type="text" class="form-control" name="fullname" value="{{ $data['c_name'] }}">
          </div>
          <div class="mb-3">
            <label for="age" class="form-label">Age</label>
            <input type="number" class="form-control" name="age" value="{{ $data['c_age'] }}">
          </div>
          <div class="mb-3">
            <label for="year" class="form-label">Year/Level</label>
            <input type="text" class="form-control" name="year" value="{{ $data['c_yearlevel'] }}">
          </div>
          <div class="mb-3">
            <label for="course" class="form-label">Course</label>
            <input type="text" class="form-control" name="course" value="{{ $data['c_course'] }}">
          </div>
          <div class="mb-3">
            <label for="position" class="form-label">Partylist</label>
            <select class="form-select" name="party" aria-label="Default select example">
            <option value="{{$data['par_id']}}" selected>{{$data['par_name']}}</option>
            <?php foreach($partys as $dparty):?>
            <option value="{{$dparty['par_id']}}">{{$dparty['par_name']}}</option>
            <?php endforeach; ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="position" class="form-label">Position</label>
            <select class="form-select" name="position" aria-label="Default select example">
            <option value="{{$data['po_id']}}" selected>{{$data['po_name']}}</option>
            <?php foreach($positions as $position):?>
            <option value="{{$position['po_id']}}">{{$position['po_name']}}</option>
            <?php endforeach; ?>
            </select>
          </div>
        
      </div>
      <div class="modal-footer">
        <input type="hidden" value="{{$data['c_id']}}" name="c_id">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
      </form>
    </div>
  </div>
</div>





<div class="modal fade" id="delete{{$data['c_id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">DELETE</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method ="POST" action="deletecandidates">
      @csrf
       Are you sure you want to delete?
      </div>
      <div class="modal-footer">
      <input type="hidden" class="form-control" name="id" value="<?php echo $data['c_id']?>" >

        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Yes</button>
      </div>
      </form>
    </div>
  </div>
</div>
















<?php endforeach; ?>      


@include('footer')
