<?php

        session_start();
   
        function checkUser() 
        {
            if (isset($_SESSION['uid']) && $_SESSION['uid'] !== '') 
            {
			    return "true";
		    } 
            else 
            {
			    return "false";
            }
        }
        
?>

<!DOCTYPE html>
<html>

<head>
    <title>Curriculum Vitae Builder</title>

    <link rel="stylesheet" type="text/css" href="../css/theme.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <meta name="description" content="A document to present your skills and qualifications effectively and clearly." />
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 no-print" id="left">
                <div id="panel">
                    <button class="printSaveOption" onclick="window.print()">Options</button>

                    <form action="upload.php" method="POST" enctype="multipart/form-data">
                        <input type="file" name="file">
                        <button type="submit" name="submit">Upload</button>
                    </form>

                    <div class="toggle-button">
                        <hr> BULLET STYLE:
                        <button class="bulletLead" onclick="changeListStyle('disc');">&#9899;</button>
                        <button class="bulletLead" onclick="changeListStyle('square');">&#9632;</button>
                        <button class="bulletLead" onclick="changeListStyle('dash');">-</button>
                        <button class="bulletLead" onclick="changeListStyle('decimal');">1.</button>
                        <button class="bulletLead" onclick="changeListStyle('upper-roman');">I.</button>
                        <button class="bulletLead" onclick="changeListStyle('lower-roman');">i.</button>
                        <button class="bulletLead" onclick="changeListStyle('upper-alpha');">A.</button>
                        <button class="bulletLead" onclick="changeListStyle('lower-alpha');">a.</button>
                        <a style= "float:right; margin:0.2em" href="Register.php">Sign up</a>
                        <a style= "float:right; margin:0.2em" href="Login.php">Sign in</a>
                        <a style= "float:right; margin:0.2em" href="logout.php">Log out</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-9 text-center" id="right">
                <div class="droid" id="page" contenteditable="<?php print checkUser(); ?>">
                    <div class="mainDetails">
                        <div class="col-sm-12">
                            <div style="display:inline-block;" id="image">
                                <img src="../images/photoUpload.jpg" height="90" width="90">
                            </div>

                            <div id="info" style="display:inline-block;">
                                <h2 id="contentName">Name</h2>
                                <h5 id="jobTitle">Professional title</h5>
                                <h5 id="location">City, Country</h5>
                                <h5 id="contentCourse">Short and engaging pitch about yourself.</h5>
                            </div>

                            <div id="contact" style="display:inline-block;">
                                <br> Phone Number
                                <br>E-mail
                                <br>Date Of Birth
                                <br>Website
                            </div>
                        </div>
                    </div>

                    <div class="section" id="sectionExperience">
                        <div class="section-title ruled rule-above">
                            <hr class="hr-above">
                            <h4><strong>Work Experience</strong></h4>
                            <hr class="hr-below">
                        </div>
                        <ul>
                            <li>
                                <div>
                                    <div class="title"><strong>Title/Position</strong></div>
                                    <div class="time right"> <i>Start Date - End Date</i></div>
                                </div>
                                <div>
                                    <div class="text"><i>Details</i></div>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <div class="title"><strong>Title/Position</strong></div>
                                    <div class="time right"><i>Start Date - End Date</i></div>
                                </div>
                                <div>
                                    <div class="text"><i>Details</i></div>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="section" id="sectionEducation">
                        <div class="section-title ruled rule-above">
                            <hr class="hr-above">
                            <h4><strong>Education and Trainings</strong></h4>
                            <ul>
                                <li>
                                    <div>
                                        <div class="title"><strong>University - Qualification</strong></div>
                                        <div class="time right"><i>Start Date - End Date</i></div>
                                    </div>
                                    <div>
                                        <div class="mentor">Details</div>
                                    </div>
                                </li>

                                <li>
                                    <div>
                                        <div class="title"><strong>College - Qualification</strong></div>
                                        <div class="time right"><i>Start Date - End Date</i></div>
                                    </div>
                                    <div>
                                        <div class="mentor">Details</div>
                                    </div>
                                </li>

                                <li>
                                    <div>
                                        <div class="title"><strong>High School - Qualification</strong></div>
                                        <div class="time right"><i>Start Date - End Date</i></div>
                                    </div>
                                    <div>
                                        <div class="mentor"><i>Details</i></div>
                                    </div>
                                </li>
                            </ul>

                            <hr class="hr-below">
                        </div>
                    </div>


                    <div class="section" id="sectionSkills">
                        <div class="section-title ruled rule-above">
                            <hr class="hr-above">
                            <h4><strong>Personal skills</strong></h4>
                            <hr class="hr-below">
                        </div>
                        <ul>
                            <li>
                                <i><span class="skillCategory">Key Skill</span></i>
                            </li>
                            <li>
                                <i><span class="skillCategory">Key Skill</span></i>
                            </li>
                            <li>
                                <i><span class="skillCategory">Key skill</span></i>
                            </li>
                            <li>
                                <i><span class="skillCategory">Key skill</span></i>
                            </li>
                            <li>
                                <i><span class="skillCategory">Key skill</span></i>
                            </li>
                        </ul>
                    </div>

                    <div class="section" id="sectionJobSkills">
                        <div class="section-title ruled rule-above">
                            <hr class="hr-above">
                            <h4><strong>Job-related skills</strong></h4>
                            <hr class="hr-below">
                        </div>
                        <ul>
                            <li>
                                <i><span class="skillCategory">Technical Skill</span></i>
                            </li>
                            <li>
                                <i><span class="skillCategory">Technical Skill</span></i>
                            </li>
                            <li>
                                <i><span class="skillCategory">Technical skill</span></i>
                            </li>
                            <li>
                                <i><span class="skillCategory">Technical skill</span></i>
                            </li>
                            <li>
                                <i><span class="skillCategory">Technical skill</span></i>
                            </li>
                        </ul>
                    </div>

                    <div class="section" id="sectionLanguages">
                        <div class="section-title ruled rule-above">
                            <hr class="hr-above">
                            <h4><strong>Languages</strong></h4>
                            <hr class="hr-below">
                        </div>
                        <ul>
                            <li>
                                <div>
                                    <div class="title"><strong>Language</strong></div>
                                    <div class="time right"><i>Level of knowledge</i></div>
                                </div>
                                <div>
                                    <div class="mentor">Foreign/Native</div>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <div class="title"><strong>Language</strong></div>
                                    <div class="time right"><i>Level of knowledge</i></div>
                                </div>
                                <div>
                                    <div class="mentor">Foreign/Native</div>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="section" id="sectionProjects">
                        <div class="section-title ruled rule-above">
                            <hr class="hr-above">
                            <h4><strong>Projects</strong></h4>
                            <hr class="hr-below">
                        </div>
                        <ul>
                            <li>
                                <div>
                                    <div class="title"><strong>Project Title</strong></div>
                                    <div class="time right"><i>Environment/Resources</i></div>
                                </div>
                                <div>
                                    <div class="mentor">Certificate Date</div>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <div class="title"><strong>Project Title</strong></div>
                                    <div class="time right"><i>Environment/Resources</i></div>
                                </div>
                                <div>
                                    <div class="mentor">Certificate Date</div>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="section" id="sectionAchievements">
                        <div class="section-title ruled rule-above">
                            <hr class="hr-above">
                            <h4><strong>Achievements</strong></h4>
                            <hr class="hr-below">
                        </div>
                        <ul>
                            <li>
                                <div>
                                    <div class="title"><strong>Achievement</strong></div>
                                    <div class="time right"><i>Details</i></div>
                                </div>
                                <div>
                                    <div class="mentor">Gold/Silver/Bronze</div>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <div class="title"><strong>Project Title</strong></div>
                                    <div class="time right"><i>Details</i></div>
                                </div>
                                <div>
                                    <div class="mentor">Gold/Silver/Bronze</div>
                                </div>
                            </li>
                        </ul>
                    </div>
 
                    <div class="section" id="sectionInterest">
                        <div class="section-title ruled rule-above">
                            <hr class="hr-above">
                            <h4><strong>Interests</strong></h4>
                            <hr class="hr-below">
                        </div>
                        <ul>
                            <div class="row">
                                <div class="col-sm-6">
                                    <li><i>Interest</i></li>
                                    <li><i>Interest</i></li>
                                    <li><i>Interest</i></li>
                                    <li><i>Interest</i></li>
                                </div>
                            </div>
                        </ul>
                    </div>

                    <>
                    <div class="section" id="sectionFooterMessage">
                        <div class="section-title ruled rule-above">
                            <hr class="hr-above">
                            <h6><i>Copyright: CV Builder 2019</i></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script type="text/javascript" src="../js/main.js"></script>
</body>
</html>