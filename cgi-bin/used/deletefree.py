#!/usr/bin/python
import sys
sys.path.insert(0, "/home/parakcyy/scripts")
import json
import mysql.connector as mysql
def getnamefromid(inpid,cur2):
    cur2.execute("select stopname from stops where id="+inpid)
    #print("COMMAND IS: "+"select stopname from stops where stopname like '"+origin.upper()+"%'  order by id limit 10")
    rows=cur2.fetchall()
    if(len(rows)==0):
        return "REALLYWENTWRONG"
    else:
        return (rows[0][0])

    cur.close()
    con.close()
con = mysql.connect(
    host="parakkumthalika.in",
    database="parakcyy_connects",
    user="parakcyy_admin",
    password="Nirmal#21",
)
cur=con.cursor(buffered=True)

cona = mysql.connect(
    host="parakkumthalika.in",
    database="parakcyy_parakkumthalika",
    user="parakcyy_admin",
    password="Nirmal#21",
)
cura=cona.cursor()
cur.execute("show tables;")
listoftables=cur.fetchall()
i=0
for item in listoftables:
    routeid=str(item[0])
    if(routeid[0]=="c" and routeid!="cmaster" and routeid!="cmaster2"):
        
        command="select * from "+routeid+" where target = 1105"
        #print command
        cur.execute(command)
        resulta=cur.fetchall()
        print resulta
print "completed"