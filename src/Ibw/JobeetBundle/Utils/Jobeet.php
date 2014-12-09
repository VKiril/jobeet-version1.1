<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 09.12.14
 * Time: 15:56
 */

namespace Ibw\JobeetBundle\Utils;


class Jobeet {
    static public function slugify($text){
        //replace all non letters or digits by -
        $text = preg_replace('/\W+/','-',$text);
        //trim and lowercase
        $text = strtolower(trim($text,'-'));
        return $text;
    }
} 