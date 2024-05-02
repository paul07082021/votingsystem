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
                            <h3 class="mb-0">Position</h3><br>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Position</button>
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
                                                <th>Position</th>
                                                <th>Maximum Vote</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($position as $data): ?>
                                            <tr>
                                                <td>{{$data['po_name']}}</td>
                                                <td>{{$data['po_max_vote']}}</td>
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
            <h5 class="modal-title" id="exampleModalLabel">Add Position</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form>
            <div class="mb-3">
                <label for="fullname" class="form-label">Position</label>
                <input type="text" class="form-control" id="fullname" placeholder="Enter Position" required>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Maximum Vote</label>
                <input type="number" class="form-control" id="username" placeholder="Enter max vote" required>
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
