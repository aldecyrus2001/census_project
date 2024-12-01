<?php

class dropdownMenuPosition {
    public static function create($id, $label = '') {
        $uniqueId = 'input_' . $id;

        return "
        <div class='entryarea'>
            <select name=''{$uniqueId}'' id='{$uniqueId}' class='text-input'>
                <option value='N/A' disabled selected> Please Select Position </option>
                <option value='Administrator'> Administrator </option>
                <option value='Data Enumerator'> Data Enumerator </option>
            </select>
            <div class='label-line'>{$label}</div>
        </div>
        ";
    }
}

class dropdownMenuHouseType {
    public static function create($id, $label = '') {
        $uniqueId = 'input_' . $id;

        return "
        <div class='entryarea'>
            <select name=''{$uniqueId}'' id='{$uniqueId}' class='text-input'>
                <option value='N/A' disabled selected> Please Select House Type </option>
                <option value='Apartment'> Apartment </option>
                <option value='Single-Family Home'> Single-Family Home </option>
                <option value='Duplex'> Duplex </option>
            </select>
            <div class='label-line'>{$label}</div>
        </div>
        ";
    }
}

class dropdownMenuHouseOwnership {
    public static function create($id, $label = '') {
        $uniqueId = 'input_' . $id;

        return "
        <div class='entryarea'>
            <select name=''{$uniqueId}'' id='{$uniqueId}' class='text-input'>
                <option value='N/A' disabled selected> Please Select Ownership </option>
                <option value='Owned'> Owned </option>
                <option value='Rented'> Rented </option>
                <option value='Leased'> Leased </option>
            </select>
            <div class='label-line'>{$label}</div>
        </div>
        ";
    }
}

class dropdownMenuRelationshipToHead {
    public static function create($id, $label = '') {
        $uniqueId = 'input_' . $id;

        return "
        <div class='entryarea'>
            <select name=''{$uniqueId}'' id='{$uniqueId}' class='text-input'>
                <option value='N/A' disabled selected> Please Select Relationship to Head </option>
                <option value='Spouse'> Spouse </option>
                <option value='Child'> Child </option>
                <option value='Parent'> Parent </option>
            </select>
            <div class='label-line'>{$label}</div>
        </div>
        ";
    }
}

class dropdownMenuGender {
    public static function create($id, $label = '') {
        $uniqueId = 'input_' . $id;

        return "
        <div class='entryarea'>
            <select name=''{$uniqueId}'' id='{$uniqueId}' class='text-input'>
                <option value='N/A' disabled selected> Please Select Gender </option>
                <option value='Male'> Male </option>
                <option value='Female'> Female </option>
            </select>
            <div class='label-line'>{$label}</div>
        </div>
        ";
    }
}

class dropdownMenuEducationLevel {
    public static function create($id, $label = '') {
        $uniqueId = 'input_' . $id;

        return "
        <div class='entryarea'>
            <select name=''{$uniqueId}'' id='{$uniqueId}' class='text-input'>
                <option value='N/A' disabled selected> Please Select Education Level </option>
                <option value='Primary'> Primary </option>
                <option value='Junior High'> Junior High </option>
                <option value='Senior High'> Senior High </option>
                <option value='Undergraduate'> Undergraduate </option>
                <option value='College Graduate'> College Graduate </option>
                <option value='Postgraduate'> Postgraduate </option>
            </select>
            <div class='label-line'>{$label}</div>
        </div>
        ";
    }
}



class dropdownMenuYesNo {
    public static function create($id, $label = '') {
        $uniqueId = 'input_' . $id;

        return "
        <div class='entryarea'>
            <select name=''{$uniqueId}'' id='{$uniqueId}' class='text-input'>
                <option value='N/A' disabled selected> Please Select </option>
                <option value='1'> Yes </option>
                <option value='0'> No </option>
            </select>
            <div class='label-line'>{$label}</div>
        </div>
        ";
    }
}

?>