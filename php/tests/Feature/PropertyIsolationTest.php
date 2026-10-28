<?php

use App\Models\Property;

it('показывает объекты только текущего тенанта', function () {
    $a = makeTenant('a');
    $b = makeTenant('b');

    bindTenant($a);
    Property::create(['title' => 'Квартира A', 'price' => 100]);
    bindTenant($b);
    Property::create(['title' => 'Квартира B', 'price' => 200]);
    unbindTenant();

    $this->getJson('/api/properties', ['X-Tenant' => 'a'])
        ->assertOk()
        ->assertJsonCount(1)
        ->assertJsonPath('0.title', 'Квартира A');
});

it('не отдаёт чужой объект по id', function () {
    makeTenant('a');
    $b = makeTenant('b');

    bindTenant($b);
    $foreign = Property::create(['title' => 'Квартира B', 'price' => 200]);
    unbindTenant();

    $this->getJson("/api/properties/{$foreign->id}", ['X-Tenant' => 'a'])->assertNotFound();
});

it('отвечает 404 на неизвестный тенант', function () {
    $this->getJson('/api/properties', ['X-Tenant' => 'nope'])->assertNotFound();
});
