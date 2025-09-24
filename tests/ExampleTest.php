<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class ExampleTest extends TestCase {
    public function testTwoValuesAreTheSame(): void {

        $this->assertSame(1, 1);

    }
}

/*When running tests, composer and phpunit were installed into the www docker container itself.
As a result of this, the cmd line commands must always start with: docker compose exec www vendor/bin/phpunit tests/(name of the test file to run).
Otherwise phpunit itself and any relevant files to the testing process cannot be found.*/