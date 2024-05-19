<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting System - Voters Screen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="resources/css/voterscreen.css" rel="stylesheet">

</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"><img src = "resources/images/school-logo.png" style = "height:70px;" /></a>
          <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            </ul>
            <span id = "student-desktop" ><?php echo session('name'); ?></span>
            <a class = "desktop btn" href = "votersignout" class="navbar-text">SIGN OUT</a>
          </div>
          <span id = "student-mobile" >Student Name</span>
          <a class = "mobile btn" href = "votersignout" class="navbar-text">SIGN OUT</a>
        </div>
      </nav>
      <script>
    function checkCandidates(partyId) {
        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        checkboxes.forEach(function(checkbox) {
            if (checkbox.getAttribute('data-party') == partyId) {
                checkbox.checked = true;
            } else {
                checkbox.checked = false;
            }
        });
    }
</script>

<div class="voters container-fluid">
    <div class="voters-header">
        <h3>{{$elec['elec_name']}}</h3>
    </div>
    <div class="vote-straight">
        <h6>VOTE STRAIGHT</h6>
        <div class="partylist">
            <?php foreach($party as $party):?>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="party" id="votestraight<?= $party['par_id']?>" value="<?= $party['par_id']?>" onclick="checkCandidates(<?= $party['par_id']?>)">
                <label class="form-check-label" for="votestraight<?= $party['par_id']?>">
                    {{$party['par_name']}}
                </label>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <form method="POST" action="vote">
        @csrf
        <?php foreach($positions as $pos): ?>
        <!--DITO ILALAGAY YUNG PARA SA <?= $pos['po_name'];?> -->
        <div class="candidate-list bg-body-tertiary">
            <div class="candidate-item">
                <h5><?= $pos['po_name'];?></h5>
                <?php foreach($candidates as $candidate): ?>
                <?php if($candidate['c_position'] == $pos['po_id']): ?>
                <div class="candidate form-check">
                    <input class="form-check-input" type="checkbox" name="positions[<?= $pos['po_id']; ?>][]" id="votestraight<?= $candidate['c_id']; ?>" value="<?= $candidate['c_id']; ?>" data-party="<?= $candidate['par_id']; ?>" onchange="limitCheckboxes(this, 1)">
                    <label class="candidate-label form-check-label" for="votestraight<?= $candidate['c_id']; ?>">
                        <img src="storage/app/assets/img/{{$candidate['c_image']}}" alt="Voting System">
                        <p><?= $candidate['c_name']; ?></p>
                        <div class="candidate-details">
                            <p>Party List: <?= $candidate['par_name']; ?></p>
                            <p>Age: <?= $candidate['c_age']; ?></p>
                            <p>Year Level: <?= $candidate['c_yearlevel']; ?></p>
                            <p>Course: <?= $candidate['c_course']; ?></p>
                        </div>
                    </label>
                </div>
                <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
        <!--END-->
        <?php endforeach; ?>
        <input type="hidden" name="studentname" value="<?php echo session('name'); ?>">
        <input type="hidden" name="studid" value="<?php echo session('stud_id'); ?>">
        <div class="for-view-button">
            <button type="submit" class="btn btn-primary" hidden>SUBMIT</button>
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#viewModal">VIEW SUMMARY</button>
        </div>
   
</div>



    <script>
    function limitCheckboxes(checkbox, max) {
        var checkboxes = document.getElementsByName(checkbox.name);
        var checkedCount = 0;
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].checked) {
                checkedCount++;
            }
        }
        if (checkedCount > max) {
            checkbox.checked = false;
        }
    }
</script>
<!-- Modal -->
<div class="modal fade" id="viewModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">CANDIDATES</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="selectedCandidates">
                <!-- Selected candidates will appear here -->
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-bs-dismiss="modal" onclick=" location.reload();">CHANGE</button>
                <button type="submit" class="btn btn-primary">SUBMIT</button>
            </div>
        </div>
    </div>
</div>
</form>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $('#viewModal').on('show.bs.modal', function (e) {
        var selectedCandidates = "";
        <?php foreach($positions as $pos): ?>
        selectedCandidates += "<p ><?= $pos['po_name']; ?>:</p>";
        <?php foreach($candidates as $candidate): ?>
        <?php if($candidate['c_position'] == $pos['po_id']): ?>
        if ($('#votestraight<?= $candidate['c_id']; ?>').prop('checked')) {
            selectedCandidates += "<p style='color:blue;'><?= $candidate['c_name']; ?></p>";
        }
        <?php endif; ?>
        <?php endforeach; ?>
        <?php endforeach; ?>
        $("#selectedCandidates").html(selectedCandidates);
    });
</script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>