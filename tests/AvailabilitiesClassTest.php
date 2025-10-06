<?php

declare(strict_types=1); //I had to assign strict typing in this file. I wasn't able to determine where the issue was coming from, but the booleans values of "assertEquals" kept returning errors until I declared strict_typing.

use PHPUnit\Framework\TestCase;
require_once __DIR__ . "/../classes/dbh.class.php";
require_once __DIR__ . "/../classes/availabilities.class.php";
require_once __DIR__ . "/../classes/availabilities-ctrl.class.php";

final class AvailabilitiesClassTest extends TestCase {
    //preparing two variables to be used as objects for the tests
    private $testAppt;
    private $testAppt2;

    protected function setUp(): void {
        //creating the testAppt object and assigning appropriate values to it's attributes.
        $this->testAppt = new AvailabilitiesCtrl(1, "admin", "2025-09-24 08:30:00");
        //creating the testAppt2 object and assigning null values to it's attributes.
        $this->testAppt2 = new AvailabilitiesCtrl(null, null, null);
    }

    public function testCreateAppt(): void {
        $result = $this->testAppt->createAppt();
        $this->assertEquals(True, $result);
        /*We check to see if the createAppt() method runs and returns "true". In this case it should because the data in the testAppt object is valid and the appointment is available.
        In this case, the test returns a pass.*/
    }

    public function testCreateAppt2(): void {
        $result = $this->testAppt2->createAppt();
        $this->assertEquals(True, $result);
        /*We check to see if the createAppt() method rusn and returns "true'. In this case is returns false because the data in the testAppt object was vull. 
        The emptyInputCheck()  in the createAppt() will has returned a "false"
        As a result of this, the test returns a failure.*/
    }

    public function testEmptyInputCheck() {
        $result = $this->testAppt->emptyInputCheck();
        $this->assertEquals(false, $result);
        //We check to see if emptyInputCheck() is returning false. In this case, the data inside the $testAppt object is valid, so this test will pass.
    }

    public function testEmptyInputCheck2() {
        $result = $this->testAppt2->emptyInputCheck();
        $this->assertEquals(false, $result);
         //We check to see if emptyInputCheck() is returning false. In this case, the data inside the $testAppt2 object is null, so this test will fail.
    }

    public function testApptExists() {
        $result = $this->testAppt->apptExists();
        $this->assertEquals(false, $result);
        //We check to see if the apptExists() returns false. In this case, the requested appointment time in $testAppt object is taken, so this test will fail

    }

    public function testApptExists2() {
        $result = $this->testAppt2->apptExists();
        $this->assertEquals(false, $result);
        //We check to see if the apptExists() returns false. In this case, the requested appointment time in $testAppt2 object is null, so this test will pass as no appointment exists at "null" datetime.
    }

/*the test examples provided here rely on the functions being tested to return true or false values.
 These return values were added to the functions at the time the test were being created. Future functions should be built with testing in mind, so as not to require modifications to become
 testable later on down the line.*/
}
