<?php
// vim: ft=php

use Livewire\Volt\Component;

$f = new class extends Component
{
    public int $count = 0;

    public function increment()
    {
        $this->count++;
    }
}
?>

<div class="post" x-data="{ count: 0 }">
    <div>
        <h1>Server: {{ $count }}</h1>
        <h1>Client: <span x-text="count"></span></h1>
        <button wire:click="increment">Click me (server side)</button>
        <button @click="count++">Click me (Alpine)</button>
    </div>
</div>
