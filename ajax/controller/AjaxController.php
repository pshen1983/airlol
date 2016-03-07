<?php
abstract class AjaxController {
    public function execute($params) {
        $result = $this->handle($params);

        if (is_array($result)) {
            echo json_encode($result);
        }
    }

    abstract protected function handle($params);
}
?>