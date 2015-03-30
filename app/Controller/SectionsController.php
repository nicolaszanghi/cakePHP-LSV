<?php
App::uses('AppController', 'Controller');
/**
 * Sections Controller
 *
 * @property Section $Section
 */
class SectionsController extends AppController {

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!empty($this->request->params->slug))
            $id = $this->getIdFromSlug('Section', $this->request->params->slug);
        if (!$this->Section->exists($id)) {
            throw new NotFoundException(__('Invalid section'));
        }

        $this->getSectionAndChildSection($id); // get section and child_section

    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $options = array('limit' => 100000, 'order' => 'Section.order, Section.id');

        if (!empty($this->request->data['Section']['search_string'])) {
            $search_string = $this->request->data['Section']['search_string'];
            $options['conditions'] = array('OR' => array('Section.title_eng LIKE' => "%$search_string%", 'Section.title_fra LIKE' => "%$search_string%", 'Section.body_eng LIKE' => "%$search_string%", 'Section.body_fra LIKE' => "%$search_string%", 'Section.slug_eng LIKE' => "%$search_string%", 'Section.slug_fra LIKE' => "%$search_string%"));
        }

        $this->Section->recursive = 0;
        $this->paginate = $options;
        $this->set('sections', $this->paginate());
    }

    /**
     * reorder content
     */
    public function admin_reorder() {
        foreach ($this->request->data['Section'] as $key => $value) {
            $this->Section->id = $value;
            $this->Section->saveField("order", $key+1);
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
        if (!$this->Section->exists($id)) {
            throw new NotFoundException(__('Invalid section'));
        }
        $options = array('conditions' => array('Section.' . $this->Section->primaryKey => $id));
        $this->set('section', $this->Section->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add($parent_id = null) {
        if ($this->request->is('post')) {
            $this->Section->create();
            if ($this->Section->save($this->request->data)) {
                $this->request->data['Section']['id'] = $this->Section->id;
                $this->Section->saveSlug($this->request->data, 'title');
                $this->Session->setFlash(__('The section has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The section could not be saved. Please, try again.'), 'flash/error');
            }
        }
        $parents = $this->Section->find('list', array('conditions' => array('Section.parent_id' => null)));
        if (empty($this->request->data['Section']['parent_id']) && !empty($parent_id))
            $this->request->data['Section']['parent_id'] = $parent_id;

        $this->set(compact('parents'));
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        if (!$this->Section->exists($id)) {
            throw new NotFoundException(__('Invalid section'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Section->save($this->request->data)) {
                $this->Section->saveSlug($this->request->data, 'title');
                $this->Session->setFlash(__('The section has been saved'), 'flash/success');
                //$this->redirect(array('action' => 'edit', $id));
            } else {
                $this->Session->setFlash(__('The section could not be saved. Please, try again.'), 'flash/error');
            }
        } else {
            $options = array('conditions' => array('Section.' . $this->Section->primaryKey => $id));
            $this->request->data = $this->Section->find('first', $options);
        }
        $parents = $this->Section->find('list', array('conditions' => array('Section.parent_id' => null)));
        $this->set(compact('parents'));
    }

    /**
     * admin_delete method
     *
     * @throws NotFoundException
     * @throws MethodNotAllowedException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        if (in_array($id, unserialize(SPECIAL_SECTIONS))) {
            $this->Session->setFlash(__('You cannot delete this section'), 'flash/error');
            $this->redirect(array('action' => 'index'));
        }
        $this->Section->id = $id;
        if (!$this->Section->exists()) {
            throw new NotFoundException(__('Invalid section'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Section->delete()) {
            $this->Session->setFlash(__('Section deleted'), 'flash/success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Section was not deleted'), 'flash/error');
        $this->redirect(array('action' => 'index'));
    }
}
