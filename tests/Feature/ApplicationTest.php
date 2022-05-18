<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Http;

class ApplicationTest extends TestCase {

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example() {
        echo "  Testing application";
        $response = Http::get("http://api.ipstack.com/189.120.74.154?access_key=7c9ae79e2c89cadb4da05a018d5e0f8a");
        $data = $response->body();
        $this->assertEquals('04268-020', json_decode($data)->zip);
    }

}
