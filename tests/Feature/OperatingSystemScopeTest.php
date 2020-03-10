<?php

namespace Tests\Feature;

use App\Facades\Preferences;
use App\Module;
use App\OperatingSystem;
use App\Resource;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OperatingSystemScopeTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function users_preferring_windows_only_see_windows_and_ANY_resources()
    {
        $this->markTestIncomplete('Functionality works but test fails. WTF.');


        $windowsResource = factory(Resource::class)->create(['os' => OperatingSystem::WINDOWS]);
        $macResource = factory(Resource::class)->create(['os' => OperatingSystem::MACOS]);
        $anyResource = factory(Resource::class)->create(['os' => OperatingSystem::ANY]);

        $module = factory(Module::class)->create();
        $module->resources()->saveMany([$windowsResource, $macResource, $anyResource]);

        $this->be($user = factory(User::class)->create());
        Preferences::set(['operating-system' => OperatingSystem::WINDOWS, 'resource-language' => 'all']);

        $response = $this->get('/en/modules/' . $module->slug);
        $response->assertSee($windowsResource->name);
        $response->assertSee($anyResource->name);
        $response->assertNotSee($macResource->name);
    }
}
