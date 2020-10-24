<?php
class ControllerExtensionModuleHTML2 extends Controller {
	public function index($setting) {
		if (isset($setting['module_description'][$this->config->get('config_language_id')])) {
			$data['heading_title'] = html_entity_decode($setting['module_description'][$this->config->get('config_language_id')]['title'], ENT_QUOTES, 'UTF-8');
			$data['html'] = html_entity_decode($setting['module_description'][$this->config->get('config_language_id')]['description'], ENT_QUOTES, 'UTF-8');

			$data['link'] = html_entity_decode($setting['module_description'][$this->config->get('config_language_id')]['link'], ENT_QUOTES, 'UTF-8');

			//$data['beforename'] = html_entity_decode($setting['module_description'][$this->config->get('config_language_id')]['beforename'], ENT_QUOTES, 'UTF-8');

			//$data['afterlink'] = html_entity_decode($setting['module_description'][$this->config->get('config_language_id')]['afterlink'], ENT_QUOTES, 'UTF-8');

			return $this->load->view('extension/module/html2', $data);
		}
	}
}