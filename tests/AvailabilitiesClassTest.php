<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
require_once __DIR__ . "/../classes/dbh.class.php";
require_once __DIR__ . "/../classes/availabilities.class.php";
require_once __DIR__ . "/../classes/availabilities-ctrl.class.php";

final class AvailabilitiesClassTest extends TestCase {

    private $testAppt;
    private $testAppt2;

    protected function setUp(): void {
        $this->testAppt = new AvailabilitiesCtrl(1, "admin", "2025-09-24 08:30:00");

        $this->testAppt2 = new AvailabilitiesCtrl(null, null, null);
    }

    public function testCreateAppt(): void {
        $result = $this->testAppt->createAppt();
        $this->assertEquals(True, $result);
    }

    public function testCreateAppt2(): void {
        $result = $this->testAppt2->createAppt();
        $this->assertEquals(True, $result);
    }

    public function testEmptyInputCheck() {
        $result = $this->testAppt->emptyInputCheck();
        $this->assertEquals(false, $result);
    }

    public function testEmptyInputCheck2() {
        $result = $this->testAppt2->emptyInputCheck();
        $this->assertEquals(false, $result);

    }

    public function testApptExists() {
        $result = $this->testAppt->apptExists();
        $this->assertEquals(false, $result);

    }

    public function testApptExists2() {
        $result = $this->testAppt2->apptExists();
        $this->assertEquals(false, $result);

    }


}
