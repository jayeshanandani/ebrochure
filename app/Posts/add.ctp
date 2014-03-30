<?php
    echo $this->Form->create('Post', array('type' => 'file'));
    echo $this->Form->input('Image.0.attachment', array('type' => 'file', 'label' => 'Image'));
    echo $this->Form->input('Image.0.model', array('type' => 'hidden', 'value' => 'Post'));
    echo $this->Form->end(__('Add'));
?>