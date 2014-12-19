<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 11.12.14
 * Time: 15:15
 */

namespace Ibw\JobeetBundle\Tests\Utils;
use Ibw\JobeetBundle\Utils\Jobeet;

class JobeetTest extends \PHPUnit_Framework_TestCase{
    public function testSlugify()
    {
        $this->assertEquals('sensio', Jobeet::slugify('Sensio'));
        $this->assertEquals('sensio-labs', Jobeet::slugify('sensio labs'));
        $this->assertEquals('sensio-labs', Jobeet::slugify('sensio labs'));
        $this->assertEquals('paris-france', Jobeet::slugify('paris,france'));
        $this->assertEquals('sensio', Jobeet::slugify(' sensio'));
        $this->assertEquals('sensio', Jobeet::slugify('sensio '));
        $this->assertEquals('n-a', Jobeet::slugify(' - '));
        $this->assertEquals('developpeur-web', Jobeet::slugify('Développeur Web'));

        if (function_exists('iconv')) {
            $this->assertEquals('developpeur-web', Jobeet::slugify('Développeur Web'));
        }
    }
} 