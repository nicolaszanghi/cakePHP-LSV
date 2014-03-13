<?php
App::uses('AppController', 'Controller');
/**
 * Contents Controller
 *
 * @property Content $Content
 */
class ContentsController extends AppController {

    public function beforeFilter() {
        $this->Auth->allow('index', 'view', 'search');
        parent::beforeFilter();
    }

    /**
     * index method
     *
     * @return void
     */
    public function search($search_string = null) {


        $this->paginate = array('Content' => array(
                                    'conditions' => array(
                                        'Content.active' => true,
                                        'OR' => array(
                                            'Content.title_'.Configure::read('Config.language').' LIKE' => "%$search_string%",
                                            'Content.body_'.Configure::read('Config.language').' LIKE' => "%$search_string%"
                                        )
                                    )
                                )
        );

        $this->Content->recursive = 0;
        $this->set('results', $this->paginate());
    }

/**
 * index method
 *
 * @return void
 */
	public function index($section_id = null) {

        $this->layout = null;

        $this->getManualPaginationContents($section_id);

	}


    /**
     * reorder content
     */
    public function admin_reorder() {
        foreach ($this->request->data['Content'] as $key => $value) {
            $this->Content->id = $value;
            $this->Content->saveField("order", $key+1);
        }
        //$this->log(print_r($this->request->data,true));
        exit();
    }

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Content->exists($id)) {
			throw new NotFoundException(__('Invalid content'));
		}
		$options = array('conditions' => array('Content.' . $this->Content->primaryKey => $id));
		$this->set('content', $this->Content->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add($redirect_controller = null, $redirect_id = null, $redirect_name = null) {
		if ($this->request->is('post')) {
			$this->Content->create();
			if ($this->Content->save($this->request->data)) {
				$this->Session->setFlash(__('The content has been saved'), 'flash/success');
				$this->redirect(array('controller' => $redirect_controller, 'action' => 'view', $redirect_id));
			} else {
				$this->Session->setFlash(__('The content could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
            $field_id = array('sections' => 'section_id', 'laureates' => 'laureate_id', 'juries' => 'jury_id');
            $this->request->data['Content'][$field_id[$redirect_controller]] = $redirect_id;
        }

        $this->set(compact('redirect_controller', 'redirect_id', 'redirect_name'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null, $redirect_controller = null, $redirect_id = null, $redirect_name = null) {
		if (!$this->Content->exists($id)) {
			throw new NotFoundException(__('Invalid content'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Content->save($this->request->data)) {
				$this->Session->setFlash(__('The content has been saved'), 'flash/success');
                /*
                if (!empty($redirect_controller))
                    if (!empty($redirect_id))
                        $this->redirect(array('controller' => $redirect_controller, 'action' => 'view', $redirect_id));
                    else
                        $this->redirect(array('controller' => $redirect_controller, 'action' => 'index'));
                else
                    $this->redirect(array('controller' => 'sections', 'action' => 'index'));
                */
			} else {
				$this->Session->setFlash(__('The content could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Content.' . $this->Content->primaryKey => $id));
			$this->request->data = $this->Content->find('first', $options);
		}
        $this->set(compact('redirect_controller', 'redirect_id', 'redirect_name'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null, $redirect_controller = null, $redirect_id = null) {
		$this->Content->id = $id;
		if (!$this->Content->exists()) {
			throw new NotFoundException(__('Invalid content'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Content->delete()) {
			$this->Session->setFlash(__('Content deleted'), 'flash/success');
		} else {
            $this->Session->setFlash(__('Content was not deleted'), 'flash/error');
        }

        if (!empty($redirect_controller))
            if (!empty($redirect_id))
                $this->redirect(array('controller' => $redirect_controller, 'action' => 'view', $redirect_id));
            else
                $this->redirect(array('controller' => $redirect_controller, 'action' => 'index'));
        else
            $this->redirect(array('controller' => 'sections', 'action' => 'index'));
	}
}
