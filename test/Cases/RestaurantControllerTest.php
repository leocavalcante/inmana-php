<?php declare(strict_types=1);

namespace HyperfTest\Cases;

use App\Model\Restaurant;

class RestaurantControllerTest extends \HyperfTest\HttpTestCase
{
    private array $stub;
    private array $wrongEmailStub;
    private array $wrongNameStub;

    protected function setUp(): void
    {
        $this->stub = [
            'name' => 'Restaurant',
            'email' => 'restaurant@email.tld',
        ];

        $this->wrongEmailStub = [
            'name' => 'Restaurant',
            'email' => 'invalid',
        ];

        $this->wrongNameStub = [
            'name' => 'Re',
            'email' => 'restaurant@email.tld',
        ];
    }

    public function testCreate()
    {
        $actual = $this->client->post('/api/restaurants', $this->stub);
        self::assertSame($this->stub['name'], $actual['name']);
        self::assertSame($this->stub['email'], $actual['email']);
    }

    public function testUniqueEmail()
    {
        $this->client->post('/api/restaurants', $this->stub);
        $actual = $this->client->post('/api/restaurants', $this->stub);
        self::assertSame([
            'error' => true,
            'message' => 'The email has already been taken.',
        ], $actual);
    }

    public function testInvalidEmail()
    {
        $actual = $this->client->post('/api/restaurants', $this->wrongEmailStub);
        self::assertSame([
            'error' => true,
            'message' => 'The email must be a valid email address.',
        ], $actual);
    }

    public function testInvalidName()
    {
        $actual = $this->client->post('/api/restaurants', $this->wrongNameStub);
        self::assertSame([
            'error' => true,
            'message' => 'The name must be at least 3 characters.',
        ], $actual);
    }

    protected function tearDown(): void
    {
        Restaurant::where($this->stub)->delete();
    }
}