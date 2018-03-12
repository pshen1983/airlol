<?php
abstract class CmsItemGenerated extends CairymeDaoBase {

    public static $table = 'cms_item';

    protected function init() {
        $this->var['id'] = 0;
        $this->var['language'] = NULL;
        $this->var['type'] = NULL;
        $this->var['content'] = NULL;
        $this->var['code'] = NULL;
        $this->var['create_time'] = NULL;

        $this->update['id'] = false;
        $this->update['language'] = false;
        $this->update['type'] = false;
        $this->update['content'] = false;
        $this->update['code'] = false;
        $this->update['create_time'] = false;
    }

    public function getId() {
        return $this->var['id'];
    }

    public function setLanguage($language) {
        if ($this->var['language'] !== $language) {
            $this->var['language'] = $language;
            $this->update['language'] = true;
        }
    }
    public function getLanguage() {
        return $this->var['language'];
    }

    public function setType($type) {
        if ($this->var['type'] !== $type) {
            $this->var['type'] = $type;
            $this->update['type'] = true;
        }
    }
    public function getType() {
        return $this->var['type'];
    }

    public function setContent($content) {
        if ($this->var['content'] !== $content) {
            $this->var['content'] = $content;
            $this->update['content'] = true;
        }
    }
    public function getContent() {
        return $this->var['content'];
    }

    public function setCode($code) {
        if ($this->var['code'] !== $code) {
            $this->var['code'] = $code;
            $this->update['code'] = true;
        }
    }
    public function getCode() {
        return $this->var['code'];
    }

    public function setCreateTime($create_time) {
        if ($this->var['create_time'] !== $create_time) {
            $this->var['create_time'] = $create_time;
            $this->update['create_time'] = true;
        }
    }
    public function getCreateTime() {
        return $this->var['create_time'];
    }

    protected function getIdColumnName() {
        return 'id';
    }
}