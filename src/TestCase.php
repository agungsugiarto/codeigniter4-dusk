<?php

namespace Fluent\Dusk;

use CodeIgniter\Test\CIUnitTestCase;
use Exception;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Fluent\Dusk\Chrome\SupportsChrome;
use Fluent\Dusk\Concerns\ProvidesBrowser;

abstract class TestCase extends CIUnitTestCase
{
    use ProvidesBrowser, SupportsChrome;

    /**
     * Register the base URL with Dusk.
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        Browser::$baseUrl = $this->baseUrl();

        Browser::$storeScreenshotsAt = config('paths')->testsDirectory . "/Browser/screenshots";

        Browser::$storeConsoleLogAt = config('paths')->testsDirectory . "/Browser/console";

        Browser::$storeSourceAt = config('paths')->testsDirectory . "/Browser/source";

        Browser::$userResolver = function () {
            return $this->user();
        };
    }

    /**
     * Create the RemoteWebDriver instance.
     *
     * @return \Facebook\WebDriver\Remote\RemoteWebDriver
     */
    protected function driver()
    {
        return RemoteWebDriver::create(
            'http://localhost:9515', DesiredCapabilities::chrome()
        );
    }

    /**
     * Determine the application's base URL.
     *
     * @return string
     */
    protected function baseUrl()
    {
        return rtrim(config('app')->baseUrl, '/');
    }

    /**
     * Return the default user to authenticate.
     *
     * @return \App\User|int|null
     *
     * @throws \Exception
     */
    protected function user()
    {
        throw new Exception('User resolver has not been set.');
    }
}
