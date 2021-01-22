<?php
/**
*
* Copyright © 2016 Magento. All rights reserved.
*/
namespace Mbf\Pincodenurams\Controller\Post;

use Magento\Framework\App\Action\Context;
use Magento\Framework\App\RequestInterface;
use \Magento\Framework\Mail\Template\TransportBuilder;
use \Magento\Framework\Translate\Inline\StateInterface;
use Psr\Log\LoggerInterface;

class Index extends \Magento\Framework\App\Action\Action{
/**
* Post user question
*
* @return void
* @throws \Exception
*/

    const XML_PATH_EMAIL_ADMIN_QUOTE_SENDER = 'info@ovjjewels.com';
    const XML_PATH_EMAIL_ADMIN_QUOTE_NOTIFICATION = 'email/email.html';
    const XML_PATH_EMAIL_ADMIN_NAME = 'Ovj Jewels';
    const XML_PATH_EMAIL_ADMIN_EMAIL = 'info@ovjjewels.com';

    protected $inlineTranslation;
    protected $transportBuilder;
    protected $_logLoggerInterface;
    protected $scopeConfig;

    public function __construct(
    Context $context,
    StateInterface $inlineTranslation,
    TransportBuilder $transportBuilder,
    LoggerInterface $logLoggerInterface,
    \Mbf\CustomAttribute\Helper\Data $helperData,
    array $data = [])
    {
        $this->inlineTranslation = $inlineTranslation;
        $this->transportBuilder = $transportBuilder;
        $this->_logLoggerInterface = $logLoggerInterface;
        $this->_helperData = $helperData;
        parent::__construct($context,$data);
    }

	public function execute(){
		$post = $this->getRequest()->getPostValue();
		if (!$post) {
			$this->_redirect('http://ec2-54-255-156-71.ap-southeast-1.compute.amazonaws.com/contact-us');
			return;
		}
		//try {
			$postObject = new \Magento\Framework\DataObject();
			$postObject->setData($post);

			$error = false;

			if (!\Zend_Validate::is(trim($post['contact_name']), 'NotEmpty')) {
				$error = true;
			}
			if ($error) {
			throw new \Exception();
			}

			$cname = $post['contact_name'];
			$cemail = $post['contact_email'];
			$cmobile = $post['contact_phone'];
			$csubject = $post['contact_subject'];
			$cmessage = $post['contact_message'];
			$date = date('Y-m-d h:i:s');
			$model = $this->_objectManager->create('Mbf\Featuredproducts\Model\Featuredproduct');

			$model->setName($cname);
			$model->setEmail($cemail);
			$model->setPhonenumber($cmobile);
			$model->setSubject($csubject);
			$model->setDescription($cmessage);
			$model->setCreatedAt($date);
			$model->save();
			$toEmail = $this->_helperData->getConfig('trans_email/ident_support/email');

			$sender = [
			 'name' => $cname,
			 'email' => $cemail,
			 ];


            $this->inlineTranslation->suspend();
            $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
            $transport = $this->transportBuilder
               ->setTemplateIdentifier('mymodule_email_template')
               ->setTemplateOptions(
                    [
                        'area' => \Magento\Framework\App\Area::AREA_FRONTEND,
                        'store' => \Magento\Store\Model\Store::DEFAULT_STORE_ID,
                    ]
                )
               ->setTemplateVars(['data' => $postObject])
               ->setFrom($sender)
               ->addTo($toEmail)
               ->getTransport();
            $transport->sendMessage();
            $this->inlineTranslation->resume();
			$this->_redirect('http://ec2-54-255-156-71.ap-southeast-1.compute.amazonaws.com/thank-you');
			return;
		/* } catch (\Exception $e) {			
			$this->messageManager->addError(
			__('We can\’t process your request right now. Sorry, that\’s all we know.')
		);
			
			$this->_redirect('http://ec2-54-255-156-71.ap-southeast-1.compute.amazonaws.com/contact-us');
			return;
		} */
	}
}
