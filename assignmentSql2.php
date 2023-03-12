<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
  // Stores data in database when form is submitted.
  require("classes/EmployeeData.php");
  $employee = new EmployeeData();
  if (isset($_POST['btn-Submit'])) {
    if ($employee->checkingErrors()) {
      $employee->PushIntoDatabase();
    }
  }
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags. -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <!-- Bootstrap CSS. -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!-- Including style.css. -->
  <link rel="stylesheet" href="css/style.css">

  <title>Basics SQL Assignment</title>
  <!--  Including jquery. -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>

<body class="">
  <!-- Main Section with Form. -->
  <div class="main m-5">
    <div class="container">
      <form class="assignment m-3" method="post" action="assignmentSql2.php">
        <div class="form-group">
          <label for="FirstName">First Name</label>
          <input type="text" class="form-control" id="FirstName" name="FirstName" aria-describedby="emailHelp"
            placeholder="Enter First Name">
            <span class="red"><?php echo "{$employee->errors['FirstName']}"; ?></span>
        </div>
        <div class="form-group">
          <label for="LastName">Last Name</label>
          <input type="text" class="form-control" id="LastName" name="LastName" placeholder="Last Name">
          <span class="red"><?php echo "{$employee->errors['LastName']}"; ?></span>
        </div>
        <div class="form-group">
          <label for="inputGradPercent">Graduation Percentage:</label>
          <input type="text" class="form-control" id="inputGradPercent" name="GraduationPercent" placeholder="percentage">
          <span class="red"><?php echo "{$employee->errors['GraduationPercent']}"; ?></span>
        </div>
        <div class="form-group">
          <label for="inputSalary">Salary</label>
          <input type="text" class="form-control" id="Salary" name="Salary" placeholder="Enter your salary">
          <span class="red"><?php echo "{$employee->errors['Salary']}"; ?></span>
        </div>
        <div class="form-group">
          <label for="inputCodeName">Enter your Code Name</label>
          <input type="text" class="form-control" id="CodeName" name="CodeName" placeholder="Enter code">
          <span class="red"><?php echo "{$employee->errors['CodeName']}"; ?></span>
        </div>
        <div class="form-group">
          <label for="inputDomain">Enter your Domain</label>
          <input type="text" class="form-control" id="domain" name="domain" placeholder="Enter your domain name">
          <span class="red"><?php echo "{$employee->errors['domain']}"; ?></span>
        </div>
        <button type="submit" name="btn-Submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>

  <!-- Optional JavaScript. -->
  <!-- JQuery first, then Popper.js, then Bootstrap JS. -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>

  <!-- Including jquery code. -->
  <script>
    // Full Form validation.
    var alphabetRegex = /^[a-zA-Z]+$/;
    $(".assignment").submit(function (event) {
      var FirstName = $("input[name='FirstName']").val();
      var LastName = $("input[name='LastName']").val();
      var GraduationPercent = $("input[name='GraduationPercent']").val();
      var Salary = $("input[name='Salary']").val();
      var CodeName = $("input[name='CodeName']").val();
      var domain = $("input[name='domain']").val();

      if (!FirstName) {
        alert("First Name is Required!");
        event.preventDefault();
      }
      else if (!LastName) {
        alert("last Name is Required!");
        event.preventDefault();
      }
      else if (!alphabetRegex.test(FirstName) || !alphabetRegex.test(LastName)) {
        alert("Name should contain alphabets only");
        event.preventDefault();
      }
      else if (!GraduationPercent || GraduationPercent.length > 4) {
        alert("Give correct Graduation percentage");
        event.preventDefault();
      }
      else if (!Salary) {
        alert("Salary is Required!");
        event.preventDefault();
      }
      else if (!CodeName) {
        alert("Code Name is Required!");
        event.preventDefault();
      }
      else if (!domain) {
        alert("Domain Name is Required!");
        event.preventDefault();
      }
    });
  </script>
</body>

</html>
