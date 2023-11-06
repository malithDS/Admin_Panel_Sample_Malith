<?php
 include "conn.php";
 include "function.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./stylesheets/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script defer src="./script.js"></script>
    <title>Admin Dashboard</title>
</head>
<body>
    <div class="header">
        <h1>Admin Dashboard</h1>
    </div>
    
    <div class="container">
        
        <div class="sidebar">
            <div class="menu-btn">
                <i class="fa fa-bars"></i>
            </div>
            <div class="top">
                <div class="close-btn">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </div>
                <img src="./images/logo.jpg" alt="">
                <h3>Click Online</h3>
            </div>

            <div class="menu">
                <div class="item"><a href="./admin.php"><i class="fa fa-th-large"></i>Dashboard</a></div>
                <div class="item"><a href="#"><i class="fa fa-newspaper-o"></i>Latest News</a></div>
                <div class="item"><a class="sub-btn"><i class="fa fa-sticky-note"></i>Reports 
                  <i class="fa fa-angle-right dropdown"></i></a>
                      <div class="sub-menu">
                          <a href="./allUsers.php" class="sub-item"><i class="fa fa-group"></i>Users </a>
                          <a href="./allPrompts.php" class="sub-item"><i class="fa fa-shopping-cart"></i>prompt </a>
                          <a href="./allPromptTypes.php" class="sub-item"><i class="fa fa-list"></i>Prompt types </a>
                      </div>
                  </div>
                <div class="item"><a class="sub-btn"><i class="fa fa-cog"></i>Manage 
                  <i class="fa fa-angle-right dropdown"></i></a>
                    <div class="sub-menu">
                        <a href="./manageUser.php" class="sub-item"><i class="fa fa-group"></i>Users </a>
                        <a href="./managePrompt.php" class="sub-item"><i class="fa fa-shopping-cart"></i>prompt </a>
                        <a href="./managePromptType.php" class="sub-item"><i class="fa fa-list"></i>Prompt types </a>
                    </div>
                </div>
                
                <div class="item"><a href="#"><i class="fa fa-question"></i>Help</a></div>
                <div class='item'> <a href='./logoutUser.php'><i class='fa fa-sign-out'></i>Logout</a></div>
            </div>
        </div>

        <div class="content">
            <div class="section1">
                <div class="card">
                    <div class="card_details">
                        <h2><?php countUsers();?></h2>
                        <p>Users</p>
                    </div>
                    <i class="fa fa-group"></i>
                </div>
                <div class="card">
                    <div class="card_details">
                    <h2><?php countPrompt();?></h2>
                        <p>Prompts</p>
                    </div>
                    <i class="fa fa-shopping-cart"></i>
                </div>
                <div class="card">
                    <div class="card_details">
                    <h2><?php countPromptTypes();?></h2>
                        <p>prompt Types</p>
                    </div>
                    <i class="fa fa-list"></i>
                </div>
            </div>

            <div class="section2">
                <div class="social_card facebook">
                    <i class="fa fa-facebook"></i>
                    <div class="card_details">
                        <p>Facebook</p>
                    </div>
                </div>
                <div class="social_card whatsapp">
                    <i class="fa fa-whatsapp"></i>
                    <div class="card_details">
                        <p>WhatsApp</p>
                    </div>
                </div>
                <div class="social_card yahoo">
                    <i class="fa fa-yahoo"></i>
                    <div class="card_details">
                        <p>Yahoo</p>
                    </div>
                </div>
                <div class="social_card googleplus">
                    <i class="fa fa-google-plus"></i>
                    <div class="card_details">
                        <p>Google plus</p>
                    </div>
                </div>
            </div>

            <div class="section3">
                <div class="calender-container">
                    <div class="left">
                      <div class="calendar">
                        <div class="month">
                          <i class="fa fa-angle-left prev"></i>
                          <div class="date">October 2023</div>
                          <i class="fa fa-angle-right next"></i>
                        </div>
                        <div class="weekdays">
                          <div>Sun</div>
                          <div>Mon</div>
                          <div>Tue</div>
                          <div>Wed</div>
                          <div>Thu</div>
                          <div>Fri</div>
                          <div>Sat</div>
                        </div>
                        <div class="days"><div class="day">1</div><div class="day">2</div><div class="day">3</div><div class="day">4</div><div class="day">5</div><div class="day">6</div><div class="day">7</div><div class="day">8</div><div class="day">9</div><div class="day">10</div><div class="day">11</div><div class="day">12</div><div class="day">13</div><div class="day">14</div><div class="day">15</div><div class="day">16</div><div class="day">17</div><div class="day">18</div><div class="day">19</div><div class="day today active">20</div><div class="day">21</div><div class="day">22</div><div class="day">23</div><div class="day">24</div><div class="day">25</div><div class="day">26</div><div class="day">27</div><div class="day">28</div><div class="day">29</div><div class="day">30</div><div class="day">31</div><div class="day next-date">1</div><div class="day next-date">2</div><div class="day next-date">3</div><div class="day next-date">4</div></div>
                        <div class="goto-today">
                          <div class="goto">
                            <input type="text" placeholder="mm/yyyy" class="date-input">
                            <button class="goto-btn">Go</button>
                          </div>
                          <button class="today-btn">Today</button>
                        </div>
                      </div>
                    </div>
                    <div class="right">
                      <div class="today-date">
                        <div class="event-day">Fri</div>
                        <div class="event-date">20 October 2023</div>
                      </div>
                      <div class="events"><div class="no-event">
                          <h3>No Events</h3>
                      </div></div>
                      <div class="add-event-wrapper">
                        <div class="add-event-header">
                          <div class="title">Add Event</div>
                          <i class="fa fa-times close"></i>
                        </div>
                        <div class="add-event-body">
                          <div class="add-event-input">
                            <input type="text" placeholder="Event Name" class="event-name">
                          </div>
                          <div class="add-event-input">
                            <input type="text" placeholder="Event Time From" class="event-time-from">
                          </div>
                          <div class="add-event-input">
                            <input type="text" placeholder="Event Time To" class="event-time-to">
                          </div>
                        </div>
                        <div class="add-event-footer">
                          <button class="add-event-btn">Add Event</button>
                        </div>
                      </div>
                    </div>
                    <button class="add-event">
                      <i class="fa fa-plus"></i>
                    </button>
                  </div>
            </div>



        </div>

        
    </div>
    <div class="footer">
      <p>Developed by Malith © 2023</p>
    </div>
    








</body>
</html>