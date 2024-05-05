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
                            <h3 class="mb-0">Election Result</h3>
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
                                            <th>Partylist</th>
                                                <th>Position</th>
                                                <th>Full Name</th>
                                                <th>Age</th>
                                                <th>Year/Level</th>
                                                <th>Course</th>
                                                <th>Vote Count</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($candidates as $data): ?>
                                            <tr>
                                                <td>{{$data['par_name']}}</td>
                                                <td>{{$data['po_name']}}</td>
                                                <td>{{$data['c_name']}}</td>
                                                <td>{{$data['c_age']}}</td>  
                                                <td>{{$data['c_yearlevel']}}</td>
                                                <td>{{$data['c_course']}}</td>
                                                <td>{{$data['vote_count']}}</td>                                       
                                            </tr>
                                             <?php endforeach; ?>      
                                        </tbody>
                                    </table>
                            </div>
                        </div>
                    </div>
                </div>
        </main>


@include('footer')
