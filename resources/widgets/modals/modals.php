<?php

class successModal
{
    public static function create($message = '', $navigator)
    {
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

class failedModal
{
    public static function create($message = '', $navigator)
    {
        $escapedMessage = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');
        $escapedNavigator = htmlspecialchars($navigator, ENT_QUOTES, 'UTF-8');


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
                        <p style='font-size: 18px;' id='failedMessage'>{$escapedMessage}</p>
                    </div>
                    <div class='modal-footer justify-content-center'>
                        <a href='{$escapedNavigator}' class='btn btn-secondary' data-bs-dismiss='modal' style='background: #7ED4AD;'>Close</a>
                    </div>
                </div>
            </div>
        </div>
        ";
    }
}

class confirmationModal
{
    public static function create($message = '', $confirm_navigation)
    {

        return "
        <div class='modal' tabindex='-1' id='confirmationModal'>
            <div class='modal-dialog modal-dialog-centered'>
                <div class='modal-content'>
                    <div class='modal-header justify-content-center text-center'>
                        <span class='material-symbols-outlined' style='font-size: 50px; color: #CC2B52;'>
                            report
                        </span>
                    </div>
                    <div class='modal-body text-center'>
                        <p style='font-size: 18px;'>{$message}</p>
                    </div>
                    <div class='modal-footer justify-content-center'>
                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal' style='background: #7ED4AD;'>Close</button>
                        <button type='button' class='btn btn-confirm' data-bs-dismiss='modal' style='background: #7ED4AD; color: #fff;'>Confirm</button>
                    </div>
                </div>
            </div>
        </div>
        ";
    }
}

class ViewResidentModal
{
    public static function create()
    {
        return '
            <div class="modal fade" id="viewResident" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true">
                <div class="modal-dialog modal-dialog-centered" style="margin: auto; max-width: 70% !important;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">View Resident Details</h5>
                        </div>
                        <div class="modal-body">
                            <!-- Resident Name Section -->
                            <div class="resident_name">
                                <h2 class="view_resident_name fw-bolder my-1 ms-3"></h2>
                            </div>
                            <hr>

                            <!-- Main Content Container -->
                            <div class="container">
                                <!-- First Row: Member Information & Education Information -->
                                <div class="row d-flex align-items-stretch">
                                    <!-- Member Information -->
                                    <div class="col-md-6">
                                        <div class="members-information p-3 border border-secondary border-1 rounded-3 h-100">
                                            <div class="grid-title mb-2">
                                                <span>Member Information</span>
                                            </div>
                                            ' . viewArea::create("firstname", "First Name :") . '
                                            ' . viewArea::create("middlename", "Middle Name :") . '
                                            ' . viewArea::create("lastname", "Last Name :") . '
                                            ' . viewArea::create("gender", "Gender :") . '
                                            ' . viewArea::create("birthDate", "Birthdate :") . '
                                            ' . viewArea::create("occupation", "Occupation :") . '
                                            ' . viewArea::create("relationship_to_head", "Relationship to Head :") . '
                                        </div>
                                    </div>

                                    <!-- Education & Employment Information -->
                                    <div class="col-md-6">
                                        <div class="row">
                                            <!-- Education Information -->
                                            <div class="mb-3">
                                                <div class="education-information p-3 border border-secondary border-1 rounded-3 h-100">
                                                    <div class="grid-title mb-2">
                                                        <span>Education Information</span>
                                                    </div>
                                                    ' . viewArea::create("highest_education_level", "Highest Education Level :") . '
                                                    ' . viewArea::create("currently_enrolled", "Currently Enrolled ?") . '
                                                    ' . viewArea::create("school_name", "School Name :") . '
                                                </div>
                                            </div>

                                            <!-- Employment Information -->
                                            <div>
                                                <div class="education-information p-3 border border-secondary border-1 rounded-3 h-100">
                                                    <div class="grid-title mb-2">
                                                        <span>Employment Information</span>
                                                    </div>
                                                    ' . viewArea::create("employment_status", "Is Employed ?") . '
                                                    ' . viewArea::create("job_title", "Job Title :") . '
                                                    ' . viewArea::create("monthly_income", "Monthly Income :") . '
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Second Row: Health Information -->
                                <div class="row mt-3">
                                    <div class="">
                                        <div class="education-information p-3 border border-secondary border-1 rounded-3 h-100">
                                            <div class="grid-title mb-2">
                                                <span>Health Information</span>
                                            </div>
                                            <div class="d-flex justify-content-around text-center">
                                                ' . viewArea::create("has_disability", "Has Disabilities ?") . '
                                                ' . viewArea::create("pre_exisiting_condition", "Pre Existing Condition :") . '
                                                ' . viewArea::create("covid_vaccinated", "Is Vaccinated ?") . '
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        ';
    }
}

class EditResidentModal
{
    public static function create()
    {
        return '
            <div class="modal fade" id="editResident" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true" role="dialog">
                <div class="modal-dialog modal-dialog-centered" style="margin: auto; max-width: 70% !important;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Resident Details</h5>
                        </div>
                        <div class="modal-body">
                            <!-- Resident Name Section -->
                            <div class="resident_name">
                                <h2 class="edit_resident_name fw-bolder my-1 ms-3"></h2>
                            </div>
                            <hr>

                            <!-- Main Content Container -->
                            <div class="container">
                                <form onsubmit="handleFormSubmit(event)">
                                    <div id="member-template" class="member-form flex-column gap-3 mb-5">
                                        <div class="d-flex flex-row gap-3 mb-5">
                                            ' . textInput::create("edit_firstname", "text", "First Name", "First Name") . '
                                            ' . textInput::create("edit_middlename", "text", "Middle Name", "Middle Name") . '
                                            ' . textInput::create("edit_lastname", "text", "Last Name", "Last Name") . '
                                        </div>
                                        <div class="d-flex flex-row gap-3 mb-5">
                                            ' . dropdownMenuRelationshipToHead::create("edit_relationship", "Relationship to head") . '
                                            ' . dropdownMenuGender::create("edit_gender", "Gender") . '
                                            ' . birthDate::create("edit_birthDate", "date", "Birth Date", "Birth Date") . '
                                        </div>
                                        <div class="d-flex flex-row gap-3 mb-5">
                                            ' . dropdownMenuEducationLevel::create("edit_educationLevel", "Education Level") . '
                                            ' . dropdownMenuYesNo::create("edit_currentlyEnrolled", "Currently Enrolled ?") . '
                                            ' . textInput::create("edit_schoolName", "text", "N/A if none", "School Name") . '
                                        </div>
                                        <div class="d-flex flex-row gap-3 mb-5">
                                            ' . dropdownMenuYesNo::create("edit_employmentStatus", "Employment Status?") . '
                                            ' . textInput::create("edit_jobTitle", "text", "N/A if none", "Job Title") . '
                                            ' . textInput::create("edit_income", "number", "Income", "Monthly Income") . '
                                        </div>
                                        <div class="d-flex flex-row gap-3 mb-5">
                                            ' . dropdownMenuYesNo::create("edit_hasDisabilities", "Has Disabilities?") . '
                                            ' . textInput::create("edit_preExistingCondition", "text", "N/A if none", "Pre Existing Condition?") . '
                                            ' . dropdownMenuYesNo::create("edit_covidVaccinated", "Covid Vaccinated?") . '
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary update_member_data" data-bs-dismiss="modal">Update</button>
                                        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Modal Footer -->
                        
                    </div>
                </div>
            </div>
                
        ';
    }
}
