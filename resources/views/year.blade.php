@include('navbar')
<script>
  jQuery(document).ready(function($) {
    $('#tbl').DataTable({     
        
    }
    );
} );
</script>

<main class="app-main">

@if(session('error'))
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000" style="position: absolute; top: 20px; right: 20px;">
        <div class="toast-header bg-danger text-white">
            <strong class="mr-auto">Error</strong>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
            {{ session('error') }}
        </div>
    </div>
@endif

<script>
    $(document).ready(function(){
        $('.toast').toast('show');
    });
</script>

            <div class="app-content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Year/Level</h3><br>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Year/Level</button>
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
                                                <th>Year/Level</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($year as $data): ?>
                                            <tr>
                                                <td>{{$data['year_level']}}</td>
                                                <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#update{{$data['id']}}">Update</button>
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete{{$data['id']}}">Delete</button></td>                       
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
            <h5 class="modal-title" id="exampleModalLabel">Add Position</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form method="POST" action="addyear">
            @csrf
            <div class="mb-3">
                <label for="fullname" class="form-label">Year/Level</label>
                <input type="text" class="form-control" name="year" placeholder="Enter Year/Level" required>
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
    <?php foreach($year as $data): ?>
    <div class="modal fade" id="update{{$data['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form method="POST" action="updateyear">
            @csrf
            <div class="mb-3">
                <label for="fullname" class="form-label">Year/Level</label>
                <input type="text" class="form-control" name="year" value="{{$data['year_level']}}" required>
            </div>
       
        </div>
        <div class="modal-footer">
        <input type="hidden" class="form-control" name="id" value="{{$data['id']}}" required>

            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
        </form>
        </div>
    </div>
    </div>


    <div class="modal fade" id="delete{{$data['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">DELETE</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method ="POST" action="deleteyear">
      @csrf
       Are you sure you want to delete?
      </div>
      <div class="modal-footer">
      <input type="hidden" class="form-control" name="id" value="<?php echo $data['id']?>" >

        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Yes</button>
      </div>
      </form>
    </div>
  </div>
</div>









    <?php endforeach; ?>     

@include('footer')
