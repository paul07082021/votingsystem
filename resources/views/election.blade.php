@include('navbar')

<main class="app-main">
            <div class="app-content-header">
                <div class="container-fluid">
                  <center> <h3>ELECTION TITLE</h3><br>
                  <form method="POST" action="update">
                @csrf
                  <input type="text" class="form-control" name="elecname" value="<?= $elec['elec_name'] ?>" placeholder="Please enter Election Name" required><br>
                 <input type="hidden" value="<?= $elec['elec_id'] ?>" name="id">
                  <button type="submit" class="btn btn-primary">Update</button>
                  </form>              
                        </div>
                    </div>
                </div>
            </div>
        </main>




@include('footer')
