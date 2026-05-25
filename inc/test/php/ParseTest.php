<?php

use PHPUnit\Framework\TestCase;

final class ParseTest extends TestCase {
    public function testParse(): void {
        $files = glob("{*.php,**/*.php}", GLOB_BRACE);
        $exit = 0;
        foreach ($files as $file) {
            $array = null;
            exec("php -l $file 2>&1", $array, $exit);
            $result = $array[0];
            // Check for failure
            self::assertStringNotContainsStringIgnoringCase("fail", $result);
            self::assertStringNotContainsStringIgnoringCase("errors parsing", $result);
            self::assertStringNotContainsStringIgnoringCase("error:", $result);
            self::assertStringNotContainsStringIgnoringCase("warning:", $result);
            self::assertStringNotContainsStringIgnoringCase("deprecated", $result);
            // Check for success
            self::assertStringContainsString("No syntax errors detected in ", $result);
            self::assertSame($exit, 0);
        }
    }
}
