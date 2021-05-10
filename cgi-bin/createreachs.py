#!/usr/bin/env python2.7
import sys
sys.path.insert(0, "/home/bitnami/htdocs/cgi-bin")
import mysql.connector as mysql

con2=mysql.connect(
host="ls-74e848ab2b3a36f7eb635c526111c0bc8e1bfdae.cpz5heb0edxj.ap-south-1.rds.amazonaws.com",
        user="dbmasteruser",
        password="Mrrw-hesQ+A`Xb?(u:B6,7Tme;C%rge_",
    database="connects"
)
cur2=con2.cursor()

cur2.execute("select * from cmaster where masterpathid>10021")
rescomp=cur2.fetchall()
for item in rescomp:
    #print item
    starttime=str(item[3])
    origin=str(item[1])
    dest=str(item[2])
    reachtime=str(item[4])
    routeid=str(item[5])
    command = "insert into r"+dest+" (origin,starttime,reachtime,routeid) values ("+origin+",'"+starttime+"','"+reachtime+"',"+routeid+");"
    cur2.execute(command)
    print command
cur2.close()
con2.close()