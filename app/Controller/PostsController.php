<?php
class PostsController extends AppController {
    /* the rest of your controller here */
    public function add() {
        if ($this->request->is('post')) {
            try {
                $this->Post->createWithAttachments($this->request->data);
                $this->Session->setFlash(__('The message has been saved'));
            } catch (Exception $e) {
                $this->Session->setFlash($e->getMessage());
            }
        }
    }
}