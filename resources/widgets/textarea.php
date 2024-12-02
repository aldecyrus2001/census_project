<?php

class textArea {
    public static function create($id, $placeholder = '', $label = '') {
        $uniqueId = 'input_' . $id;

        return "
        <div class='entryarea'>
            <textarea id='{$uniqueId}' class='text-input' placeholder='{$placeholder}'></textarea>
            <div class='label-line'>{$label}</div>
        </div>
        ";
    }
}

?>