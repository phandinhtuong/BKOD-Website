<?php
/** all query commands */
define(
    "getMapSQL", "
SELECT t.TourId, ti.StartTime, ti.EndTime, c.ClassroomId, b.BuildingId ,
c.Name as classroomName, b.Name as buildingName
FROM tour as t, 
tour2timesheet as t2ti, timesheet as ti, timesheet2classroom as ti2c,
classroom as c, building2classroom as b2c, building as b
WHERE t.TourId = ?
AND t.TourId = t2ti.TourId 
AND t2ti.TimesheetId = ti.TimesheetId
AND ti.TimesheetId = ti2c.TimesheetId
AND ti2c.ClassroomId = c.ClassroomId
AND c.ClassroomId = b2c.ClassroomId
AND b2c.BuildingId = b.BuildingId;") ;

define(
    "getAllMapsSQL" ,"
SELECT t.TourId, ti.StartTime, ti.EndTime, c.ClassroomId, b.BuildingId, 
c.Name as classroomName, b.Name as buildingName
FROM tour as t, 
tour2timesheet as t2ti, timesheet as ti, timesheet2classroom as ti2c,
classroom as c, building2classroom as b2c, building as b
WHERE t.TourId = t2ti.TourId 
AND t2ti.TimesheetId = ti.TimesheetId
AND ti.TimesheetId = ti2c.TimesheetId
AND ti2c.ClassroomId = c.ClassroomId
AND c.ClassroomId = b2c.ClassroomId
AND b2c.BuildingId = b.BuildingId;");

define("getToursIDSQL" ,"select TourID, Name from tour"); 