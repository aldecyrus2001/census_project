<?php

class textInput {
    public static function create($id, $type = 'text', $placeholder = '', $label = '') {
        $uniqueId = 'input_' . $id;

        return "
        <div class='entryarea'>
            <input type='{$type}' id='{$uniqueId}' class='text-input' placeholder='{$placeholder}'>
            <div class='label-line'>{$label}</div>
        </div>
        ";
    }
}

class birthDate {
    public static function create($id, $type = '', $placeholder = '', $label = '') {
        $uniqueId = 'input_' . $id;

        return "
        <div class='entryarea'>
            <input type='{$type}' id='{$uniqueId}' class='text-input' placeholder='{$placeholder}'>
            <div class='label-line'>{$label}</div>
        </div>
        ";
    }
}
?>