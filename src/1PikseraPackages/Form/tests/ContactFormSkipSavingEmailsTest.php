<?php

namespace PikseraPackages\Form\tests;

use PikseraPackages\Core\tests\TestCase;

class ContactFormSkipSavingEmailsTest extends TestCase
{

    public function testQuickEmail()
    {
        $params = array();
        $params['for_id'] = '1234-skip-saving';
        $params['for'] = 'test-skip-saving';

        $params['message'] = 'HELLO CONTACT FORM GLBOAL! THIS IS MY GLOBAL MESSAGE';
        $params['email'] = 'unit.b.slaveykov@unittest-global.com';
        $params['Company'] = 'CloudVisionLtd-Global';
        $params['Phone'] = '0885451012-Global';
        $params['Your Name'] = 'Bozhidar Veselinov Slaveykov';
        $params['module_name'] = 'contact_form_global_settings';

        // Disable captcha
        save_option(array(
            'option_group' => $params['for_id'],
            'option_key' => 'disable_captcha',
            'option_value' => 'y'
        ));

        $formResponse = mw()->forms_manager->post($params);
        $this->assertArrayHasKey('success', $formResponse);

        $params = array();
        $params['id'] = $formResponse['id'];
        $response = mw()->forms_manager->get_entires($params);

        $this->assertEquals($response[0]['id'], $formResponse['id']);

    }

    public function testSkipSavingEmails()
    {
        $params = array();
        $params['for_id'] = '1234567-skip-saving';
        $params['for'] = '1234567-test-skip-saving';

        $params['message'] = 'HELLO CONTACT FORM GLBOAL! THIS IS MY GLOBAL MESSAGE';
        $params['email'] = 'unit.b.slaveykov@unittest-global.com';
        $params['Company'] = 'CloudVisionLtd-Global';
        $params['Phone'] = '0885451012-Global';
        $params['Your Name'] = 'Bozhidar Veselinov Slaveykov';
        $params['module_name'] = 'contact_form_global_settings';

        // Disable captcha
        save_option(array(
            'option_group' => $params['for_id'],
            'option_key' => 'disable_captcha',
            'option_value' => 'y'
        ));

        save_option(array(
            'option_group' => $params['for_id'],
            'option_key' => 'skip_saving_emails',
            'option_value' => 'y'
        ));

        $formResponse = mw()->forms_manager->post($params);
        $this->assertArrayHasKey('success', $formResponse);

        $params = array();
        $params['id'] = $formResponse['id'];
        $response = mw()->forms_manager->get_entires($params);

        $this->assertFalse($response);

    }


}
