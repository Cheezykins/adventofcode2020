<?php


namespace Cheezykins\AdventOfCode2020\Test;


use Cheezykins\AdventOfCode2020\Day2\PasswordDatabase;
use Cheezykins\AdventOfCode2020\Day2\PasswordDatabaseEntry;
use Cheezykins\AdventOfCode2020\Day2\Rules\SledRentalPasswordRule;
use Cheezykins\AdventOfCode2020\Day2\Rules\TobogganPasswordRule;
use Exception;

class Day2Test extends TestCase
{

    public function testPasswordDatabasesValidate()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Invalid Database Entry: bob');

        $fixtures = [
            '1-3 b: dave',
            'bob'
        ];

        PasswordDatabase::loadFromString(implode("\n", $fixtures), SledRentalPasswordRule::class);
    }

    public function testPasswordRulesValidate()
    {
        $rule = new PasswordDatabaseEntry('1-3 f: flibble', SledRentalPasswordRule::class);
        $this->assertTrue($rule->isValid());

        $rule = new PasswordDatabaseEntry('1-3 f: dave', SledRentalPasswordRule::class);
        $this->assertFalse($rule->isValid());
    }


    public function testExamplesPart1()
    {
        $databaseFile = $this->loadFixture(__DIR__ . '/fixtures/Day2/example.txt');
        $database = PasswordDatabase::loadFromString($databaseFile, SledRentalPasswordRule::class);

        $this->assertEquals(2, $database->countValidEntries());
    }

    public function testSolutionPart1()
    {
        $databaseFile = $this->loadFixture(__DIR__ . '/fixtures/Day2/input.txt');
        $database = PasswordDatabase::loadFromString($databaseFile, SledRentalPasswordRule::class);

        $this->assertEquals(622, $database->countValidEntries());
    }

    public function testExamplesPart2()
    {
        $databaseFile = $this->loadFixture(__DIR__ . '/fixtures/Day2/example.txt');
        $database = PasswordDatabase::loadFromString($databaseFile, TobogganPasswordRule::class);

        $this->assertEquals(1, $database->countValidEntries());
    }

    public function testSolutionPart2()
    {
        $databaseFile = $this->loadFixture(__DIR__ . '/fixtures/Day2/input.txt');
        $database = PasswordDatabase::loadFromString($databaseFile, TobogganPasswordRule::class);

        $this->assertEquals(263, $database->countValidEntries());
    }

}
