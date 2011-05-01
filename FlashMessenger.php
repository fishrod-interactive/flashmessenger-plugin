<?php

/**
 * The FlashMessenger plugin will allow you to easily set up flash messaging within your application
 * @author gavinwilliams <gavin@fishrod.co.uk>
 * @copyright 2011 Fishrod Interactive
 */
class Application_Plugin_FlashMessenger extends Zend_Controller_Plugin_Abstract
{
    
    /**
     * FlashMessenger property
     * @var Zend_Controller_Action_Helper_FlashMessenger
     */
    private $_flashMessenger;
    
    /**
     * Will initialise the flash messenger as an action helper if it hasn't already
     * (non-PHPdoc)
     * @see Zend_Controller_Plugin_Abstract::dispatchLoopStartup()
     */
    public function dispatchLoopStartup(Zend_Controller_Request_Abstract $request){
        
        if(Zend_Controller_Action_HelperBroker::hasHelper('FlashMessenger')){
           $this->_flashMessenger = Zend_Controller_Action_HelperBroker::getExistingHelper('FlashMessenger');
        } else {
            $this->_flashMessenger = new Zend_Controller_Action_Helper_FlashMessenger();
            Zend_Controller_Action_HelperBroker::addHelper($this->_flashMessenger);   
        }
        
    }
    
    /**
     * Will merge all current and session based flash messages
     * and assign it to a view variable called flashMessage
     * 
     * (non-PHPdoc)
     * @see Zend_Controller_Plugin_Abstract::postDispatch()
     */
    public function postDispatch($request){
        $messages = array_merge($this->_flashMessenger->getCurrentMessages(), $this->_flashMessenger->getMessages());
        Zend_Layout::getMvcInstance()->getView()->assign('flashMessages', $messages);
    }
    
}