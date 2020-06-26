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
        $commonAttributes = [
            'type' => Resource::VIDEO_TYPE,
            'is_free' => true,
            'is_bonus' => false,
            'language' => 'en',
        ];
        $windowsResource = factory(Resource::class)->create(array_merge(['os' => OperatingSystem::WINDOWS], $commonAttributes));
        $macResource = factory(Resource::class)->create(array_merge(['os' => OperatingSystem::MACOS], $commonAttributes));
        $anyResource = factory(Resource::class)->create(array_merge(['os' => OperatingSystem::ANY], $commonAttributes));

        $module = factory(Module::class)->create();
        $module->resources()->saveMany([$windowsResource, $macResource, $anyResource]);

        $this->be($user = factory(User::class)->create());
        Preferences::set(['operating-system' => OperatingSystem::WINDOWS, 'resource-language' => 'all']);
        $response = $this->get('/en/modules/' . $module->slug . '/free-resources');
        $response->assertSee($windowsResource->name);
        $response->assertSee($anyResource->name);
        $response->assertDontSee($macResource->name);
    }
}
