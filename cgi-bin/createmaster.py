#Combine all the c1-c1000 tables to a single cmaster table.


#!/usr/bin/python
import sys
sys.path.insert(0, "/home/bitnami/htdocs/cgi-bin")
sys.path.insert(0,'/var/www/scripts')
import mysql.connector as mysql

con = mysql.connect(
    host="parakkumthalika.in",
    database="connects",
    user="parakcyy_admin",
    password="Nirmal#21",
)
cur=con.cursor()

cur.execute("show tables;")
res=cur.fetchall()
for item in res:
    tabname=item[0]
    print tabname
    cur.execute("select * from "+tabname+";")
    res1=cur.fetchall()
    for row in res1:
        origin=tabname[1:]
        command ="insert into cmaster (origin,dest,time,reachtime,routeid) values ("+str(origin)+","+str(row[1])+",'"+str(row[2])+"','"+str(row[4])+"',"+str(row[3])+");"
        cur.execute(command)
#print res
# for item in res:
#     #print item[0]
#     cur2.execute("select pathid from c"+str(item[0])+";")
#     fetched=cur2.fetchall()
#     print len(fetched)
#     if(len(fetched)==0):
#         empty+=[str(item[0])]
print "Empty places are:"
# print empty
cur.close()
con.close()