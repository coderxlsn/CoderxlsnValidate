<?php
/**
 * Created by PhpStorm.
 * User: artur
 * Date: 05.05.16
 * Time: 21:47
 */

namespace CoderxlsnValidate\DoctrineValidateBundle\Doctrine\Validate;

use Doctrine\ORM\Event\PreUpdateEventArgs;

/**
 * Class IframeValidate
 * @package CoderxlsnValidate\DoctrineValidateBundle\Doctrine\Validate
 */
class IframeValidate {
    public function preUpdate(PreUpdateEventArgs $eventArgs){

        $event = get_class($eventArgs->getEntity());
        
        if ($eventArgs->hasChangedField('post')) {
        //        $this->validateCreditCard($eventArgs->getNewValue('creditCard'));

        }elseif ($eventArgs->hasChangedField('content')){

        }elseif ($eventArgs->hasChangedField('html')){

        }

    }
    private function validateIframe(){

    }
}