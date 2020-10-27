<?php

namespace App\Modele;

use \DateTime;

abstract class NewsBase {
    protected $_id;
    protected $_author;
    protected $_title;
    protected $_content;
    protected $_dateAdd;
    protected $_dateEdit;

    public function getId()
    {
        return $this->_id;
    }

    public function getAuthor()
    {
        return $this->_author;
    }

    public function getTitle()
    {
        return $this->_title;
    }

    public function getContent()
    {
        return strip_tags($this->_content);
    }

    public function getDateAdd()
    {
        return $this->_dateAdd;
    }

    public function getDateEdit()
    {
        return $this->_dateEdit;
    }

    protected function setId($id)
    {
        if (is_int($id)) {
            $this->_id = $id;
        }
    }
    protected function setAuthor($author)
    {
        if (is_string($author)) {
            $this->_author = $author;
        }
    }

    protected function setTitle($title)
    {
        if (is_string($title)) {
            $this->_title = $title;
        }
    }

    protected function setContent($content)
    {
        if (is_string($content)) {
            $this->_content = $content;
        }
    }

    public function setDateAdd()
    {
        if (!$this->_dateAdd) {
            $date = new DateTime;
            $this->_dateAdd = $date->format('d/m/Y');
        }
    }

    protected function setDateEdit()
    {
        if ($this->_dateEdit) {
            $date = new DateTime;
            $this->_dateEdit = $date->format('d/m/Y');
        }
    }
}