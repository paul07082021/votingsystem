@include('navbar')

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4"></h6>
                <div class="container-xl px-4 mt-4">
                    <div class="row">
                        <div class="col-xl-4">
                            <!-- Profile picture card-->
                            <div class="card mb-4 mb-xl-0">
                                <div class="card-header">Profile Picture</div>
                                <div class="card-body text-center">
                                    <img class="img-account-profile rounded-circle mb-2" src="../images/profile.img" style="width: 100%; height: 50%;"alt="">
                                    <div class="small font-italic text-muted mb-4">DEFAULT PROFILE ADMIN</div>
                    
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8">
                            <!-- Account details card-->
                            <div class="card mb-4">
                                <div class="card-header">Account Details</div>
                                <div class="card-body">
                                    <form method="POST">
                                  
                                        <div class="mb-3">
                                            <label class="small mb-1" for="inputUsername">Username</label>
                                            <input class="form-control" id="inputUsername" name="username" type="text" placeholder="Enter your username" value="USERNAME">
                                        </div>
                                        <!-- Form Row-->
                                        <div class="row gx-3 mb-5">
                                      
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputFirstName">First name</label>
                                                <input class="form-control" id="inputFirstName" name="fname" type="text" placeholder="Enter your first name" value="FIRST NAME">
                                            </div>
                                         
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputLastName">Last name</label>
                                                <input class="form-control" id="inputLastName" name="lname" type="text" placeholder="Enter your last name" value="LAST NAME">
                                            </div>
                                      
                                            
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputLastName">Password</label>
                                                <input class="form-control" id="inputLastName" name="password" type="password" placeholder="Enter your last name" value="PASSWORD">
                                            </div>

                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputLastName">Confirm Password</label>
                                                <input class="form-control" id="inputLastName"  name="confirmpass" type="password" placeholder="Confirm Password" value = "CONFIRM PASSWORD">
                                            </div>
                                            
                                            
                                        </div>
                                        <br><br>
                                        <button class="btn btn-primary" type="submit" name="change" >Save changes</button>
                                        </div>
                                
                                      
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Table End -->

<br><br>

        </div>




@include('footer')