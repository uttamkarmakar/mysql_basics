<?php

  /**
 * EmployeeData - Takes all the employee data from the user form.
 *
 * @author Uttam karmakar
 * 
 * @method Connections()
 *  This function use to setup the connection with the database.
 * 
 * @method PushIntoDatabase()
 *  This function helps to insert the employee details to the database when a 
 * user submit the form after filling the information in the form.
 * 
 * @method checkingErrors() ()
 *  This method use to check if there any field in the form is empty or not,if
 * empty it will show error.
 */

  class EmployeeData {

    /**
     * @var string $FirstName
     *  Stores the first name of the user.
     * 
     * @var string $LastName
     *  Stores the last name of the user.
     * 
     * @var string $GraduationPercent
     *  Stores the graduation percentile of the user.
     * 
     * @var string $Salary
     *  Stores the salary amount of the user.
     * 
     * @var string $CodeName
     *  Stores code name of a particular user.
     * 
     * @var string $domain
     *  Stores domain name entered by user.
     */
    public string $FirstName;
   
    public string $LastName;
   
    public int $GraduationPercent;
   
    public int $Salary;
    
    public string $CodeName;
   
    public string $domain;
    
    public $conn;
    
    public $empId;
    
    public $empCode;

    
    public $errors = [
      'FirstName' => '',
      'LastName' => '',
      'GraduationPercent' => '',
      'Salary' => '',
      'CodeName' => '',
      'domain' => ''
    ];

    
    public function __construct() {
      if (isset($_POST['btn-Submit'])) {
        $this->FirstName = $_POST['FirstName'];
        $this->LastName = $_POST['LastName'];
        $this->GraduationPercent = (int) $_POST['GraduationPercent'];
        $this->Salary = (int) $_POST['Salary'];
        $this->CodeName = $_POST['CodeName'];
        $this->domain = $_POST['domain'];
        $this->empId = 1;
        $this->empCode = "su_" . $_POST['FirstName'];
      }
      
    }

    /**
     *  Connections-Function to connect to Database.
     * @var string $hostName
     *  Stores the host name of the connection.
     * @var string $userName
     *  Stores the user name of the host.
     * @var string $userPass
     *  Stores password of the host.
     * @var string $dbName
     *  Stores the database name where all the employee details will be stored.
     */
    public function Connections() {
      $hostName = "localhost";
      $userName = "root";
      $userPass = "Kunal123";
      $dbName = "assignment2";
      $this->conn = new mysqli($hostName,$userName,$userPass, $dbName);
    }
    
    public function PushIntoDatabase() {
      $this->Connections();
      $thirdQuery = "INSERT INTO employee_details_table (employee_id, employee_first_name, employee_last_name, Graduation_percentile)
      VALUES(3, '$this->FirstName', '$this->LastName', '$this->GraduationPercent'); ";

      $firstQuery = "INSERT INTO employee_code_table (employee_code, employee_code_name, employee_domain)
      VALUES('$this->empCode', '$this->CodeName', '$this->domain'); ";

      $secondQuery = "INSERT INTO employee_salary_table (employee_id, employee_salary, employee_code)
      VALUES(3, '$this->Salary', '$this->empCode'); ";

      // $finalQuery = $firstQuery . " " . $secondQuery . " " . $thirdQuery;

      $this->conn->query($firstQuery);
      $this->conn->query($secondQuery);
      $this->conn->query($thirdQuery);
    
    }

    /**
     * checkingErrors - Stores error if any field is unfilled by a user.
     * 
     * @return boolean
     *  Returns true if there is no error present else it will return false.
     */
    public function checkingErrors() {
      $errorCount = 0;
      if (empty($this->FirstName)) {
        $this->errors['FirstName'] = "*First Name is mandatory.";
        $errorCount++;
      }
      if (empty($this->LastName)) {
        $this->errors['LastName'] = "*Last Name is mandatory.";
        $errorCount++;
      }
      if (empty($this->GraduationPercent)) {
        $this->errors['GraduationPercent'] = "*Graduation percentile is required.";
        $errorCount++;
      }
      if (empty($this->Salary)) {
        $this->errors['Salary'] = "*Salary is required.";
        $errorCount++;
      }
      if (empty($this->CodeName)) {
        $this->errors['CodeName'] = "*Code Name is required.";
        $errorCount++;
      }
      if (empty($this->domain)) {
        $this->errors['domain'] = "*Domain Name is required.";
        $errorCount++;
      }
      if ($errorCount == 0) {
        return TRUE;
      }
      return FALSE;
    }

  }
