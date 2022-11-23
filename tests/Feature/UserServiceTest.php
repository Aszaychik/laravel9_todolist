<?php

namespace Tests\Feature;

use App\Services\UserService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserServiceTest extends TestCase
{
    private UserService $userService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->userService = $this->app->make(UserService::class);
    }

    public function testSample()
    {
        self::assertTrue(true);
    }

    public function testLoginSuccess()
    {
        self::assertTrue($this->userService->login("asz", 111001));
    }

    public function testLoginFailed()
    {
        self::assertFalse($this->userService->login("aszaychik", "aszaychik"));
    }

    public function testLoginWrong()
    {
        self::assertFalse($this->userService->login("asz", "aszaychik"));
    }
}
