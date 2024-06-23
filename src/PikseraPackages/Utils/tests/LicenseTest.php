<?php

namespace PikseraPackages\Utils\tests;

use PikseraPackages\Utils\tests\mockery\UpdateManagerMockery;
use PikseraPackages\Core\tests\TestCase;
use PikseraPackages\Utils\Misc\License;

class LicenseTest extends TestCase
{

    public function testLicenseClass()
    {
        app()->singleton('update', function () {
            return new UpdateManagerMockery();
        });

        $randomLicenseUniqueId = uniqid();
        app()->update->setActiveLicenses([$randomLicenseUniqueId]);

        $license = new License();

        // Delete old licenses
        $license->truncate();

        // Validate right license
        $validateLicense = $license->validateLicense($randomLicenseUniqueId, 'bloggy');
        $this->assertTrue($validateLicense);

        // Validate fake license
        $validateLicense = $license->validateLicense(uniqid(), 'bloggy');
        $this->assertFalse($validateLicense);


        // Save invalid license
        $license->saveLicense('example-generated-license');
        $getLicenses = $license->getLicenses();
        $this->assertEmpty($getLicenses);


        // Save valid license
        $license->saveLicense($randomLicenseUniqueId);
        $getLicenses = $license->getLicenses();
        $this->assertNotEmpty($getLicenses);

        $this->assertEquals($getLicenses['modules/white_label']['rel_type'], 'modules/white_label');
        $this->assertEquals($getLicenses['modules/white_label']['local_key'], $randomLicenseUniqueId);

    }

}
