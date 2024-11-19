<?php

namespace Rtl\Timepicker\Tests;

use Rtl\Timepicker\ServiceProvider;
use Statamic\Testing\AddonTestCase;

abstract class TestCase extends AddonTestCase
{
    protected string $addonServiceProvider = ServiceProvider::class;
}
