@include('navbar')

<main class="app-main">
            <div class="app-content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Candidates</h3>
                        </div>
                        <div class="col-sm-6">
                         
                        </div>
                    </div>
                </div>
            </div>
            <div class="app-content">
                <div class="container-fluid">
                            <div class="card">
                                <div class="card-body p-0">
                                    <table id="tbl" class="table">
                                        <thead>
                                            <tr>
                                                <th>FullName</th>
                                                <th>Username</th>
                                                <th>Password</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($admin as $data): ?>
                                            <tr>
                                                <td>{{$data['admin_fullname']}}</td>
                                                <td>U{{$data['admin_username']}}</td>
                                                <td>{{$data['admin_password']}}</td>  
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




@include('footer')
