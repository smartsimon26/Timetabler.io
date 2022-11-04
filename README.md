# Timetabler
 A Timetabling System for Machakos University
# Constraints
Time - The time when the lecturer is available
Day - Days when the lecturer is available
Room - The room where the lecture must take place
# Algorithm
Get units with their respective lecturers and constraints then generate the timetable
- ## Step 1
    ## _Implement in the menu some code to do the following settings_
    - Timeshifts e.g 08:00-10:00, 10:30-12:30, 1:00-3:00, 3:30-5:30
    - Rooms e.g PGL1, PGL2, PGL3, PGL4, ADB1, ADB2, MPH 
- ## Step 2
    - Create a Javascript object with the following member variables, lecturer(string), day(string), timeshift(string), venue(string), unitcode(string), occupied(boolean), no_constrains(number)
    - Create forms to get units input
    - The forms get _unit code, _lecturer's name as the common input
    - The form should have extra _optional fields to input constraints
    - The constrains should use select input not text inputs
    - The contraints are _room where the lecture can take place, _day when the lecturer is available
    - By default if no constraints are specified, the lecture can take place in any room and any day
    - In future there will be a constraint for timeshift
    - The data should be fed in the Javascript object
- ## Step 3
    - Create a list of the object data, and sort them by number of constrainst(no_constraints) since the units with constrainsts should be prioritized
    - 