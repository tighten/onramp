<?php

namespace Tests\Feature;

use App\Facades\Preferences;
use App\Models\Module;
use App\Models\Resource;
use App\Models\User;
use App\OperatingSystem;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OperatingSystemScopeTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function users_preferring_windows_only_see_windows_and_an_y_resources(): void
    {
        $commonAttributes = [
            'type' => Resource::VIDEO_TYPE,
            'is_free' => true,
            'is_bonus' => false,
            'language' => 'en',
        ];
        $windowsResource = Resource::factory()->create(array_merge(['os' => OperatingSystem::WINDOWS], $commonAttributes));
        $macResource = Resource::factory()->create(array_merge(['os' => OperatingSystem::MACOS], $commonAttributes));
        $anyResource = Resource::factory()->create(array_merge(['os' => OperatingSystem::ANY], $commonAttributes));

        $module = Module::factory()->create();
        $module->resources()->saveMany([$windowsResource, $macResource, $anyResource]);

        $this->be($user = User::factory()->create());
        Preferences::set(['operating-system' => OperatingSystem::WINDOWS, 'resource-language' => 'all']);
        $response = $this->get('/en/modules/' . $module->slug . '/free-resources');
        $response->assertSee($windowsResource->name);
        $response->assertSee($anyResource->name);
        $response->assertDontSee($macResource->name);
    }
}
