<?php

namespace SilverStripe\Blog\Tests\Behat\Context;

use SilverStripe\BehatExtension\Context\FixtureContext as BaseFixtureContext;

class FixtureContext extends BaseFixtureContext
{
    /**
     * Assumes you have the simple themes installed that comes with silverstripe/installer
     * 
     * @Given /^the page template includes the comments form$/
     */
    public function thePageTemplateIncludesTheCommentsForm()
    {
        $path = BASE_PATH . '/themes/simple/templates/Layout/Page.ss';
        $s = file_get_contents($path);
        if (strpos($s, '$CommentsForm') !== false) {
            return;
        }
        $s = str_replace('$Form', '$CommentsForm $Form', $s);
        file_put_contents($path, $s);
    }
}
