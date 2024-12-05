<?php

class viewArea {
    public static function create($id, $label = '') {
        $uniqueId = 'view_' . $id;

        return "
        <div class='viewarea mb-2'>
			<label class='' style='font-size: 14px;'>{$label}</label>
		    <p class='my-0 {$uniqueId} fw-bolder'>  </p>
		</div>
        ";
    }
}

?>