#!/usr/bin/env python2.7
import sys
sys.path.insert(0, "/home/parakcyy/scripts")
import mysql.connector as mysql
con1=mysql.connect(
    host="parakkumthalika.in" ,
    user="parakcyy_admin",
    password="Nirmal#21" ,
    database="parakcyy_parakkumthalika"
)
cur1=con1.cursor()

con2=mysql.connect(
    host="parakkumthalika.in" ,
    user="parakcyy_admin",
    password="Nirmal#21",
    database="parakcyy_connects"
)
cur2=con2.cursor()

cur1.execute("select id from stops where id>0 order by id")
rescomp=cur1.fetchall()
for item in rescomp:
    indiv=item[0]
    print indiv
    cur2.execute("alter table c"+str(indiv)+" modify time TIME;")
    cur2.execute("alter table c"+str(indiv)+" modify reachtime TIME;")




cur2.close()
con2.close()
cur1.close()
con1.close()
