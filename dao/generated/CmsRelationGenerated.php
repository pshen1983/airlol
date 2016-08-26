<?php
abstract class CmsRelationGenerated extends AirlolDaoBase {

    public static $table = 'cms_relation';

    protected function init() {
        $this->var['id'] = 0;
        $this->var['type'] = NULL;
        $this->var['parent_code'] = NULL;
        $this->var['child_code'] = NULL;
        $this->var['create_time'] = NULL;

        $this->update['id'] = false;
        $this->update['type'] = false;
        $this->update['parent_code'] = false;
        $this->update['child_code'] = false;
        $this->update['create_time'] = false;
    }

    public function getId() {
        return $this->var['id'];
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

    public function setParentCode($parent_code) {
        if ($this->var['parent_code'] !== $parent_code) {
            $this->var['parent_code'] = $parent_code;
            $this->update['parent_code'] = true;
        }
    }
    public function getParentCode() {
        return $this->var['parent_code'];
    }

    public function setChildCode($child_code) {
        if ($this->var['child_code'] !== $child_code) {
            $this->var['child_code'] = $child_code;
            $this->update['child_code'] = true;
        }
    }
    public function getChildCode() {
        return $this->var['child_code'];
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