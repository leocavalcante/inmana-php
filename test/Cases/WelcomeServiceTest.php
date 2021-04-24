<?php declare(strict_types=1);

namespace HyperfTest\Cases;

use App\Exception\WelcomeException;
use App\Service\WelcomeService;
use PHPUnit\Framework\TestCase;

class WelcomeServiceTest extends TestCase
{
    public function testSpecialWelcome()
    {
        $svc = new WelcomeService();
        $actual = $svc->welcome(['name' => 'banana', 'age' => '42']);

        self::assertSame('You are special', $actual);
    }

    public function testRegularWelcome()
    {
        $svc = new WelcomeService();
        $actual = $svc->welcome(['name' => 'Leo', 'age' => '42']);

        self::assertSame('You are ok', $actual);
    }

    public function testUnderageWelcome()
    {
        $this->expectException(WelcomeException::class);
        $this->expectExceptionMessage('You shall not pass');

        $svc = new WelcomeService();
        $actual = $svc->welcome(['name' => 'Leo', 'age' => '17']);
    }
}