<?php
/** all query commands */
define(
    "getMapSQL", "
SELECT t.TourId, ti.TimesheetId, ti.StartTime, ti.EndTime, c.ClassroomId, b.BuildingId ,
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
    "getMap2SQL", "
SELECT t.TourId, ti.StartTime, ti.EndTime, c.ClassroomId, b.BuildingId ,
c.Name as classroomName, b.Name as buildingName
FROM tour as t, 
tour2timesheet as t2ti, timesheet as ti, timesheet2classroom as ti2c,
classroom as c, building2classroom as b2c, building as b
WHERE t.TourId = ? AND ti.TimesheetId = ?
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

define("getTimesheetSQL", "
SELECT TimesheetId, StartTime, EndTime
FROM Timesheet
;");

define("getBuildingSQL", "
SELECT DISTINCT b.BuildingID, b.Name, b.SubName
FROM Building as b, Building2Classroom as b2c
WHERE b.BuildingID = b2c.BuildingID
;");

define("getClassroomByBuildingID_SQL", "
SELECT c.classroomId, c.Name
FROM classroom as c, building2classroom as b2c
WHERE c.classroomid = b2c.classroomid 
AND b2c.buildingid = ?
;");

define("getTimeByTourID_SQL", "
SELECT t.TimesheetId, t.StartTime, t.EndTime
FROM timesheet as t, tour2timesheet as t2s
WHERE t.TimesheetId = t2s.TimesheetId 
AND t2s.TourId = ?
;");

define("getBuildingAndClassroomsByTimeAndTourID_SQL", "
SELECT c.ClassroomId, b.BuildingId, 
c.Name as classroomName, b.Name as buildingName
FROM timesheet2classroom as ti2c,
classroom as c, building2classroom as b2c, building as b
WHERE ? = ti2c.TimesheetId
AND ti2c.ClassroomId = c.ClassroomId
AND c.ClassroomId = b2c.ClassroomId
AND b2c.BuildingId = b.BuildingId;
;");

define("addtour2timesheet_SQL", "
insert into tour2timesheet (tourid, timesheetid)
values (?, ?)
;");

define("addtimesheet2classroom_SQL", "
insert into timesheet2classroom
values (?, ?, ?)
;");

define("addbuilding2classroom_SQL", "
insert into building2classroom (buildingid, classroomid)
values (?, ?)
;");

define("updatetour2timesheet_SQL", "
update tour2timesheet 
SET tourid = ?, timesheetid = ?
WHERE tourid =
;");

define("updatetimesheet2classroom_SQL", "
insert into timesheet2classroom
values (?, ?, ?)
;");

define("deleteMapSQL", "
DELETE FROM tour2timesheet 
WHERE TourId = ? AND TimesheetId = ?
;");