<?php

class successModal {
    public static function create($message = '', $navigator) {
        $escapedMessage = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');
        $escapedNavigator = htmlspecialchars($navigator, ENT_QUOTES, 'UTF-8');
        
        return "
        <div class='modal' tabindex='-1' id='successModal'>
            <div class='modal-dialog modal-dialog-centered'>
                <div class='modal-content'>
                    <div class='modal-header justify-content-center text-center'>
                        <span class='material-symbols-outlined' style='font-size: 50px; color: green;'>
                            verified
                        </span>
                    </div>
                    <div class='modal-body text-center'>
                        <p style='font-size: 18px;'>{$escapedMessage}</p>
                    </div>
                    <div class='modal-footer justify-content-center'>
                        <a href='{$escapedNavigator}' class='btn btn-success' style='padding: 5px 20px; color: white; border-radius: 10px;'>Close</a>
                    </div>
                </div>
            </div>
        </div>
        ";
    }
}

class failedModal {
    public static function create() {
        
        return "
        <div class='modal' tabindex='-1' id='failedModal'>
            <div class='modal-dialog modal-dialog-centered'>
                <div class='modal-content'>
                    <div class='modal-header justify-content-center text-center'>
                        <span class='material-symbols-outlined' style='font-size: 50px; color: #CC2B52;'>
                            report
                        </span>
                    </div>
                    <div class='modal-body text-center'>
                        <p style='font-size: 18px;' id='failedMessage'></p>
                    </div>
                    <div class='modal-footer justify-content-center'>
                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal' style='background: #7ED4AD;'>Close</button>
                    </div>
                </div>
            </div>
        </div>
        ";
    }
}

class warningModal {

}

?>