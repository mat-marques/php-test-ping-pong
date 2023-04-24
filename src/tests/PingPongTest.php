<?php

namespace Tests;
require_once __DIR__ . '/../app/PingPong.php';

use PHPUnit\Framework\TestCase;
use function App\saque;

final class PingPongTest extends TestCase
{
    public function test_first_set_alternate_serves(): void
    {
        $this->assertSame(saque("0:0"), 'jogador a');
        $this->assertSame(saque("1:1"), 'jogador a');
        $this->assertSame(saque("2:2"), 'jogador a');
        $this->assertSame(saque("3:0"), 'jogador a');
        $this->assertSame(saque("4:0"), 'jogador a');
        $this->assertSame(saque("1:3"), 'jogador a');
        $this->assertSame(saque("0:4"), 'jogador a');
    }

    public function test_second_set_alternate_serves(): void
    {
        $this->assertSame(saque("3:2"), 'jogador b');
        $this->assertSame(saque("4:4"), 'jogador b');
        $this->assertSame(saque("3:4"), 'jogador b');
        $this->assertSame(saque("2:5"), 'jogador b');
        $this->assertSame(saque("0:6"), 'jogador b');
    }

    public function test_alternate_serves(): void
    {
        $this->assertSame(saque("0:0"), 'jogador a');
        $this->assertSame(saque("5:0"), 'jogador b');
        $this->assertSame(saque("2:8"), 'jogador a');
        $this->assertSame(saque("1:14"), 'jogador b');
        $this->assertSame(saque("5:15"), 'jogador a');
    }

    public function test_equal_points(): void
    {
        $this->assertSame(saque("0:0"), 'jogador a');
        $this->assertSame(saque("5:5"), 'jogador a');
        $this->assertSame(saque("10:10"), 'jogador a');
        $this->assertSame(saque("15:15"), 'jogador a');
        $this->assertSame(saque("20:20"), 'jogador a');
    }

    public function test_tied_match(): void
    {
        $this->assertSame(saque("20:20"), 'jogador a');
        $this->assertSame(saque("20:21"), 'jogador a');
        $this->assertSame(saque("21:22"), 'jogador b');
        $this->assertSame(saque("22:22"), 'jogador a');
        $this->assertSame(saque("20:23"), 'jogador a');
    }
}
