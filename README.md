# foodora Test

#Introduction
    This Scripts will allow you, in emergencies, to implement the "SpecialDays" feature of the Foodora
    application by temporarily setting all restaurant's regular schedule according to the 
    special days information.

#Prerequisites
  - Recent (>= 5.3) version of PHP
  - Mysql

#Configuration
  - Changes in settings.ini : To allow script to connect to the database and updates tables
  - create dump folder with 0777 permissin for dumping old Table

#Running scripts
  - run a runFirstScript.php script on Dec 20th at 23:00 to fix the problem (update all regular days with special days) 
  - run a runToRevertChanges.php script on Dec 28th 01:00 to restore everything again to the normal state

#Assumption
  - Special Dyas records are added only for Dates between 21st Dec to 27th Dec
  - if not and we need to updates records for only in between dates then also it will work
    we just needs to makes changes in query to get data for in between dates from vendor_special_day Table
    
#Approach
  - First Script which runs on Dec 20th 
      - 1st dump the vendor_schdule table in dump folder (created in root folder with 0777 permission).
      - After that it will fetch all records from vendor_special_day table and enter data one by one 
        to vendor_schedule table
      - Before enter data into vendor_schedule table it will check for Flag of already deleted all records
        of vendor (for which we are updating 1st record).
      - If Flag is not set it will 1st delete all records of vendor (for which we are updating 1st record)
  - Scond Script which runs on Dec 28th
      - This script will 1st truncate vendor_schedule table & Export data from 
        Dump folder (which is dumpped by first script)
