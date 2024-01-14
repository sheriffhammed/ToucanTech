
<?php 
    include_once("./model/db.php");
    include_once("./model/school.model.php");
    $result = get_school_by_country(NULL);
    $schools = json_decode($result);
?>



<!doctype html>
<html lang="en">
<?php require_once(__DIR__ . "/header.php"); ?>
  <body>
   
  <div class="container">
   
  <div class="top">
     <p class="mySelect">
        <select name="" id="" class="form-control mr-3">
          <option value="">--Select Country--</option>
          <option value="UK">UK</option>
          <option value="USA">USA</option>
          <option value="Canada">Canada</option>
          <option value="Germany">Germany</option>
          <option value="India">India</option>
          <option value="Nigeria">Nigeria</option>
          <option value="France">France</option>
        </select>
        <button class="btn btn-outline-primary">Go</button>
      </p>

      <a href="./index.php"> Members</a>

     </div>

    <div class="card">
  <div class="card-header table-top">
    Schools

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
      Add New 
  </button>
  </div>
  <div class="card-body">
    <table id="schoolTable"  class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>School Name</th>
          <th>Country</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach ($schools as $school): ?>
        <tr>
            <td><?php echo $school->id; ?></td>
            <td><?php echo $school->school_name; ?></td>
            <td><?php echo $school->country; ?></td>
          
        </tr>
      <?php endforeach; ?>

      </tbody>
    </table>
  </div>
</div>

  </div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add School</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      <div class="form-floating">
        <input type="text" class="form-control" id="name" placeholder="Haverd University" />
        <label htmlFor="floatingInput">School Name</label>
      </div>
      <br>
      <div className="form-floating">
   
    <select name="" class="form-control" id="country">
      <option value="">--Country--</option>
      <option value="UK">UK</option>
          <option value="USA">USA</option>
          <option value="Canada">Canada</option>
          <option value="Germany">Germany</option>
          <option value="India">India</option>
          <option value="Nigeria">Nigeria</option>
          <option value="France">France</option>
    </select>

  </div>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="addSchool">Save </button>
      </div>
      <p id="errMsg"></p>
      <p id="msg"></p>
    </div>
  </div>
</div>


<?php require_once(__DIR__ . "/footer.php"); ?>

