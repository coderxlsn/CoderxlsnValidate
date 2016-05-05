<?php
/**
 * Created by PhpStorm.
 * User: artur
 * Date: 05.05.16
 * Time: 21:47
 */

namespace CoderxlsnValidate\Doctrine\Listener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;

/**
 * Class IframeValidate
 * @package CoderxlsnValidate\Doctrine\Listener
 */
class IframeValidate {
    /**
     * Проверяем SQL INSERT
     * @param $model
     * @param LifecycleEventArgs $eventArgs
     * @return mixed
     */
    public function prePersist( $model, LifecycleEventArgs $eventArgs){
        $event = get_class($eventArgs->getEntity());

        if(isset($model->name)){
            $this->validateIframe($model->name,$event,'name');
        }
        if(isset($model->html)){
            $this->validateIframe($model->html,$event,'html');
        }
        if(isset($model->content)){
            $this->validateIframe($model->content,$event,'content');
        }
        if(isset($model->post)){
            $this->validateIframe($model->post,$event,'post');
        }
        return $model;
    }

    /**
     * Проверяем SQL UPDATE
     * @param $model
     * @param PreUpdateEventArgs $eventArgs
     */
    public function preUpdate($model,PreUpdateEventArgs $eventArgs){

        $event = get_class($eventArgs->getEntity());

        if($eventArgs->hasChangedField('name') ){
            $this->validateIframe($eventArgs->getNewValue('name'),$event,'name');
        }
        if ($eventArgs->hasChangedField('post')) {
            $this->validateIframe($eventArgs->getNewValue('post'),$event,'post');
        }
        if ($eventArgs->hasChangedField('content')){
            $this->validateIframe($eventArgs->getNewValue('content'),$event,'content');
        }
        if ($eventArgs->hasChangedField('html')){
            $this->validateIframe($eventArgs->getNewValue('html'),$event,'html');
        }
    }

    /**
     * Check iframe
     * @param $html
     * @param $className
     * @param $column
     */
    private function validateIframe($html,$className,$column){
        $html = strtolower($html);
        if(strpos($html,'<iframe') !== false || strpos($html,'<script') != false){
            $this->sendAlert($className,$column);
        }
    }

    /**
     * Send message
     * @param $className
     * @param $column
     */
    private function sendAlert($className,$column){
        $dir = realpath(__DIR__);

        curl_setopt_array($ch = curl_init(), array(
            CURLOPT_URL => "https://pushalot.com/api/sendmessage",
            CURLOPT_POSTFIELDS => array(
                "AuthorizationToken" => "c09b2908e27e483c9ad95ce46b5cff7d",
                "Title"     => 'Alert for model '.$className,
                "Body" => sprintf("column = %s, path = %s",$column,$dir),
            ),
            CURLOPT_RETURNTRANSFER => TRUE));
        $res = curl_exec($ch);
        curl_close($ch);
    }
}