<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    public function testLoginPage(){
        $this->get("/login")->assertSeeText("Login");
    }

    public function testLoginSuccess()
    {
        $this->post("/login", [
            "user" => "asz",
            "password" => 111001
        ])->assertRedirect("/")
            ->assertSessionHas("user", "asz");
    }

    public function testLoginError()
    {
        $this->post("/login", [])
            ->assertSeeText("User or Password is Required");
    }

    public function testLoginInvalid()
    {
        $this->post("/login", [
            "user" => "invalid",
            "password" => "invalid"
        ])->assertSeeText("User or Password is Invalid");
    }
}
