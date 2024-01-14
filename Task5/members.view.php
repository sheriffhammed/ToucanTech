
<?php 
    include_once("./model/db.php");
    include_once("./model/member.model.php");
    include_once("./model/school.model.php");

    

    if(isset($_POST['check'])){
      $school_id = $_POST['mySchool'];
      echo $school_id;
    }
    $result = get_member_by_school(NULL);

    $sch = get_school_by_country(NULL);
    $schools = json_decode($sch);
  

    $members = json_decode($result);
?>
<!doctype html>
<html lang="en">

 <?php require_once(__DIR__ . "/header.php"); ?>
  <body>
   
  <div class="container">
   
     <div class="top">
     <p class="mySelect">
        <select name="mySchool" id="" class="form-control mr-3">
          <option value="">--Select school--</option>
          <?php foreach ($schools as $school): ?>
            <option value="<?php echo $school->id  ?>"><?php echo $school->school_name ?></option>
      
      <?php endforeach; ?>
        </select>
        <button class="btn btn-outline-primary" type="submit" name="go">Go</button>
       
      </p>

      <a href="./school.view.php"> Schools</a>

     </div>
    <div class="card">
  <div class="card-header table-top">
    Members

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
      Add New 
  </button>

  </div>
  <div class="card-body">
    <table  id="memberTable" class="table table-bordered table-striped table-hover" id="example">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>School</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach ($members as $member): ?>
        <tr>
            <td><?php echo $member->id; ?></td>
            <td><?php echo $member->name; ?></td>
            <td><?php echo $member->email; ?></td>
            <td><?php echo $member->school_name; ?></td>
            
            <td>
                <button type="button" value="<?=$member->id;?>" class="editMembersBtn btn btn-success btn-sm">Edit</button>
                <button type="button" value="<?=$member->id;?>" class="deleteStudentBtn btn btn-danger btn-sm">Delete</button>
            </td>
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
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Member</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      <div class="form-floating">
        <input type="text" class="form-control" id="name" placeholder="John Doe" />
        <label htmlFor="floatingInput">Full Name</label>
      </div>
<br>
      <div class="form-floating">
        <input type="email" class="form-control" id="email" placeholder="name@example.com" />
        <label htmlFor="floatingInput">Email address</label>
      </div>

      <br>
      <div className="form-floating">
   
  

    <select name="" id="school" class="form-control mr-3">
          <option value="">--Select school--</option>
          <?php foreach ($schools as $school): ?>
            <option value="<?php echo $school->id  ?>"><?php echo $school->school_name ?></option>
      
      <?php endforeach; ?>
        </select>

  </div>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="save">Save </button>
      </div>
      <p id="errMsg"></p>
      <p id="msg"></p>
    </div>
  </div>
</div>

<!-- Edit Student Modal -->
<div class="modal fade" id="memberEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Student</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="updateStudent">
            <div class="modal-body">

                <div id="errorMessageUpdate" class="alert alert-warning d-none"></div>

                <input type="hidden" name="member_id" id="member_id" >

                <div class="mb-3">
                    <label for="">Name</label>
                    <input type="text" name="name" id="name" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Email</label>
                    <input type="text" name="email" id="email" class="form-control" />
                </div>
                
                <div class="mb-3">
                    <label for="">School</label>
                    <input type="text" name="school" id="school" class="form-control" />
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update Member</button>
            </div>
        </form>
        </div>
    </div>
</div>


<?php require_once(__DIR__ . "/footer.php"); ?>
